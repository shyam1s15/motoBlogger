@extends('layouts.master_layouts.base') 

<style>
    .boat-box{
        border : 7px solid red;
        border-block-end-color: aqua;
        border-top-color: hotpink;  
        border-radius: 10px;
        margin-top: 10px;
    }
    .boat-box>*{
        font-size: 20px;
    }
    
</style>
@section('content')


@foreach ($boats as $no => $boat)
{{-- <h1>{{ $boat->boat_name }}</h1> --}}
{{-- {{ $route_value = '/boat/name/' . $boat->name }}  --}}
<a href="{{ URL('/boat/name/'.$boat->boat_name . '/' . $boat->boat_id) }}">



    <div class="boat-box">
        <div class="row">
            {{-- reserved --}}
            <div class="col-md-1">{{ $no+1 }}</div>
            <div class="col-md-2">{{ $boat->boat_name }}</div>
            <div class="col-md-2"></div>
            <div class="col-md-2">level : {{ $boat->boat_level }}</div>
            <div class="col-md-2">members : {{ $boat->total_members }}</div>
            <div class="col-md-1">devs: {{ $boat->total_devs }}</div>
        </div>
    </div>
</a>
@endforeach





@endsection