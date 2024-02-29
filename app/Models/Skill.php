<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
   
    use HasFactory;
    // use SoftDeletes;   
    protected $table='skills';
    protected $fillable = ['skill'] ;

    public function user() {
        return $this->belongsToMany(User::class, 'user_skill', 'user_id', 'skill_id');
    }

    public function annoucement() {
        return $this->belongsToMany(Annoucment::class, 'annoucement_skill', 'annoucement_id', 'skill_id');
    }
}
