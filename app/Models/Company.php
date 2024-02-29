<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
   
    use HasFactory;
     use SoftDeletes;   
    protected $table='companies';
    protected $fillable = ['company_name','company_role','address'] ;
    public function CompanyAnnoucement(){
        return $this->hasMany(Annoucment::class,'company_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function (Company $company) {
            $company->CompanyAnnoucement()->delete();
        });
    }
}
