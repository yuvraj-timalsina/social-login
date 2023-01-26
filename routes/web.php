<?php
    
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\OAuthController;
    
    Route::view('/', 'welcome')->name('welcome');
    
    Auth::routes();
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::controller(OAuthController::class)->group(function () {
    Route::get('/auth/redirect/{provider}', 'redirect')->name('oauth.redirect');
    Route::get('/auth/callback/{provider}', 'callback')->name('oauth.callback');
});
