<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicalRecordsController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\RecordsDetailController;
use App\Models\MedicalRecordsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// HOSPITAL
Route::get('/hospital', [HospitalController::class, 'index'])->name('index_hospital');
Route::post('/hospital', [HospitalController::class,'store']);
Route::get('/hospital/{id}', [HospitalController::class, 'show']);
Route::post('/hospital-update/{id}', [HospitalController::class, 'update']);
Route::delete('/hospital/{id}', [HospitalController::class, 'destroy']);


// POLIKLINIK
Route::get('/poliklinik', [PoliklinikController::class, 'index']);
Route::post('/poliklinik', [PoliklinikController::class,'store']);
Route::get('/poliklinik/{id}', [PoliklinikController::class, 'show']);
Route::post('/poliklinik-update/{id}', [PoliklinikController::class, 'update']);
Route::delete('/poliklinik/{id}', [PoliklinikController::class, 'destroy']);

// DOCTOR
Route::get('/doctor', [DoctorController::class, 'index']);
Route::post('/doctor', [DoctorController::class,'store']);
Route::get('/doctor/{id}', [DoctorController::class, 'show']);
Route::post('/doctor-update/{id}', [DoctorController::class, 'update']);
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy']);

// PATIENT
Route::get('/patient', [PatientController::class, 'index']);
Route::post('/patient', [PatientController::class,'store']);
Route::get('/patient/{id}', [PatientController::class, 'show']);
Route::post('/patient-update/{id}', [PatientController::class, 'update']);
Route::delete('/patient/{id}', [PatientController::class, 'destroy']);

// RECORD
Route::get('/record', [RecordsDetailController::class, 'index']);
Route::post('/record', [RecordsDetailController::class,'store']);
Route::get('/record/{id}', [RecordsDetailController::class, 'show']);
Route::post('/record-update/{id}', [RecordsDetailController::class, 'update']);
Route::delete('/record/{id}', [RecordsDetailController::class, 'destroy']);

// MEDICAL

Route::get('/medical', [MedicalRecordsController::class, 'index']);
Route::post('/medical', [MedicalRecordsController::class,'store']);
Route::get('/medical/{id}', [MedicalRecordsController::class, 'show']);
Route::post('/medical-update/{id}', [MedicalRecordsController::class, 'update']);
Route::delete('/medical/{id}', [MedicalRecordsController::class, 'destroy']);
