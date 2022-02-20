<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murmur extends Model
{
    use HasFactory;

    protected $table = 'murmur';

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function loud()
    {
        return $this->hasMany(Loud::class);
    }

    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
}
