@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
  <h1 class="page-header">Dashboard</h1>

  <div class="row placeholders">
    <div class="col-xs-6 col-sm-3 placeholder">
      <h4>{{ $members }}</h4>
      <span class="text-muted">Members</span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <h4>{{ $groups }}</h4>
      <span class="text-muted">Teams</span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <h4>{{ $ideas }}</h4>
      <span class="text-muted">Ideas</span>
    </div>
    <div class="col-xs-6 col-sm-3 placeholder">
      <h4>{{ $lcs }}</h4>
      <span class="text-muted">LCs</span>
    </div>
    <div>
      <h1>Welcome to the admin panel of EESTech Challenge!</h1>
      <h4>
        International IT Team Reminds you: With great power comes great responsibility!
      </h4>
    </div>
  </div>
@endsection
