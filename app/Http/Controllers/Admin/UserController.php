<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function userList()
    {
        $user = App\User::orderBy('created_at','desc')->paginate(20);
        return view("admin.user.userlist",compact("user"));
    }

    public function updateUser(Request $request)
    {
        $password = \Hash::make($request->password);
        App\User::where('id',$request->id)
            ->update(['name'=>$request->name,'email'=>$request->email,'password'=>$password,'isadmin'=>$request->isadmin]);
        echo "OK";
    }

    public function delUser(Request $request)
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        App\User::destroy($request->id);
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        echo "OK";
    }
}
