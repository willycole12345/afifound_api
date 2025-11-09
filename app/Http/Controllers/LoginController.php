<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\TaskResourse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(LoginRequest $request){
     
        $resonse = array();

        $validate = $request->validated();

         try {

            $user = User::where('email', $validate['email'])->first();

             if (! $user || ! Hash::check($request->password, $user->password)) {
              
                $response['message']="Please check your email and password";
                $response['status']= "Failed";

            }else{

                 $response['message']= $user;
                $response['usersToken']=$user->createToken($validate['email'])->plainTextToken;
                $response['status']= "Success";
            }

            } catch (\Exception $e) {
                 $response['message']="Users Record does not Exist";
                $response['status']="Failed";

         }
    
          return new TaskResourse($response);

    }
}
