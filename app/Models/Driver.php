<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'license'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
