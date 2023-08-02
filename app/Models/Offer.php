<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table="offers";
    protected $fillable = [
        'maintenance_center_id',
        'task_id',
        'description'
    ];
    public function tasks()
    {
        return $this->belongsToMany(Task::class);

    }
    public function user()
    {
        return $this->belongsTo(User::class,$foreign_key="maintenance_center_id");
    }
}
