@extends('layouts.master_layouts.base')
<style>
  .box{
      margin-left: 300px;
      border: 2px solid red;
      padding: 20px;
      {{-- width: 100%; --}}
      margin-right: 280px;
}
.link{
    margin-left: 20px;
}
</style>
@section('content')

<div class="package container-fluid">
  <div class="box">
    @if (\Session::has('Bad_Password'))
        <h2>{{ \Session::get('Bad_Password') }}</h2>
    @endif
    <form autocomplete="off" action="forgot_pass1" method="post">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="inputEmail4">Change password for : {{ $mail }}</label>
        </div>
        <div class="form-group">
          <label for="inputPassword1">Password</label>
          <input type="password" class="form-control" id="inputPassword4abc" name="password" autocomplete="new-password" required>
          <label for="inputPassword1">confirm-Password</label>
          <input type="confirm-password" class="form-control" id="inputPassword5abc" name="confirm-password" autocomplete="new-password" required>
            <input type="hidden" name="mail" value={{ $mail }}>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
  </div>
</div>
@endsection
