@extends('layouts.head')
@section('pageName', 'About Us')

@section('content')


    <div id="app">
        <div class="d-flex align-content-center lewhomediv"
        style="background-image: url('/images/home1.jpg');">
            <span class="display-4 text-center lewhomepicspan
            font-weight-bold m-auto">
            What We Are</span>

        </div>
      <div id="content" class="p-4 p-md-5">
        <router-view>
        </router-view>

		</div>
    </div>


@endsection


