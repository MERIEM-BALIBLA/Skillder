<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annoucment extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='annoucments';

    protected $fillable=['title','content','company_id'];

    public function company() {
        // relation one to many
        return $this->belongsTo(Company::class, 'company_id');
        // supprimer company et sauvegarder annoucement : composission faible
        // return $this->belongsTo(Company::class, 'company_id')->withTrashed();
    }

    public function skills() {
        return $this->belongsToMany(Skill::class, 'annoucement_skill', 'annoucement_id', 'skill_id');
    }

    // public function users() {
    //     return $this->belongsToMany(User::class, 'annoucement_user', 'annoucement_id', 'user_id ');
    // }
    public function users() {
        return $this->belongsToMany(User::class, 'annoucement_user', 'annoucement_id', 'user_id');
    }
    
}
