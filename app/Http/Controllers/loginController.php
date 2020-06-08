<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;

// documentation of this file please read it for overview of each function:::
/**
 *      sendMail($email,$pass) is function used when signup
 *      getSignUp() function is just an brige for redirect to target page
 *      postSignUp() function will have actual all logics for bad sign up,
 *                  successful sign up,it will
 *      checkMail() function will be used when user confirms from his mail for signups
 *      getLogIn() function is just an brige
 *      postLogIn() function have actual login and will redirect back if bad details or
 *                  redirect to result page
 *      getForgotPass() function is just an brige
 *      postForgotPass() function will actually get data, please note it will take
 *                  help of forgotPassMail($email) function to send mail
 *      forgotPassMail($email) function is an helper function used to send mail using
 *                  encrypted key with the link itself so hackers can be attracted
 *      getResetPass() function will be used when user aggred for reset pass through mail
 *                  where user will be redirected to page as they are authenticated
 *      postResetPass() function simple function with update query and validation
 */
class loginController extends Controller
{
    //
    public function sendMail($email,$pass){
        $hashpass = \Hash::make($pass);

        $details = [
            'title' => 'please Sign Up using below below mail',
            'body' => 'Dear User please click below link to confirm your registation,
                        if you believe this is not done by you please ignore it thankyou
                        for your time and attention',
            'link'=> "{{ env('APP_URL)' }}/checkMail?mail=". $email . '&pass=' . $hashpass ,
        ];

        \Mail::to($email)->send(new \App\Mail\SendMailable($details));
    }
    // this function will only called for entry well no authenication is required here.

    public function getSignUp(){
        return view('layouts.logups.sign_up');
    }

    // in this below function we need to authenticate as well database queries must be checked here

    public function postSignUp(){
        $users2 = \DB::table('students')->where('email','=', $_POST['email'])->get();

        // return view('layouts.logups.test', ['users' => $users2]);
        if(count($users2) != 0){
            return redirect()->back()->with('user_exists','just dont do that')->withInput();
        }
        // else section will not be executed as we are returned allready

        $ans = \DB::table('tempStudents')->insert([
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'address'=>$_POST['addr1'],
            'address2'=>$_POST['addr2'],
            'city'=>$_POST['city'],
            'state'=>$_POST['state'],
            'zipcode'=>$_POST['zipcode']
        ]);

        $this->sendMail($_POST['email'],$_POST['password']);
        return view('layouts.logups.result_of_signup_login',['result'=>'Pre Signed Up']);
        // we must redirect user to welcome page that page is still not created...
    }

    public function checkMail(){

        $email = $_GET['mail'];
        $pass = $_GET['pass'];

        $ans = \DB::table('tempStudents')->select('email','password')->where('email','=',
        $email)->get()->first();

        if( strcmp($pass,\Hash::make($ans->password)) ){

            // most hutyapa logic used here....simple but hard to implement when finding
            $val = \DB::table('tempStudents')->select('*')->where('email','=',$email)->first();

            $check_record_exists = \DB::table('students')->select('*')
            ->where('email','=',$email)->count();

            if ($check_record_exists != 0){
               return view('layouts.logups.result_of_signup_login',['result'=>'Sign Up failed']);
            }
            // really just use and stick to insert query like below or welcome to hell
            $test = \DB::table('students')->insert([
                'email'=>$val->email,
                'password'=>$val->password,
                'address'=>$val->address,
                'address2'=>$val->address2,
                'city'=>$val->city,
                'state'=>$val->state,
                'zipcode'=>$val->zipcode,
            ]);
        }
        // return $ans->password;
        // return strcmp($pass,\Hash::make($ans->password))?"true":"false";
        // return \Hash::check($ans->password,$pass)?"true":"false";
        return view('layouts.logups.result_of_signup_login',['result'=>'Signed Up']);
    }
    // function ended for sign ups lets focus on logins
    public function getLogIn(){
        return view('layouts.logups.login_users');

    }
    public function postLogIn(){
        $users2 = \DB::table('students')->where([
            ['email','=', $_POST['email']],
            ['password','=',$_POST['password']],
            ])->get();
        if(count($users2) == 0){
            return redirect()->back()->with('user_not_exists','invalid email address')->withInput();
        }
        // no else part so this is used for successfull login
        // \session(["logged_user"=>$_POST['email']]);
        app('App\Http\Controllers\UserSessionController')->storeLoggedUser($_POST['email']);
        return view('layouts.logups.result_of_signup_login',['result'=>"logged in"]);
    }

    public function getForgotPass(){
        return view('layouts.logups.forgot_pass');
    }
    public function postForgotPass(){
        $users2 = \DB::table('students')->where('email','=',$_POST['email'])->get();

        if(count($users2)==0){
            return redirect()->back()
            ->with('mail_not_exists','Bad Email');
        }

        $this->forgotPassMail($_POST['email']);
        return view('layouts.logups.result_of_signup_login',['result'=>"checkMail for pass"]);
    }
    public function forgotPassMail($email){
        $hashEmail = \Hash::make($email);

        $details = [
            'title' => 'Forgot password',
            'body' => 'be my friend u will be in profit, be my enemy i will get much profit',
            'link'=> "{{ env('APP_URL') }}/forgotPassMail?mail=". $email . '&pass=' . $hashEmail ,
        ];
        \Mail::to($email)->send(new \App\Mail\SendMailable($details));
        return view('layouts.logups.result_of_signup_login',['result'=>"checkMail for pass"]);
    }

    public function getResetPass(){
        if(\Hash::check($_GET['mail'], $_GET['pass'])){
            return view('layouts.logups.change_pass_file',
            [
                'mail'=>$_GET['mail'],
            ]);
        }
    }
    public function postResetPass(){
        if($_POST['password'] != $_POST['confirm-password']){
            return redirect()->back()->with('Bad_Password','Both password must be correct')->withInput();
        }
        $ans = \DB::table('students')->where([
            ['email','=', $_POST['mail']],
        ])->update(['password'=>$_POST['password']]);

        return view('layouts.logups.result_of_signup_login',['result'=>'success_pass_change']);
    }
}
