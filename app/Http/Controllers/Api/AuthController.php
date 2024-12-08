<?php

namespace App\Http\Controllers\Api;


use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function register(Request $request):JsonResponse
    {
        $Validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($Validator->fails()) {
            return $this->sendError('401', 'Not Authorized0');
        }
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('Babi')->plainTextToken;

        return response()->json([
            'success' => true,
            'user'    => $user,  
            'token' => $token,
        ], 201);
        

    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email' , $request->email)->first();

        if ($user == null) {
            return $this->sendError('404' , 'Not Found');
        }


        if (!Hash::check($request->password, $user->password)) {
           return $this->sendError('401' , 'Email atau pasword salah!');
        }

        $token = $user->createToken('Babi')->plainTextToken;

        return $this->sendResponse(['token' => $token, 'data' => $user], 'Login Succesfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
