<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $guarded = ['name'];  

    public function orders()
    {
        return $this->hasMany('App\Models\Orders');
    }
}
