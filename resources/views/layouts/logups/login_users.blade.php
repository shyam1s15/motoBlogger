@extends('layouts.master_layouts.base')
<style>
  .box{
      margin-left: 300px;
      border: 2px solid red;
      padding: 20px;
      margin-right: 280px;
}
.link{
    margin-left: 20px;
}
</style>
@section('content')

<div class="package container-fluid">
  <div class="box">
    @if (\Session::has('user_not_exists'))
        <h2>{{ \Session::get('user_not_exists') }}</h2>
    @endif
    <form autocomplete="off" action="login_users" method="post">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="inputEmail4">Email address</label>
          <input type="email" class="form-control" id="inputEmail4" aria-describedby="emailHelp" name="email" autocomplete="new-password" required value="{{ old('email') }}">
          <small id="emailHelp" class="form-text text-muted">We will ll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="inputPassword1">Password</label>
          <input type="password" class="form-control" id="inputPassword4abc" name="password" autocomplete="new-password" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="cbLogout">
          <label class="form-check-label" for="exampleCheck1">Logout at closing tabs</label>
          <a href="forgot_pass" class="link">forgot password</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
  </div>
</div>
@endsection
