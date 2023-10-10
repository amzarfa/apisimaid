<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPeran extends Model
{
    use HasFactory;
    protected $table = 'users_peran';
    protected $fillable = [
        'kode_peran',
        'nama_peran',
        'modul',
        'is_pusat',
        'is_del',
        'created_by',
        'updated_by',
    ];
}
