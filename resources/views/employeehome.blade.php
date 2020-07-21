@extends('layouts.head')
@section('pageName', 'Employee Portal')




@section('content')
 <div id="app">

  <div id="staff" class="d-flex align-content-center lewhomediv">
    <span class="display-4 text-center
    font-weight-bold m-auto lewhomepicspan"
    >{{ 'Welcome '.Auth::user()->first_name }}</span>
  </div>


    <!-- Page Content  -->
  <div id="content">
    <employee-container></employee-container>
    <vue-progress-bar></vue-progress-bar>



    </div>
@endsection

