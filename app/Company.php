<?php

namespace App;
use App\Position;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'address','contact'
    ];

    public function position()
    {
        return $this->hasMany(Position::class);
    }
}
