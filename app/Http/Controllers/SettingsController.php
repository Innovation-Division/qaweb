<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\cocogen_set_agent_code;
use DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateAccountType(Request $request)
    {

        $user = Auth::user();
        $user->accountType = $request->input('accountType');
        $user->save();

        return response()->json(['success' => 'Account type updated successfully.']);
    }

    public function updateAccountEmailPassword(Request $request)
    {
         $request->validate([
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => [
                'required',
                'min:8',
                'max:20',
                'confirmed',
                'regex:/^(?=.*[a-zA-Z])(?=.*[0-9])[A-Za-z0-9]{8,20}$/'
            ],
            'new_password_confirmation' => 'required'
        ], [
            'new_password.regex' => 'Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json(['message' => 'Current password is incorrect.'], 400);
        }

        $user->email = $request->input('email');
        if ($request->input('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }
        DB::table('users')->updateOrInsert(
            ['id' => $user->id],
            [
                'password' => Hash::make($request->input('new_password')),
            ]
        );

        return response()->json(['message' => 'Profile updated successfully.']);
    }

    public function updateAgentCode(Request $request)
    {
        $request->validate([
            'agentCode' => 'required|string',
        ]);

        $userId = Auth::user()->id;

        DB::table('cocogen_set_agent_code')->updateOrInsert(
            ['ownerId' => $userId],
            [
                'agentName' => Auth::user()->name,
                'agentCode' => $request->input('agentCode')
            ]
        );

        return response()->json(['message' => 'Agent code updated successfully.']);
    }
}
