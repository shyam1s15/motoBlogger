@extends('layouts.master_layouts.boat') 
@section('content2')




@endsection

@section('boat-name')
    {{ $boat_name }}
@endsection

@section('boat-desc')
    {{ $boat_desc }}
@endsection

@section('boat-subjects')
    @foreach ($boat_type as $type)
        {{ $type }}
        <br>
    @endforeach
@endsection