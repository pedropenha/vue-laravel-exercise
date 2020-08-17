<?php

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

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

Route::post('/cadastro', function (Request $request) {
    $data = $request->all();

    $validacao = Validator::make($data, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'gender' => 'required|string',
        'address' => 'required|string',
        'height' => 'required'
    ]);

    if($validacao->fails()){
        return $validacao->errors();
    }

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'gender' => $data['gender'],
        'address' => $data['address'],
        'height' => (int)$data['height']
    ]);

    return ['status' => true, $user];
});

Route::get('/lista', function () {
    $usuarios = User::orderBy('name')->get();
    return ['status' => true, 'usuarios' => $usuarios];
});

Route::get('/edit/id', function (Request $request){
    $usuarios = User::orderBy('name')->get();
    return ['status' => true, 'usuarios' => $usuarios];
});

Route::post('/delete', function (Request $request){
    $data = $request->all();
    $id = $data['id'];
    $user = User::delete($id);
    return ['status' => true];
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
