<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTable extends Model
{
    use HasFactory;

    protected $table = 'patient';
    protected $primaryKey = 'patient_id';
    protected $fillable = [
      'name_patient',
      'gender',
      'place_of_birth',
      'date_of_birth',
      'age',
      'address',
      'no_phone'
    ];

    public function patientToRecords()
    {
        return $this->hasMany(RecordsDetailTable::class, 'patient_id');
    }

    public function patientToMedical()
    {
        return $this->hasMany(MedicalRecordsTable::class, 'medical_id');
    }
}
