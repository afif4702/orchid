<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/pesan/{id}/edit', [App\Http\Controllers\PesanController::class, 'editdatapesan']);
Route::post('/pesan/{id}/editupdate', [App\Http\Controllers\PesanController::class, 'editupdate']);
Route::get('/pesan/{id}/delete', [App\Http\Controllers\PesanController::class, 'deletedatapesan']);
Route::get('/pesan/{id}/konfirmasi', [App\Http\Controllers\PesanController::class, 'updatekonfirmasi']);

Route::post('/menu', [App\Http\Controllers\PesanController::class, 'menu']);
Route::get('/menu/{id}/editmenu', [App\Http\Controllers\PesanController::class, 'editdatamenu']);
Route::post('/menu/{id}/editupdatemenu', [App\Http\Controllers\PesanController::class, 'editupdatemenu']);
Route::get('/menu/{id}/deletemenu', [App\Http\Controllers\PesanController::class, 'deletedatamenu']);

Route::get('/meja/{id}/deletemeja', [App\Http\Controllers\PesanController::class, 'deletemeja']);
Route::get('/transaksi/{id}/deletetransaksi', [App\Http\Controllers\PesanController::class, 'deletetransaksi']);

Route::get('/konfirmasi/{id}/konfirmasimeja', [App\Http\Controllers\PesanController::class, 'konfirmasimeja']);

Route::get('/konfirmasi/{id}/konfirmasitransaksi', [App\Http\Controllers\PesanController::class, 'konfirmasitransaksi']);

Route::get('/edit-reservasi', function () {
    return view('edit');
});

Route::get('/edit-menu', function () {
    return view('editMenu');
});

Route::get('/tambah-menu', function () {
    return view('TambahMenu');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('home');
});

Route::get('/admin', [App\Http\Controllers\PesanController::class, 'tampilP'])->name('admin');

Route::get('/home', [App\Http\Controllers\PesanController::class, 'index'])->name('home');


Route::post('/pesan', [App\Http\Controllers\PesanController::class, 'pesan']);

