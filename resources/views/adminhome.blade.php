@extends('layouts.head')
@section('pageName', 'Admin Portal')

@section('content')

<div id="staff" class="d-flex align-content-center lewhomediv">
  <span class="display-4 text-center
  font-weight-bold m-auto lewhomepicspan"
  >{{ 'Welcome ' }} <br> {{  Auth::user()->first_name }}</span>
</div>
<div class="container-fluid">
    <admin-container></admin-container>
    <vue-progress-bar></vue-progress-bar>
</div>

@endsection

