<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

// MVC CRUD

Route::get('/', function(){
    return view('home.index');
})->name('home.index');

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/book', function(){
    return view('book.index');
})->name('book.index');

// Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index'); // read all

// Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create'); // view create
// Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store'); // view store

// Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit'); // view create
// Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); // view store

// Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy'); // view delete


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
