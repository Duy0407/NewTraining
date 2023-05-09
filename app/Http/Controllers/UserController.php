<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistersRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

class UserController extends Controller
{

    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // view login
    public function showLogin(){
        return view('login');
    }

    // view register
    public function showRegister(){
        return view('register');
    }

    // API login
    public function login(Request $request){
        $credentials = $request->only(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Thông tin lỗi'
            ], 401);
        }else{
            $user = Auth::user();
            $token = $user->createToken('auth-token')->accessToken;
            // return response()->json([
            //     'access_token' => $token,
            //     'token_type' => 'Bearer',
            // ]);
            return redirect()->route('welcome.index');
        }
    }

    // API register
    public function register(RegistersRequest $request){
        $this->userService->createUser($request->all());
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
