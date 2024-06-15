<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordsDetailTable extends Model
{
    use HasFactory;

    protected $table ='recordsDetail';
    protected $primaryKey = 'records_id';
    protected $fillable = [
        'patient_id',
        'natrium',
        'kalium',
        'kalsium',
        'klorida',
        'magnesium',
        'fosfat',
        'bikarbonat',
    ];

    public function recordToPatient()
    {
        return $this->belongsTo(PatientTable::class, 'patient_id');
    }

    public function recordToMedical()
    {
        return $this->hasMany(PatientTable::class, 'records_id');
    }



}
