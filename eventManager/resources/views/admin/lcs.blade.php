@extends('admin.layout')

@section('title', 'LCs')

@section('content')
  <h1 class="page-header">LCs</h1>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>LC</th>
          <th>Ambassador</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lcs as $lc)
        <tr>
          <td>{{ $lc->id }}</td>
          <td><a href="/admin/showLC/{{ $lc->id }}">{{ $lc->name }}</a></td>
          <td>
            @if ($lc->ambassador)
              {{$lc->ambassador->first_name}}
            @else
              No ambassador!
            @endif
          </td>
          <th><button><a href="/admin/removeLC/{{ $lc->id }}">Remove</a></button></th>
        </tr>
        @endforeach
      </tbody>
    </table>
    <button><a href="/admin/newLC">Add an LC</a></button>
  </div>
@endsection
