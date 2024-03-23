<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'maskapai';

    public function rute()
    {
        return $this->hasOne(Rute::class);
    }

    /**
     * Get all of the jadwal for the Maskapai
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function jadwal()
    {
        return $this->hasOneThrough(Jadwal::class, Rute::class);
    }
}
