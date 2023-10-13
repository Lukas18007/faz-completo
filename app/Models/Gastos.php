<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'value', 'user_id', 'dt_payment', 'payment_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
