<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participant extends Model
{
    use HasFactory;
    protected $table = 'participant';
    protected $primaryKey = 'participant_no';
    public $timestamps = false;

    public function receptions(){
        return $this->hasMany(reception::class);
    }
}
