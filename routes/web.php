<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

// MVC CRUD
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);


// ==========================================================================================


// CREATE
Route::get('/konsep-dasar/create', function () { // http://127.0.0.1:8000/konsep-dasar/create
    $mahasiswa = Mahasiswa::create([
        'nim' => '21110336',
        'name' => 'M Advie Rifaldy',
        'jurusan' => 'Teknik Informatika',
    ]);

    return $mahasiswa;
});

// READ
Route::prefix('/konsep-dasar/read')->group(function () {
    Route::get('/all', function () { // http://127.0.0.1:8000/konsep-dasar/read/all
        // get all
        $mahasiswas = Mahasiswa::all();

        return $mahasiswas;
    });

    Route::get('/show', function () { http://127.0.0.1:8000/konsep-dasar/read/show
        // get by id
        $mahasiswa = Mahasiswa::find(3);
        // $mahasiswa = Mahasiswa::where('id', 3)->first(); sama dengan (Mahasiswa::find(3);)

        return $mahasiswa;
    });

    Route::get('/search/{keyword}', function ($keyword) { //http://127.0.0.1:8000/konsep-dasar/read/search/advie
        // get search
        $mahasiswa = Mahasiswa::where('nim', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('name', 'LIKE', '%' . $keyword . '%')
                                ->orWhere('jurusan', 'LIKE', '%' . $keyword . '%')
                                ->get();

        return $mahasiswa;
    });
});

// UPDATE
Route::get('/konsep-dasar/update', function () { // http://127.0.0.1:8000/konsep-dasar/update
    $id = 2;

    $data = [
        'nim' => '21110333',
        'name' => 'Faisal Dzulfikar',
        'jurusan' => 'Teknik Informatika',
    ];

    Mahasiswa::where('id', $id)->update($data);

    return Mahasiswa::find(2);
});

// DELETE
Route::get('/konsep-dasar/delete', function () { // http://127.0.0.1:8000/konsep-dasar/update
    $id = 1;

    Mahasiswa::where('id', $id)->delete();

    return Mahasiswa::all();
});
