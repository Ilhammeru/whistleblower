<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;

class UserService {
    /**
     * Function to gather all requirement user data
     * and store into cache
     * 
     * 
     */
    public function gatherAllData()
    {
        $user = User::find(auth()->user()->id);
        $role_id = $user->role;
        $user_data = [];

        $roles = Role::all();
        $role = collect($roles)->filter(function($item) use($role_id) {
            return $item->id == $role_id;
        })->values();
        if (isset($role[0])) {
            $role = $role[0];
            if ($role_id == User::GENERAL) {
                $redirection = '/report';
            } else {
                $redirection = '/admin/dashboard';
            }
    
            $user_data['user'] = $user;
            $user_data['role'] = $role;
            $user_data['redirection'] = $redirection;

            // save to cache
            Cache::put('user_data', json_encode($user_data));

            return $user_data;
        }

        return false;
    }
}