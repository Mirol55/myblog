<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerEntry;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ControllerEntry::class, 'index'])->name('index');

//Untuk Upload
// Route::post('/xkesah_nama_apa', [NamaController::class, 'Function_yg_kitankguna'])->name('Nama_untuk_bwk_post_kesini');
Route::post('/insert', [ControllerEntry::class, 'store'])->name('store'); 

//Go update Page
Route::get('/goupdate/{id}', [ControllerEntry::class, 'updatepage'])->name('gogoupdate');
//Update
Route::post('/simpan/{id}', [ControllerEntry::class, 'simpanan'])->name('gosimpan');

//Delete
Route::delete('/delete/{id}', [ControllerEntry::class, 'destroy'])->name('delete');



