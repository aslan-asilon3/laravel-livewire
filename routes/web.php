<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatamemberController;
use App\Http\Controllers\DatamemberrawController;
use App\Http\Controllers\DatasaleController;

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

Route::get('/', function () {
    return view('datamember');
});

// =========== Data Member
Route::get('Datamember/export', [DatamemberController::class,'export']);
// Route::get('/user', [UserController::class, 'index']);
// =========== End Data Member



// =========== Data sale
Route::get('/datasale', function () {
    return view('datasale');
});
Route::get('Datasale/export/', [DatasaleController::class, 'export']);
Route::post('Datasale/import/', [DatasaleController::class, 'import']);
// =========== End Data sale


// =========== Data Member Raw
Route::get('/datamemberraw', function () {
    return view('livewire/datamemberraw/index');
});
Route::get('Datamemberraw/export/', [DatamemberrawController::class, 'export']);
Route::post('Datamemberraw/import/', [DatamemberrawController::class, 'import']);
// =========== EndData Member Raw


// =========== Data Akumulasi Poin
Route::get('/dataakumulasipoin', function () {
    return view('livewire.dataakumulasipoin.index');
});
Route::get('Dataakumulasipoin/export/', [DataakumulasipoinController::class, 'export']);
Route::post('Dataakumulasipoin/import/', [DataakumulasipoinController::class, 'import']);
// =========== End Data Akumulasi poin


// =========== Data Contact
Route::get('/contact',function(){
    return view('contact');
});
// =========== End Data Contact
