<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\NotificationController;

Route::apiResource('livres', LivreController::class);
Route::apiResource('utilisateurs', UtilisateurController::class);
Route::apiResource('reservations', ReservationController::class);
Route::apiResource('notifications', NotificationController::class);
