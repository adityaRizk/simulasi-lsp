<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jadwal_penerbangan';

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }

    /**
     * Get all of the maskapai for the Jadwal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function maskapai()
    {
        return $this->hasOneThrough(Maskapai::class, Rute::class);
    }


}
