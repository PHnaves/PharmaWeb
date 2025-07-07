<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function update(UpdatePasswordRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update([
            'password' => Hash::make($data['new_password']),
        ]);

        return back()->with('success', 'Senha atualizada com sucesso');
    }
}
