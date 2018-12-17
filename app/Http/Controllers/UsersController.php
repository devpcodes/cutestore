<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Overtrue\LaravelSocialite\Socialite;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_check',['only'=>['register','store','login','facebook','google','loginhandler']]);
    }
    public function index()
    {
        //0
    }

    public function register(){
        return view('users.register');
    }

    public function store(Requests\RegisterRequest $request)
    {
        $user = \App\User::create($request->all());
        \Auth::login($user);
        return redirect('/cutestore/');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookLogin()
    {
        //取得資料
        $fbUser = Socialite::driver('facebook')->user();

        //驗證是否會員
//        if (\Auth::attempt(['email' => $fbUser->getEmail(), 'password' => $fbUser->getId()])) {
//            // 認證通過...
//            return redirect('/cutestore/');
//        };
        $user = \App\User::select('id','email')
            ->where('email', $fbUser->getEmail())
            ->get();

        if(!empty($user)){
            \Auth::loginUsingId($user[0]->id);
            return redirect('/cutestore/');
        }else{
            //註冊
            $user = \App\User::create([
                'name'=>$fbUser->getName(),
                'email'=>$fbUser->getEmail(),
                'password'=>$fbUser->getId(),
                'fb_id'=>$fbUser->getId()
            ]);
            \Auth::login($user);
            return redirect('/cutestore/');
        }
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLogin()
    {
        //取得資料
        $gooUser = Socialite::driver('google')->user();

        //驗證是否會員
//        if (\Auth::attempt(['email' => $gooUser->getEmail(), 'password' => $gooUser->getId()])) {
//            // 認證通過...
//            return redirect('/cutestore/');
//        }

        //遇到沒寫名字的會員設定預設名
        if($gooUser->getName()==""){
            $gooName = "member";
        }else{
            $gooName = $gooUser->getName();
        }

        $user = \App\User::select('id','email')
            ->where('email', $gooUser->getEmail())
            ->get();

        if(!empty($user)){
            \Auth::loginUsingId($user[0]->id);
            return redirect('/cutestore/');
        }else{
            //註冊
            $user = \App\User::create([
                'name'=>$gooName,
                'email'=>$gooUser->getEmail(),
                'password'=>$gooUser->getId(),
                'goo_id'=>$gooUser->getId()
            ]);
            \Auth::login($user);
            return redirect('/cutestore/');
        }

    }

    public function login()
    {
        return view('users.login');
    }

    public function loginhandler(Requests\LoginRequest $request)
    {
        if (\Auth::attempt(['email' => $request->get("email"), 'password' => $request->get("password")])) {
            // 認證通過...
            return redirect('/cutestore/');
        }
        \Session::flash('user_login_failed','密碼不正確或email錯誤');
        return redirect('/cutestore/login')->withInput();
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/cutestore/');
    }
}
