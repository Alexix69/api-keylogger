<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FavoriteCategoryController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login', [UserController::class, 'authenticate']);
/*
Route::group(['middleware' => ['jwt.verify']], function () {

//VISUALIZAR REGISTROS DE ACUERDO AL TIPO
Route::get('/records', [RecordController::class, 'index']);
Route::get('/records/keystrokes', [RecordController::class, 'indexKeystrokes']);
Route::get('/records/screenshots', [RecordController::class, 'indexScreenshots']);
Route::get('/records/websites', [RecordController::class, 'indexWebsites']);

//VISUALIZAR REGISTROS MARCADOS COMO ARCHIVADOS
Route::get('/records/archived', [RecordController::class, 'indexArchivedRecords']);
//MARCAR/DESMARCAR UN REGISTRO COMO ARCHIVADO
Route::put('/records/{record}', [RecordController::class, 'handleArchivedStatus']);

//GUARDAR REGISTRO EN LA BD
Route::post('/records', [RecordController::class, 'store']);

//CRUD DE CATEGORIAS DE FAVORITOS
Route::get('/favorite_categories', [FavoriteCategoryController::class, 'index']);
Route::get('/favorite_categories/{favoriteCategory}', [FavoriteCategoryController::class, 'show']);
Route::post('/favorite_categories', [FavoriteCategoryController::class, 'store']);
Route::put('/favorite_categories/{favoriteCategory}', [FavoriteCategoryController::class, 'updateFolder']);
Route::delete('/favorite_categories/{favoriteCategory}', [FavoriteCategoryController::class, 'deleteCategoryOnly']);
Route::delete('/favorite_categories/{favoriteCategory}/favorites', [FavoriteCategoryController::class, 'deleteCategoryAndFavorites']);

//CRUD CLIENTES
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/actives', [ClientController::class, 'indexActiveClients']);
Route::get('/clients/inactives', [ClientController::class, 'indexInactiveClients']);
Route::get('/clients/{client}', [ClientController::class, 'show']);
Route::post('/clients', [ClientController::class, 'store']);
Route::put('/clients/{client}', [ClientController::class, 'handleClientStatus']);

//CRUD FAVORITOS
Route::get('/records/favorites', [RecordController::class, 'indexFavoriteRecords']);
Route::get('/favorite_categories/{favoriteCategory}/favorites', [FavoriteCategoryController::class, 'indexFavoritesByCategory']);
Route::put('/records/{record}/favorite', [RecordController::class, 'handleFavoriteStatus']);
Route::put('/records/{record}/add_favorite', [RecordController::class, 'assignFavoriteToCategory']);

//MISCELANEOS
Route::get('/user', [UserController::class, 'getAuthenticatedUser']);
Route::get('/records/{record}', [RecordController::class, 'show']);

});
*/



//VISUALIZAR REGISTROS DE ACUERDO AL TIPO
Route::get('/records', [RecordController::class, 'index']);
Route::get('/records/keystrokes', [RecordController::class, 'indexKeystrokes']);
Route::get('/records/screenshots', [RecordController::class, 'indexScreenshots']);
Route::get('/records/websites', [RecordController::class, 'indexWebsites']);

//VISUALIZAR REGISTROS MARCADOS COMO ARCHIVADOS
Route::get('/records/archived', [RecordController::class, 'indexArchivedRecords']);
//MARCAR/DESMARCAR UN REGISTRO COMO ARCHIVADO
Route::put('/records/{record}', [RecordController::class, 'handleArchivedStatus']);

//GUARDAR REGISTRO EN LA BD
Route::post('/records', [RecordController::class, 'store']);

//CRUD DE CATEGORIAS DE FAVORITOS
Route::get('/favorite_categories', [FavoriteCategoryController::class, 'index']);
Route::get('/favorite_categories/{favoriteCategory}', [FavoriteCategoryController::class, 'show']);
Route::post('/favorite_categories', [FavoriteCategoryController::class, 'store']);
Route::put('/favorite_categories/{favoriteCategory}', [FavoriteCategoryController::class, 'updateFolder']);
Route::delete('/favorite_categories/{favoriteCategory}', [FavoriteCategoryController::class, 'deleteCategoryOnly']);
Route::delete('/favorite_categories/{favoriteCategory}/favorites', [FavoriteCategoryController::class, 'deleteCategoryAndFavorites']);

//CRUD CLIENTES
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/actives', [ClientController::class, 'indexActiveClients']);
Route::get('/clients/inactives', [ClientController::class, 'indexInactiveClients']);
Route::get('/clients/{client}', [ClientController::class, 'show']);
Route::post('/clients', [ClientController::class, 'store']);
Route::put('/clients/{client}', [ClientController::class, 'handleClientStatus']);

//CRUD FAVORITOS
Route::get('/records/favorites', [RecordController::class, 'indexFavoriteRecords']);
Route::get('/favorite_categories/{favoriteCategory}/favorites', [FavoriteCategoryController::class, 'indexFavoritesByCategory']);
Route::put('/records/{record}/favorite', [RecordController::class, 'handleFavoriteStatus']);
Route::put('/records/{record}/add_favorite', [RecordController::class, 'assignFavoriteToCategory']);
Route::put('/favorite_categories/{favoriteCategory}/favorites/{record}', [RecordController::class, 'removeFavoriteFromCategory']);

//MISCELANEOS
Route::get('/user', [UserController::class, 'getAuthenticatedUser']);
Route::get('/records/{record}', [RecordController::class, 'show']);

