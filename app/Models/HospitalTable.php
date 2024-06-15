<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalTable extends Model
{
    use HasFactory;

    protected $table = 'hospital';
    protected $primaryKey = 'hospital_id';
    protected $fillable = [
        'name_hospital',
        'address'
    ];

    public function hospitalToDocter(){
       return $this->hasMany(DoctorTable::class, 'doctor_id');
    }
}
