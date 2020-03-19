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
    
    <form autocomplete="off" action="forgot_pass" method="post">
      {{ csrf_field() }}
      @if (\Session::has("mail_not_exists"))
          <h3>{{ \Session::get("mail_not_exists") }}</h3>
      @endif
        <div class="form-group">
          <label for="inputEmail4">Mail will be sent to following Email address</label>
          <input type="email" class="form-control" id="inputEmail4" aria-describedby="emailHelp" name="email" autocomplete="new-password" required>
          <small id="emailHelp" class="form-text text-muted">We will ll never share your email with anyone else.</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>   
  </div>
</div>
@endsection
