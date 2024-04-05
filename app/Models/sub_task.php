<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_task extends Model
{
    protected $table = 'sub_tasks';
    protected $primaryKey = 'id';
    protected $fillable = ['statusID','taskID','title'];
}
