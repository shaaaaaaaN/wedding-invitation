<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invite\InviteController;

Route::get('/', [InviteController::class, 'index']);

Route::get('/invites', [InviteController::class, 'index']);

Route::get('/invites/add', [InviteController::class, 'add']);
Route::post('/invites/add', [
    InviteController::class,
    'create'
]);
Route::get('/invites/delete/{id}', [
    InviteController::class,
    'delete'
]);

Route::get('/invites/addRelationship', [InviteController::class, 'addRelationship']);
Route::post('/invites/addRelationship', [
    InviteController::class,
    'createRelationship'
]);
Route::get('/invites/delete/relationship/{id}', [
    InviteController::class,
    'deleteRelationship'
]);

Auth::routes();