<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'preson';
    protected $fillable = ['full_name', 'gender', 'birthdate','phone_number','address'];
}
