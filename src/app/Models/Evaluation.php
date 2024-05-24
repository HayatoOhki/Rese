<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'evaluation',
        'comment',
    ];

    public function reservation() {
        return $this->hasone(reservation::class);
    }
}
