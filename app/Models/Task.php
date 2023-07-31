<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'city',
        'car_model',
        'description'];
    public function services()
    {

        return $this->belongsToMany(Service::class);

    }

    // Make a function that prints all the offers for the user
    // and in the view, each mc can only edit his own offer
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,$foreign_key="customer_id");
    }

// public function Offers()
// {
//     return $this->hasMany(Offer::class, 'maintenance_center_id', 'user_id');
// }
}
