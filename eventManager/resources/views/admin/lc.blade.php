@extends('admin.layout')

@section('title', 'LC')

@section('content')
  <h1 class="page-header">LC {{$lc->name}}</h1>

  <div class="table-responsive">
    <h2>Members</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Birthdate</th>
          <th>Faculty</th>
          <th>Phone Number</th>
          <th>T-Shirt Size</th>
          <th>Group</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($members as $member)
        <tr>
          <td>{{ $member->id }}</td>
          <td>{{ $member->first_name}} {{$member->last_name}}</td>
          <td>{{ $member->email }}</td>
          <td>{{ $member->birthdate }}</td>
          <td>{{ str_limit($member->faculty, 50) }}</td>
          <td>{{ $member->number }}</td>
          <td>{{ $member->tshirt }}</td>
          <td>{{$member->group->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <h2>Groups</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($groups as $group)
        <tr>
          <td>{{ $group->id }}</td>
          <td>{{ $group->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
