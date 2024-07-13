<?php
use App\Http\Controllers\Siswa\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])->name('home');
Route::post('/siswa/tambah', [StudentController::class, 'store'])->name('siswa.tambah');
Route::post('/siswa/store', [StudentController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [StudentController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/update/{id}', [StudentController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/destroy/{id}', [StudentController::class, 'destroy'])->name('siswa.destroy');

Route::get('/siswa/tambah', function () {
    return view('tambah');

});
?>


