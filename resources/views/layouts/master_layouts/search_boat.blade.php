@extends('layouts.master_layouts.base') 
<style>
    .mid-label{
        width: 100%;
        border: 2px solid gold;
    }
    .control-inner-row{
        height: 30px;
    }
</style>

@section('content')
<div class="container-fluid"></div>
    <div class="row">
        <div class="col-md-2">
            <h3><span class="badge badge-info mid-label">Suggested @yield('boat-or-user')</span></h3>
        </div>
        <div class="col-md-6">
           <h3><span class="badge badge-success mid-label">Make a Good Decision for your studies</span></h3>
            <h3><span class="badge badge-success mid-label">@yield('quote-of-the-day')</span></h3>
        </div>
        <div class="col-md-4">
           <h3><span class="badge badge-success mid-label">Python makes life easy</span></h3>
           <h3><span class="badge badge-success mid-label">@yield('specific-quote')</span></h3>
        </div>
    </div>
</div>

    
@yield('content2')

@endsection