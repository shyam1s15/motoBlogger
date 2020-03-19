<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--  <tcitle>{{ config('app.name', 'Laravel') }}</title>  --}}

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel = "icon" href =  {{ asset('/imgs/class_logo.png') }}
            type = "image/x-icon"> 

    <title> Easy Studies </title>

<style>
body {
  font-family: "Lato", sans-serif;
  background-color: black;
  color: white;
  overflow-x: hidden;
  {{-- overflow-y: hidden;  --}}
}
span{
    margin-left: 10px;
    margin-top: 10px;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  text-align:center;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;

}

.sidenav a:hover{
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.nopadding > div[class^="col-"] {
    padding-right: 0;
    padding-left: 0;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.uname{
  bottom: 0;
  font-size: 15px;
  
}
.btn-theme{
  margin-left: 20px;
}
.end-of-display{
  height: 100%;
}
.inp-search{
  display: block; 
  width: 500px;
  margin-left: 50px;
}
.just-stick-here{
  position: -webkit-sticky;
  position: sticky;
  top: 0;
}
.just-stick-here>*{
  {{-- z-index: 0; --}}
  
}
</style>
</head>
{{--  body starts here  --}}
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  @yield('sidebar')

  @if (Session::has('logged_user'))
    <a href="#" class="uname"><h3 class="uname">{{ Session::get('logged_user') }}</h3></a>    
  @endif
  <a href="/boat/show">Joined clans</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Profile</a>
  @if (Session::has('logged_user'))
    {{-- {{ Session }} --}}
    <a href="/logout" id="logout">Log Out</a>
  @else
    <a href="/login_users" id="login">login</a>
    <a href="/sign_up_users" id="signup">Sign up</a>  
  @endif
  <button class="btn-theme" onclick="changeTheme()">change theme</button>
  
</div>

{{--  <br>  --}}
<div class="container-fluid just-stick-here">
  <div class="row nopadding">
      
      <div class="col-md-2">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; suit Up</span>
        {{-- the below form is created to go inside active clan --}}
      </div>
      <div class="col-md-2">
          <form action="#" method="get" class="inline">
            <button type="submit" class="btn btn-light" style="width:100%">Clan: Light</button>
          </form>
      </div>
        
      {{--  <!-- Search form -->  --}}
      <div class="form-group mb-3 col-md-6">
        <form action="/search" method="get">
          <div class="input-group"> 
            <input type="text" class="form-control" name="seach-bar" placeholder="(#boat, @user)" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">&#128269; Search</button>
              </div>
          </div>
        </form>
      </div>      
      {{-- The form btn will redirect to create page --}}
      <div class="col-md-2">
            <form action="/boat/create" method="get">
                  <button type="submit" class="btn btn-danger" style="width:100%">&#10084; create boat</button>
            </form>
      </div>

    {{--  compulsory to make work in other pages  --}}
    </div>
  </div>
  {{-- please note the base does not even look for child styles--}}
  <main class="py-4" id="myContents">
    @yield('content')
    {{-- the below line of code used to make display color full height --}}
    <div class="test-cover-100" style="height: 100vh"></div>
  </main>
  
@yield('scripts')
<script>
  var w_theme = 0;
    function openNav() {
  document.getElementById("mySidenav").style.width = "20%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function changeTheme(){
  if (w_theme == 0){
    {{-- document.body.style.backgroundColor = "white"; --}}
    document.getElementById("myContents").style.backgroundColor="white";
    document.getElementById("myContents").style.color="black";


    {{--The below code is used to cover the remaining portion but failed  --}}
    {{-- document.getElementsByClassName("end-of-display").style.backgroundColor="white"; --}}

    w_theme = 1;
  }
  else{
    document.getElementById("myContents").style.backgroundColor="black";
    document.getElementById("myContents").style.color="white";


    {{--The below code is used to cover the remaining portion but failed  --}}
    {{-- document.getElementsByClassName("end-of-display").style.backgroundColor="black"; --}}
    w_theme = 0;
  }
}

</script>
   
</body>
</html> 
                                                                                    