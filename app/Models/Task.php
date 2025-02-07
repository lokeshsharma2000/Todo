<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
protected $table='tasks';

protected $fillable = [
    'title', 'description', 'status', 'user_id', 'admin_id',
];

public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
