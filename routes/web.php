<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\userController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Models\genre;
use App\Models\buku;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

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

// Route::middleware(['guest'])->group(function() {
// });
Route::get('/', function () {
    // return view('adminPage.buku.post', ['genres'=>genre::all()]);
    return view('guest', ['bukus'=>buku::all()]);
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login_proses'])->name('login_proses');
});

Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/user', [UserController::class, 'index']);
});

Route::resource('/buku', BukuController::class);

Route::post('/logout', [logincontroller::class,'logout']);
Route::get('/user/dashboard', function(){
    return view('');
});
// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login_proses');
// Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

// Route::middleware(['Auth'])->group(function () {
// });

// Route::get('/admin/dashboard', function () {
//     return view('dashboard.admin');
// });

// Route::get('/user/dashboard', function () {
//     return view('dashboard.user', ["bukus"=>buku::all()]);
// });

Route::get('/admin/genre', function(){
    return view('adminPage.genre.index', ['genres'=>genre::all()]);
});
Route::resource('/genre', GenreController::class);

Route::get('/admin/buku', function(){
    return view('adminPage.buku.index', ['bukus'=>buku::all()]);
});


Route::resource('/peminjaman', PeminjamanController::class);
Route::resource('/pengembalian', PengembalianController::class);

Route::post('/pengembalian/{idUser}/{id_buku}/{id_peminjaman}', [PengembalianController::class, 'store'])->name('pengembalian.store');


Route::delete('/buku/{id_buku}', [BukuController::class, 'destroy'])->name('buku.destroyBuku');


Route::get('/view-pdf/{filePath}', function ($filePath) {
    
    // $filePath = 'public/assets/file/PkeZZ2PqPuhP00u1yN3OoYxzOETTX02TjbVnR30x.pdf';

    if (Storage::exists($filePath)) {
        return response()->file(storage_path("app/$filePath"));
    } else {
        abort(404);
    }
})->name('viewPdf');

Route::post('/peminjaman/store/{idUser}/{id_buku}', [PeminjamanController::class, 'store'])->name('peminjaman.store');

// Route::get('/peminjaman/{id_user}', [PeminjamanController::class, 'index'])->name('peminjaman.index');


// Route::get('/admin', function(){
//     return view('dashboard'); 
// })->middleware('auth'); 

// Route::get('/user', function(){
//     return view('dashboard.user'); 
// }); 

// Route::middleware(['auth'])->group(function() {    
// });