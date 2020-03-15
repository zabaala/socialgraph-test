<?php

namespace App\Http\Controllers\Api;

use App\ApplicationServices\FetchAllUsersService;
use App\Domains\SocialGraph\Services\FindUserByIdService;
use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return (new FetchAllUsersService($request))->handle();
    }

    /**
     * Show details of specified user.
     *
     * @param Request $request
     * @param $user
     *
     * @return User
     */
    public function show(Request $request, $user)
    {
        $with = $request->has('with') ? $request->get('with') : [];
        return $this->findUserById($user, $with);
    }

    /**
     * Show all suggested countries of a user.
     *
     * @param $user
     * @return mixed
     */
    public function showSuggestedCountries($user)
    {
        return $this->findUserById($user)->suggestedCountries;
    }

    /**
     * Show all suggested connections of a user.
     * @param $user
     * @return mixed
     */
    public function showSuggestedConnections($user)
    {
        return $this->findUserById($user)->suggestedConnections;
    }

    public function showConnectionsOfConnections($user)
    {
        return $this->findUserById($user)->connectionsOfConnections;
    }

    /**
     * Extract method to find a user by id.
     *
     * @param $user
     * @param array $with
     * @return mixed
     */
    private function findUserById($user, $with = [])
    {
        return (new FindUserByIdService($user, $with))->handle();
    }
}