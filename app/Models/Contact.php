<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fio', 'company_name', 'phone', 'email', 'birth_date', 'foto'];
    protected $visible = ['id', 'fio', 'company_name', 'phone', 'email', 'birth_date', 'foto'];
}
