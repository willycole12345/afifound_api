<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Resources\TaskResourse;
use Illuminate\Support\Facades\Hash;

class UserCreationController extends Controller
{
    public function create(UserRequest $request){

        $validate = $request->validated();
       // dd($validate);
        try{
           //  $createUser = User::create($validate);
             
        $hashedPassword = Hash::make($validate['password']); 

        $createUser = User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => $hashedPassword, 
        ]);
              if( $createUser){
                $response['message'] = "Users Created Successfull";
                $response['status'] = "success";
            }else{
                $response['message'] = "Users cannot be created at the moment";
                $response['status'] = "failed";
            }
           
        } catch (\Exception $e) {

            $response['message'] = "Users Email already exist";
            $response['status'] = "failed";
           
        }
          return new TaskResourse($response);

    }
}
