<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['nama'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}

