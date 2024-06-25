<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use illuminate\Database\Eloquent\Model;


class AuthController extends Controller
{
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'User successfully registered',
        'user' => $user,
        'token' => $token,
    ], 201);
}
public function updateProfile(Request $request)
{
    $user = Auth::user(); 

    $validator = Validator::make($request->all(), [
        'phone' => 'nullable|string|max:255', 
        'gender' => 'nullable|string|in:male,female',
        'birth_date' => 'nullable|date', 
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors()->toJson(), 400);
    }
   // dd($user);
   //$user->update($validator->validated());
    $user->phone = $request->phone;
    $user->gender = $request->gender;
    $user->birth_date = $request->birth_date;
    // $user->save();

    return response()->json([
        'message' => 'Profile updated successfully',
        'user' => $user,
    ], 200);
}

    public function login(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
            'password' => 'required|string|min:8',
        ]);
        if ($Validator->fails()) {
            return response()->Json($Validator->errors()->tojson(), 422);
        }
        if (!$token = auth()->attempt($Validator->validated())) {
            return response()->Json(['error' => 'unauthorized'], 401);
        }
            $user = User::where('email', $request->email)->first();
            $token = $user->createtoken('auth-token')->plainTextToken;
            return response()->Json([
                'token'=>$token
                ]);

    }
}
