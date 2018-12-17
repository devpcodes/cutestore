@extends('layout.layout')
@section('content')
    <link rel="stylesheet" href="/css/core/login.css">
    <nav class="menu-breadcrumb">
        <!-- <ul>
            <li><a href="">Home</a></li>
            <li><a href="" class="active">註冊</a></li>
        </ul> -->
    </nav>
    <div class="content">
        <div class="container">
            <!-- <div class="sidebar">
                </div>	 -->
            <div class="form-container">
                <form action="/cutestore/registerhandler" method="post">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <legend>註冊新帳號  Sign Up</legend>
                        <div class="form-group">
                            <label for=""> 快速登入</label>
                            <div class="form-right">
                                <a href="/cutestore/facebooklogin" class="btn btn-login-fb">Facebook 註冊</a>
                                <a href="/cutestore/googlelogin" class="btn btn-login-gplus">Google + 註冊</a>
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
                            <label> 使用者名稱</label>
                            <span class="require">*</span>
                            <input name="name" type="nikename" class="form-control" placeholder="請輸入您的暱稱">
                        </div>
                        <div class="form-group">
                            <label> 密碼 Password</label>
                            <span class="require">*</span>
                            <input name="password" type="password" class="form-control" placeholder="請輸入您的密碼">
                        </div>
                        <div class="form-group">
                            <label> 確認密碼 Password Re-type</label>
                            <span class="require">*</span>
                            <input name="password_confirmation" type="password" class="form-control" placeholder="請輸入您的密碼">
                        </div>
                        <div class="form-group">
                            <input name="check" type="checkbox">我已經閱讀服務條款並同意註冊為會員
                        </div>
                    </fieldset>
                    <div>
                        <a href="/cutestore/login" class="btn btn-default">返回登入</a>
                        <button type="submit" class="btn btn-primary">送出</button>
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
                    </div>
                </form>
            </div>	<!-- form-container	end -->
        </div>	<!-- container	end -->
    </div>
@stop