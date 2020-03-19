@extends('layouts.master_layouts.base') 

<style>
    .system-msg{
        font-size: 30px;
        text-align: center;
        color: hotpink;
    }
    .mcq-question{
        {{-- font-size: 30px; --}}
        text-align: center;
        
    }
    .loved{
        font-family: cursive;
        background: -webkit-linear-gradient(right, green, grey 50%, grey 40%, white);
        color: black;
        font-weight: bold;
    }
    .beloved{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }


</style>
@section('content')
<div class="system-msg">
    Cool Here are our Collabraters, Let &#39;s check them out
</div>

<div class="container">
    @foreach ($result as $question=>$values)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-warning mcq-question " role="alert">
                    {{ $question }} <br>
                </div>
            </div>
        </div>
        @for ($i = 0; $i < count($values); $i+=3)
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="alert alert-primary mcq-answer-guy mb-0">
                    {{ $values[$i] }}
                </div>
            </div>
            <div class="col-md-4">
                {{-- <div class=""> --}}
                    <div class="alert alert-success mcq-answer mb-0 {{ $values[$i+2] }} ">
                        {{ $values[$i+1] }}
                    </div>
                {{-- </div> --}}
            </div>
        </div>
            {{-- <div class="is-correct">
                {{ $values[$i+2] }}
            </div> --}}
            <br>
        @endfor
        
        <br>
    @endforeach
</div>
@endsection


