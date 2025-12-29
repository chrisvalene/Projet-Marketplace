<?php
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AcheteurController;
use App\Http\Controllers\VendeurControler;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MarcheController;
use Illuminate\Support\Facades\Route;

// Pages publiques
Route::get('/', function () { return view('pages.index'); })->name('index');
Route::get('/blog', function () { return view('pages.blog'); })->name('blog');
Route::get('/produit', function () { return view('pages.produit'); })->name('produit');
Route::get('/Inscription', function () { return view('pages.Inscription'); })->name('Inscription');

// Auth routes
Route::get('/login', [AuthUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthUserController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Inscription acheteur
Route::post('/inscription', [AcheteurController::class, 'store'])->name('inscription.store');

// Vendeur routes
Route::get('/vendeur/create', [VendeurControler::class, 'create'])->name('vendeur.create');
Route::post('/vendeur/store', [VendeurControler::class, 'store'])->name('vendeur.store');



// Pour la gestion des catégories
Route::middleware(['auth'])->group(function() {
    Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie.index');
});


// pour la gestion des marchés
Route::middleware(['auth'])->group(function() {
    Route::get('/marches', [MarcheController::class, 'index'])->name('marches.index');
});






// Tableaux de bord protégés
Route::middleware(['auth'])->group(function() {
    Route::get('/tab_bord_vend', [VendeurControler::class, 'dashboard'])->name('tab_bord_vend');
    Route::get('/tab_bord_admin', [AdminController::class, 'dashboard'])->name('tab_bord_admin');
    Route::get('/tab_bord_ach', [AcheteurController::class, 'dashboard'])->name('tab_bord_ach');
});
