@extends('layouts.master_layouts.search_boat') 
<style>
    .img-setup{
        width: auto;
        height: 100px;
    }
    hr{
        background: red;
    }
    .join-btn{
        text-align: center;
        width: 90%;
        padding: 10px;
    }
</style>

@section('content2')
{{-- the below code will display all the  --}}
<div class="search-container">
    @foreach ($packet as $pack)
        <div class="row">
            <div class="col-md-2">
                <div class="boat-level">
                Level: {{ $pack['boat_level'] }}
                </div>
                <div class="boat-id">
                Boat ID: {{ $pack['boat_id'] }}

                </div>
                {{-- in this section some image should be displayed --}}
                <img src="{{ url('/boat/logos/earth.jpeg') }}" alt="img" class="img-setup">
            </div>
            <div class="col-md-6">
                {{ $pack['boat_name'] }}
                {{-- Access public or private? --}}
                <p>publically</p>
                <div class="tap-align-center">
                    tap to align center
                </div>
            </div>
            <div class="col-md-2">
                <div class="total-mem">
                total members {{ $pack['total_members'] }}
                </div>
                <div class="total-dev">
                total devs {{ $pack['total_devs'] }}
                </div>
                <div class="total-post">
                total posts {{ $pack['total_posts'] }}
                </div>
            </div>
            <div class="col-md-2">
                <a href="{{ url('/boat/name/' . $pack['boat_name'] . '/' . $pack['boat_id']) }}">
                    <button type="button" class="btn btn-success join-btn">Support</button>
                </a>
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection