<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliklinikTable extends Model
{
    use HasFactory;

    protected $table = 'poliklinik';
    protected $primaryKey = 'poliklinik_id';
    protected $fillable = [
        'name_poliklinik',
    ];

    public function poliklinikToDocter(){
        return $this->hasMany(DoctorTable::class, 'doctor_id');
     }
}
