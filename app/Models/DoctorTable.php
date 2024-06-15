<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTable extends Model
{
    use HasFactory;

    protected $table = 'doctor';
    protected $primaryKey = 'doctor_id';
    protected $fillable = [
        'hospital_id',
        'poliklinik_id',
        'name_doctor',
        'gender',
        'nip_doctor',
        'address',
        'no_phone',
    ];

    public function docterToHospital(){
        return $this->belongsTo(HospitalTable::class, 'hospital_id');
    }

    public function docterToPoliklinik(){
        return $this->belongsTo(PoliklinikTable::class, 'poliklinik_id');
    }

    public function docterToMedical(){
        return $this->hasMany(PoliklinikTable::class, 'doctor_id');
    }



}
