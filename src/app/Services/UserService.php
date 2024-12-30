<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct()
    {
        //
    }

    /**
     * ユーザーを作成
     * @param array $validated
     * @return bool
    */
    public function createUser($validated): bool
    {
        try{
            User::create([
                'name'      => $validated['name'],
                'email'     => $validated['email'],
                'password'  => Hash::make($validated['password']),
            ]);
            
            return true;

        }catch(\Exception $e){
            Log::error('ユーザー登録失敗：'. $e->getMessage());
            return false;
        }
    }
}
