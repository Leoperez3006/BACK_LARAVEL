<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = [
        "name",
        "p_lastname",
        "m_lastname",
        "address",
        "email"
    ];

    public $timestamps = false;
}
