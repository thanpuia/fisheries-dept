<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required|min:2',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('Fisheries')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $user = DB::table('users')->where('email', $request->email)->first();
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('Fisheries')->accessToken;
            return response()->json(['success'=>'true',
            'token' => $token,
            // 'id'=>$user->id,
            'email'=>$request->email,
            'name'=>$user->name,
        ], 200);
        } else {
            return response()->json(['success'=>'false','error' => 'UnAuthorised'], 401);
        }
    }
}
