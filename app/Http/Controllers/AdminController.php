<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Gate;
use App\Group;
use App\Member;
use App\Idea;
use App\LC;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;

class AdminController extends Controller
{
    /**
     * Display admin index.
     *
     * @return Response
     */
    public function index()
    {
        if (Gate::allows('ambassador')) {
          $user = Auth::user();
          if ($user->ambassador) {
            $path = "/admin/showLC/".$user->ambassador->id;
            return redirect($path);
          }
        } else if (Gate::denies('admin')) {
            Auth::logout();
            return redirect('/admin/login');
        }

        // Display total numbers
        $groups = Group::count();
        $members = Member::count();
        $ideas = Idea::count();
        $lcs = LC::count();

        return view('admin.dashboard', [
            'groups' => $groups,
            'members' => $members,
            'ideas' => $ideas,
            'lcs' => $lcs
        ]);
    }

    public function login()
    {
        return view('admin.login');
    }

    public function members()
    {
        if (Gate::denies('admin')) {
            Auth::logout();
            return redirect('/admin/login');
        }

        $members = Member::with('group')->get();

        return view('admin.members', [ 'members' => $members ]);
    }

    public function lcs()
    {
      if (Gate::denies('admin')) {
          Auth::logout();
          return redirect('/admin/login');
      }

      $lcs = LC::all();

      return view('admin.lcs', [ 'lcs' => $lcs ]);
    }

    public function showLC($id) {
      $lc = LC::findOrFail($id);
      if (Gate::denies('ambassador', [$lc])) {
          Auth::logout();
          return redirect('/admin/login');
      }

      return view('admin.lc', ['lc' => $lc, 'members' => $lc->members, 'groups' => $lc->groups]);
    }

    public function lcsAPI()
    {
      $lcs = LC::all();
      return response()->json(['lcs'=> $lcs]);
    }

    public function createLC(Request $request)
    {
      if (Gate::denies('admin')) {
          Auth::logout();
          return redirect('/admin/login');
      }

      $lc = LC::create([
          'name' => $request->input('name')
      ]);
      $email = $request->input('email');
      $ambassador = Member::all()->filter( function ($member) use ($email) {
        return $member->email == $email;
      });
      $ambassador = $ambassador->first();
      if ($ambassador) {
        $lc->ambassador()->save($ambassador);
      }

      return redirect('/admin/lcs');
    }

    public function removeLC($id)
    {
      if (Gate::denies('admin')) {
          Auth::logout();
          return redirect('/admin/login');
      }

      LC::destroy($id);
      return redirect('/admin/lcs');
    }

    public function newLC()
    {
      return view('admin.newLC');
    }

    public function membersCsv()
    {
        if (Gate::denies('admin')) {
            Auth::logout();
            return redirect('/admin/login');
        }

        $members = Member::with('group')->get();
        $columns = ['id', 'email', 'first_name', 'last_name', 'sex','country', 'group.name', 'created_at', 'birthdate', 'uni', 'faculty', 'years_study','phone','image', 'tshirt','cv'];
        $headers = ['ID', 'Email', 'First Name', 'Last Name', 'Sex', 'Country', 'Team Name', 'Registered At', 'Birthdate', 'University', 'Faculty', 'Year of Studies','Phone Number','Image','T-shirt', 'CV'];
        $csv = $this->exportCsv($members, $columns, $headers);
        $csvName = 'ec-members-'.date('Y-m-d-His').'.csv';

        return response($csv, 200, [
            'Content-type'=>'text/csv',
            'Content-Disposition'=>sprintf('attachment; filename="%s"', $csvName),
            'Content-Length'=>strlen($csv)
        ]);
    }

    public function teams()
    {
        if (Gate::denies('admin')) {
            Auth::logout();
            return redirect('/admin/login');
        }

        $teams = Group::all();

        return view('admin.teams', [ 'teams' => $teams ]);
    }

    public function removeTeam($id)
    {
      if (Gate::denies('admin')) {
          Auth::logout();
          return redirect('/admin/login');
      }

      Group::destroy($id);
      return redirect('/admin/teams');
    }

    public function removeMember($id)
    {
      if (Gate::denies('admin')) {
          Auth::logout();
          return redirect('/admin/login');
      }

      Member::destroy($id);
      return redirect('/admin/members');
    }

    public function teamsCsv()
    {
        if (Gate::denies('admin')) {
            Auth::logout();
            return redirect('/admin/login');
        }

        $teams = Group::with('idea')->get();
        $columns = ['id', 'name', 'created_at', 'idea.name', 'idea.repository', 'idea.description', 'idea.created_at'];
        $headers = ['ID', 'Name', 'Registered At', 'Idea Name', 'Idea Repository', 'Idea Description', 'Idea Registered At'];
        $csv = $this->exportCsv($teams, $columns, $headers);
        $csvName = 'eca-teams-'.date('Y-m-d-His').'.csv';

        return response($csv, 200, [
            'Content-type'=>'text/csv',
            'Content-Disposition'=>sprintf('attachment; filename="%s"', $csvName),
            'Content-Length'=>strlen($csv)
        ]);
    }

    /**
     * Generates csv output from parameters
     */
    public function exportCsv($collection, $columns, $headers)
    {
        $separator = ';';
        $newline = "\n";
        $csv = '';

        foreach ($headers as $header)
        {
            $csv .= $header.$separator;
        }
        $csv = rtrim($csv, $separator);
        $csv .= $newline;

        foreach ($collection as $i)
        {
            foreach ($columns as $column)
            {
                if (strpos($column, '.') !== false)
                {
                    $e = $i;
                    foreach (explode('.', $column) as $p)
                        $e = $e[$p];
                    $csv .= str_replace("\n", '', $e).$separator;
                }
                else
                {
                    $csv .= str_replace("\n", '', $i[$column]).$separator;
                }
            }
            $csv = rtrim($csv, $separator);
            $csv .= $newline;
        }
        return $csv;
    }
}
