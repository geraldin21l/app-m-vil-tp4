<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class ApiUserController extends Controller
{
    public function registrarDesdeMovil(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422);
    }
    try {
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Usuario creado correctamente',
            'user'    => $user,
        ], 201);
    }catch (\Exception $e) {
    return response()->json([
        'status' => 'error',
        'message' => 'Error al crear usuario',
        'error' => $e->getMessage(), // 👈 Este valor debe llegar al frontend
    ], 500);
}


}

}
