<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reminder extends Model
{
    protected $table = 'reminders';
    protected $primaryKey = 'id';
    protected $fillable = ['date','time'];
}
