<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Validator; 


class AuthController extends Controller
{
    //

    public function __construct()
    {
       // $this->middleware('auth:api', ['except' => ['login', 'register']]); 
    }
    public function login (Request $request){
        $validator = Validator::make($request->all(), [
            'username'=> 'required', 
            'password' => 'required|string|min:5',
        ]); 

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $credentials = $request->only('username', 'password');
        $token = Auth::attempt($credentials);
        if(!$token ){
            return response()->json(['error' =>'Unauthorized'], 401); 
        }

        return $this->createNewToken($token);
    }

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'username'=>'required|string', 
            'password' => 'required|string|min:5',

        ]); 

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $user = User::create(
            array_merge(
                $validator->validated(), 
                ['password' => bcrypt($request->password)]
            )
            );

        return response()->json([
            'message' => 'Registered', 
            'user' => $user
        ]); 

    }

    public function logout(){
        auth()->logout();

        return response()->json(['message'=>'Logged out']);
    }

    public function dashboard(){
        return response()->json(auth()->user());
    }

    protected function createNewToken($token){
      
        $ttl = env('JWT_TTL'); 
        return response()->json([
            'access_token' =>$token, 
            'token_type' =>'bearer', 
            'expires_in' =>auth('api')->factory()->setTTL($ttl), 
            'user' => Auth::user() , 
            'status' => 200            
        ]);
    }


    public function refresh(){
        return  response()->json(auth()->user()); 
    }

}
