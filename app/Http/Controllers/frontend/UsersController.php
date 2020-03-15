<?php

namespace App\Http\Controllers\frontend;

use App\ApplicationServices\FetchAllUsersService;
use App\Domains\SocialGraph\Services\FindUserByIdService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request, $user = null)
    {
        $users = (new FetchAllUsersService($request))->handle();

        $selectedUser = null;

        if ($request->has('user')) {
            $selectedUser = (new FindUserByIdService($request->user))->handle();
        }

        return view('users.index', compact('users', 'selectedUser'));
    }
}