<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;
    protected $table = 't_log_activity';
    protected $fillable = ['idt_user', 'page', 'name', 'activity', 'method', 'key', 'keyname', 'created_at'];
}
