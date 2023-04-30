<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 1;
    const PENDING_payment = 7;
    const APPROVED = 4;
    const REJECTED = 6;
    const EXPIRED = 5;
    

    const REGISTRO = 1;
    const VIRTUAL = 2;
    const TANGIBLE = 3;

    const PTS_ASIGNAR = 1;
    const PTS_ASIGNADOS = 2;
    const PTS_SUMADOS = 3;

    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'content' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addPoints()
    {
        return $this->hasMany(Point::class);
    }
}
