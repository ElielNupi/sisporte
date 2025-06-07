<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportTicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chamados/novo', [SupportTicketController::class, 'create'])->name('chamados.create');
Route::post('/chamados', [SupportTicketController::class, 'store'])->name('chamados.store');
