<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     use HasFactory;

    protected $table = 'task'; 

     protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    //  'title' =>['required','string','max:255'],
    //         'description'=>['required','string'], 
    //         'status'=>['string','max:25'],,
            // 'user_id'=>,
}
