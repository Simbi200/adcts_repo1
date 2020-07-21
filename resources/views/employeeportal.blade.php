@extends('layouts.head')
@section('pageName', 'Employees\' Portal')


@section('content')
 <div id="app">
    <div >
        <div class="wrapper d-flex align-items-stretch">

      <div id="content" class="p-4 p-md-5">

        <router-view></router-view>
        <vue-progress-bar></vue-progress-bar>
             </div>
		</div>
  </div>
@endsection

