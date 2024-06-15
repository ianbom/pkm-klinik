<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecordsTable extends Model
{
    use HasFactory;

    protected $table ='medicalRecords';
    protected $primaryKey = 'medical_id';
    protected $fillable = [
        'doctor_id',
        'records_id',
        'total_elektrolit',
        'diagnosa',
        'create_at'
    ];

    public function medicalToRecords(){
        return $this->belongsTo(RecordsDetailTable::class, 'records_id');
    }

    public function medicalToDoctor(){
        return $this->belongsTo(DoctorTable::class, 'doctor_id');
    }
}
