<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'alamat', 'email', 'telepon'];
}
