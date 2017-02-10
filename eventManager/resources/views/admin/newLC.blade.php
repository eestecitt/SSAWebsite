@extends('admin.layout')

@section('title', 'LCs')

@section('content')
  <h1 class="page-header">New LC</h1>
  <form method="POST" action="/admin/createLC">
      {!! csrf_field() !!}

      <div>
          <label>Name</label>
          <input type="text" name="name" value="{{ old('name') }}">
      </div>
      <div>
          <label>Ambassador's Email</label>
          <b>Super Important!</b> The Ambassador needs to have registered first!!!!
          <input type="text" name="email" value="{{ old('email') }}">
      </div>

      <div>
          <button type="submit">add</button>
      </div>
  </form>
@endsection
