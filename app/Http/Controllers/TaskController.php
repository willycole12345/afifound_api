<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResourse;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(TaskRequest $request){
        $response = array(); 
        $validate = $request->validated();
         $createtask = Task::create($validate);
         
         if($createtask){
            $response['message']="Task Created Successfully";
             $response['record']=$createtask;
            $response['status']="success";
         }else{
            $response['message']="Task Not Created";
            $response['status']="failed";
         }

        return new TaskResourse($response);
    }

    public function TaskStatus($status){
        $response = array();
        $record= Task::where('status', $status)->get();

        if($record){
             $response['message']= "Tasks Record Successfully";
            $response['record']= $record;
            $response['status']="success";
        }else{
             $response['message']= "No record found";
            $response['status']="failed";
        }
        return new TaskResourse($response);

    }

    public function TaskList(){

        $response = array();
        $record= Task::orderBy('id', 'desc')->paginate(15);
        if($record){
             $response['message']= "Tasks Record Successfully";
            $response['record']= $record;
            $response['status']="success";

        }else{
            $response['message']= "No Task Assign to this User";
            $response['status']="failed";
        }
        return new TaskResourse($response);
    }

    public function view($user_id){

        $response = array();
        $record=Task::where('user_id', $user_id)->orderBy('id', 'desc')->paginate(15);
        if($record){
             $response['message']= "Tasks Record Successfully";
            $response['record']= $record;
            $response['status']="success";

        }else{
            $response['message']= "No Task Assign to this User";
            $response['status']="failed";
        }
        return new TaskResourse($response);
    }
    

    public function update(TaskRequest $request,$recordID){
        
        $validate = $request->validated();

        $enrollment = Task::where('id', $recordID)->update([
            'title'=> $validate['title'],
            'description'=> $validate['description'],
            'status'=> $validate['status'],
            'user_id'=> $validate['user_id']
        ]);

        if($enrollment){
           $record= Task::where('user_id', $validate['user_id'])->orderBy('id')->paginate(15);
            $response['message']= "Task Update Successfully";
             $response['record']=$record;
            $response['status']="success";
        }else{
            $response['message']= "Task Update failed";
            $response['status']="failed";
        }
         return new TaskResourse($response);
    }

    public function delete($id){
        $response = array();
        $record= Task::where('id', $id)->delete();

        if($record){
            
            $response['message']= "Record has been deleted successfully";
            $response['status']="success";

        }else{
            $response['message']= "No Task Assign to this User";
            $response['status']="success";
        }
        return new TaskResourse($response);
    }
    
}
