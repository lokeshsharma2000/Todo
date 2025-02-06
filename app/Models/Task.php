<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
protected $table='tasks';

protected $fillable = [
    'title', 'description', 'status', 'user_id', 'admin_id',
];
}
