<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discipline extends Model
{
    use HasFactory;
    protected $table = 'discipline';
    protected $primaryKey = 'discipline_id';
    public $timestamps = false;
}
