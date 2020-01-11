<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Http\Helpers\Helpers;
use Auth;

class UserController extends Controller
{
    protected $user;
    protected $helpers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Helpers $helpers)
    {
        $this->user = $user;
        $this->helpers = $helpers;
    }

    public function register(Request $request)
    {
        $request->request->add(['password' => Crypt::encrypt($request->password)]);
        $results = $this->user->create($request->all());
        return $this->helpers->response(true,$results);
    }

    public function login(Request $request) 
    {
        $password = $request->password;
        $username = $request->username;
        $getUser = $this->user->where(function($q) use ($username){
            $q->where('username',$username);
            $q->orWhere('email',$username);
        })->first();
        // dd(Crypt::decrypt($getUser->password) == $password);
        if(!is_null($getUser) && Crypt::decrypt($getUser->password) == $password) {
            $key = Crypt::encrypt($getUser->username);
            $getUser->token = $key;
            Cache::store('redis')->put('user_'.$key,json_decode($getUser));
            
            return $this->helpers->response(true,Cache::get('user_'.$key));
        }
        return $this->helpers->response(false,'','Username atau password anda salah');
    }
    //

    public function test(Request $request)
    {
        return $this->helpers->response(true,json_encode(Auth::user()));
    }
}
