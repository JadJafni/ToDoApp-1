<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id';
    protected $fillable = ['status_type','date'];
}
