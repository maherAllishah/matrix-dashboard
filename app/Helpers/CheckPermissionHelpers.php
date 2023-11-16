<?php

use Illuminate\Support\Facades\Auth;

function checkPermission($permission)
{

    $user = Auth::guard('web')->user();
    if ($user->hasAnyPermission($permission) || $user->hasPermissionTo('control admins')) {
        return true;
    }
    return false;
}
