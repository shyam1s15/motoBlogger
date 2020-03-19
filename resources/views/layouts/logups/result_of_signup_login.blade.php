@extends('layouts.master_layouts.base')

@section('user_name')
    {{ Session::get('logged_user') }}     
@endsection

@section('content')
    <div class="box">
        @if($result == "Sign Up failed")
            <h1>sorry to say the sign up has been failed please try again later</h1>
        @endif

        @if ($result == "Signed Up")
            <h1>congo for sign up</h1>
        @endif

        @if ($result == "Pre Signed Up")
            <h1>Hello User Good Day to you, Please check your mail</h1>
        @endif
        
        @if ($result == "logged in")
            <h1>Hii user you are successfully logged in</h1>
        @endif
        
        @if ($result == "checkMail for pass")
            <h1>Sorry for incoviniency user please reset your password using your mail</h1>
        @endif

        @if ($result == "success_pass_change")
            <h1>COngratulations user your password has been changed</h1>
        @endif
    </div>
    
@endsection