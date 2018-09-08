<?php
namespace APP\Http\Controllers;
use app\model\privilege;
use App\Http\Controllers\Auth\RegisterController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController
{
    public function getPrivilege()
    {
        $user = Auth::user();
        $privilege=$user->privileg()->get();
        foreach ($privilege as $previleg)
        if($user->Privileg()->find(1)!= null || $user->Privileg()->find(2)!= null || $user->Privileg()->find(3)!= null)
        {
            return view('panel');
        }
        else {
            return redirect(url('/'));
        }
    }
    public function getNewManager()
    {
        $user = Auth::user();
        if($user->Privilege()->find(1)!= null)
        {
            return view('new-manager');
        }
        else{
            return redirect(url('/panel'));
        }
    }
}