<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudCategorieController;
use App\Http\Controllers\CagnotteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Livewire\CreationCagnotte;
use App\Http\Controllers\DashController;


//----------- voyager routes ------------------------------
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
//---------------------------------------------------------

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/comment-ca-marche', [MainController::class, 'commentMarche'])->name('commentMarche');
Route::post('/store-email', [MainController::class, 'storeEmail'])->name('store.email');

Auth::routes(['namespace' => 'App\Http\Controllers']);

//----------- auth user routes ----------------------------

Route::get('/profil', function () {
    return view('profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/profil-sécurité', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profil-info', [ProfileController::class, 'editInfo'])->name('profile.editInfo');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //------------------------------------------------
    Route::get('/Creation-Cagnotte', [MainController::class, 'CreatePot'])->name('CreatePot');
    Route::resource('/cagnotte', MainController::class)->except(['show']);
    Route::get('/cagnottes/affiche', [MainController::class, 'viewPots'])->name('viewPots');
    //------------------------------------------------
    Route::get('/Soutenir-Cause', [App\Http\Controllers\CauseSupportController::class, 'index'])->name('showSupport');
    Route::post('/Soutenir-Cause/{cagnotte_id}', [App\Http\Controllers\CauseSupportController::class, 'store'])->name('storeSupport');
    Route::get('/Mes-Participations', [App\Http\Controllers\CauseSupportController::class, 'viewSupport'])->name('viewSupported');
    Route::put('/Soutenir-Cause/update/{id}', [App\Http\Controllers\CauseSupportController::class, 'update'])->name('updateSupport');
    Route::delete('/close-pot/{id}', [App\Http\Controllers\CauseSupportController::class, 'closePot'])->name('closePot');
});

require __DIR__.'/auth.php';
//---------------------------------------------------------

//----------- auth admin routes ----------------------------
Route::get('/admin_guest/admin-dashboard', function () {
    return view('admin.admin-dashboard');
})->middleware(['auth:admin_guest', 'verified'])->name('admin.admin-dashboard');

Route::middleware('auth:admin_guest')->group(function () {
    Route::resource('categories', CrudCategorieController::class)->except(['create', 'show']);
    Route::delete('/bulk-delete', [CrudCategorieController::class, 'bulkDelete'])->name('bulk-delete');
    Route::get('/search', [CrudCategorieController::class, 'search'])->name('search');
    //------------------------------------------------
    Route::get('/Tous-les-cagnottes', [CagnotteController::class, 'index'])->name('show_cagnottes');
    Route::resource('cagnottes', CagnotteController::class)->except(['create', 'show']);
    Route::delete('/bulk-delete-Pots', [CagnotteController::class, 'bulkDelete'])->name('bulk-delete-Pots');
    Route::get('/searchPot', [CagnotteController::class, 'search'])->name('searchPot');
    //------------------------------------------------
    Route::get('/dashboard', [DashController::class, 'index'])->name('dashboard');
});

require __DIR__.'/adminguestauth.php';
