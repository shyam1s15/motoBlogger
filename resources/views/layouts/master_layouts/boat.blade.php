@extends('layouts.master_layouts.base')
<style>
   .cust-logo {
       max-width: 80%;
       max-height: 80%;
       margin-left: 0px;
       padding: 0%;
       margin-top: 0;
   } 
   .logo-text{
       color : darkslateblue;
       font-size: 12px;
   }
   .logo{
       margin-left: 10px;
       border: none;
   }
   .adj-join-btn{
       margin-left: 50px;
       width: 100px;
        margin-top: 50px;

   }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
    {{-- The below size is only occupied for image--}}
        <div class="col-md-2">
            <div class="out-frame">
                <div class="logo">
                    <img src=" {{ asset('boat/logos/fire.jpeg') }} " alt="..." class="img-logo cust-logo">
                </div>
            </div>
        </div>
    {{-- The below size is occupied for name and tags and basic info--}}
        <div class="col-md-4">
            <div class="boat-name">
                {{-- <h1>genius and billionar</h1> --}}
                <h1>@yield('boat-name')</h1>
            </div>
            <div class="boat-subjects">
                
                @yield('boat-subjects')
            </div>
        </div>
        {{-- The below size is occupied for descriptional part --}}
        <div class="col-md-4">
            <div class="boat-description">
                {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque illum ex quisquam incidunt? Nulla dicta molestias dolore fugiat odit, totam animi! Neque veniam pariatur impedit aliquid nam libero. At, praesentium? --}}
                @yield('boat-desc')
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success adj-join-btn">Join</button>
        </div>
    </div>
</div>
@yield('content2')
@endsection