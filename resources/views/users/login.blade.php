@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/login.css">
    <nav class="menu-breadcrumb">
        <!-- <ul>
            <li><a href="">Home</a></li>
            <li><a href="" class="active">登入</a></li>
        </ul> -->
    </nav>
    <div class="content">
        <div class="container">
            <!-- <div class="sidebar">
            </div>	 -->
            <div class="form-container">
                <form action="/cutestore/loginhandler" method="post">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <legend>帳號登入  Sign In</legend>
                        <div class="form-group">
                         <label for=""> 快速登入</label>
                            <div class="form-right">
                                <a href="/cutestore/facebooklogin" class="btn btn-login-fb">Facebook 登入</a>
                                <a href="/cutestore/googlelogin" class="btn btn-login-gplus">Google + 登入</a>
                            </div>
                        </div>
                        <!-- <br> -->
                        <span class="or">or</span>
                        <div class="form-group">
                            <label> 信箱 Email</label>
                            <span class="require">*</span>
                            <input name="email" type="email" class="form-control" placeholder="請輸入您的電子郵件">
                        </div>
                        <div class="form-group">
                            <label> 密碼 Password</label>
                            <span class="require">*</span>
                            <input name="password" type="password" class="form-control" placeholder="請輸入您的密碼">
                        </div>
                    </fieldset>
                    <div>
                        <a href="/cutestore/register" class="btn btn-default">註冊</a>
                        <button type="submit" class="btn btn-primary">登入</button>
                        @if($errors->any())
                            <ul>
                                <br>
                                @foreach($errors->all() as $error)
                                    <li style="color: red;">
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if(Session::has('user_login_failed'))
                            <div style="color: red;">
                                {{Session::get('user_login_failed')}}
                            </div>
                        @endif
                    </div>
                </form>

            </div>	<!-- form-container	end -->
        </div>	<!-- container	end -->
    </div>
@stop