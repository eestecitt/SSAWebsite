@extends('admin.layout')

@section('title', 'Members')

@section('sidebar')
  @parent
  <ul class="nav nav-sidebar">
    <li><a href="/admin/members/csv">Export CSV</a></li>
  </ul>
@endsection

@section('content')
  <h1 class="page-header">Members</h1>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>First name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>LC</th>
          <th>Team</th>
          <th>Registered</th>
          <th>Faculty</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($members as $member)
        <tr>
          <td>{{ $member->first_name }}</td>
          <td>{{ $member->last_name }}</td>
          <td>{{ $member->email }}</td>
          <td>
            @if ($member->lc)
              {{ $member->lc->name }}
            @else
              -
            @endif
          </td>
          <td>{{ $member->group->name }}</td>
          <td>{{ $member->created_at }}</td>
          <td>{{ str_limit($member->faculty, 50) }}</td>
          <td>
            <button><a href="/admin/removeMember/{{ $member->id }}">Remove</a></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
