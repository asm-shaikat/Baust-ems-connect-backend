<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller{

    public function register(Request $request){
        $member = new Member();
        $member->name = $request->has('name') ? $request->get('name') : "";
        $member->email = $request->has('email') ? $request->get('email') : "";
        $member->password = Hash::make($request->has('password') ? $request->get('password') : "");
        $member->membertype = $request->has('membertype') ? $request->get('membertype') : "public";
        $member->save();
    }

    public function login(Request $request){
        $user = Member::where('email', $request->email)->first();
        if ( !$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Welcome'],
            ]);
        }
        else {
            return $user;
        }
        }
}