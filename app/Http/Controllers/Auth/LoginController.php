<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return ['email' => $request->email, 'password' => $request->password, 'status' => 'active'];
    }

    public function login(LoginRequest $request)
    {
        $user = User::firstWhere(['email' => $request->email]);
        if (!$user || !Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response(["message" => "The email or password is incorrect"], 404);
        }
        $token = $user->createToken('web');
        return response([
            'data' => $user,
            'token' => $token->plainTextToken
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $data=$request->validated();
        $data["password"]=Hash::make($data["password"]);
        $user = User::create($data);
        return response()->json(['message' => 'User registered successfully']);
    }


}
