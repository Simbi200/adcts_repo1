@extends('layouts.head')
@section('pageName', 'Our Impact')


@section('content')


    <div id="app">
        <div class="d-flex align-content-center lewhomediv"
        style="background-image: url('/images/impact.jpg');">
            <span class="display-4 text-center font-weight-bold m-auto lewhomepicspan">
            Our Impact</span>
        </div>


      <div id="content" class="p-4 p-md-5">
        <router-view>
        </router-view>

		</div>
    </div>


@endsection


