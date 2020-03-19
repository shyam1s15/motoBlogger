@extends('layouts.master_layouts.base')
<style>
    .box{
        margin-left: 350px;
        border: 2px solid red;
        padding: 20px;
        margin-right: 280px;
    }
</style>
@section('content')

    <div class="box">
      @if (\Session::has('user_exists'))
        <h2> {{ \Session::get('user_exists') }} </h2>
      @endif
        <form autocomplete="off" action="/sign_up_users" method="post">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" autocomplete="new-password" name = "email"required value={{ old('email') }}>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4abc" autocomplete="new-password" name="password" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="addr1" value={{ old('addr1') }}>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="addr2" value={{ old('addr2') }}>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" value= {{ old('city') }}>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="state">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="zipcode" value={{ old('zipcode') }}>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Keep me logged in
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign Yup</button>
          </form>
    </div>
@endsection
