@extends('layouts.master_layouts.base')
<style>
    .box{
        margin-left: 350px;
        border: 2px solid red;
        padding: 20px;
        margin-right: 280px;
    }

    .cust-location{
        text-align: left;
    }
</style>

@section('content')

    <div class="box">
        @if (session()->has('boatExists'))
            <h1>{{ session()->get('boatExists') }}</h1>
        @endif
        <form autocomplete="off" action="{{ env('APP_URL') }}/boat/create" method="post">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="">Boat Name</label>
                <input type="text" class="form-control" id="" name = "boat-name" placeholder="My Empire" required value={{ old('') }}>
              </div>
              <div class="form-group col-md-6">
                <label for="">Type</label>
                <input type="text" class="form-control" id="inputPassword4abc" autocomplete="" name="boat-type" required placeholder="types are seprated by space">
              </div>
            </div>

            <div class="form-group ">
                <label for="inputState">Country</label>
                <select id="inputState" class="form-control" name="country">
                  <option selected>International</option>
                  <option>India</option>
                  <option>Pakistan</option>
                  <option>USA</option>
                  <option>Sri Lanka</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="boat-desc"placeholder="This Boat Is ChuZmaKa"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Create Boat</button>
          </form>
    </div>

<script>
    {{-- function changeTypeInput() --}}
</script>
@endsection
