<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['visi', 'misi', 'tujuan', 'motto', 'struktur_organisasi'];
}
