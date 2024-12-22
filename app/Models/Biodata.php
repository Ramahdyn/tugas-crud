<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin'];
}
