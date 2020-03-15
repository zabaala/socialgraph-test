<?php

namespace App\Domains\SocialGraph\Services;

use App\Domains\SocialGraph\Models\User;
use App\Support\Services\ServiceInterface;

class FindUserByIdService implements ServiceInterface
{
    /**
     * @var int
     */
    private $user_id;

    /**
     * @var array
     */
    private $with;

    /**
     * FindUserByIdService constructor.
     *
     * @param $user_id
     * @param array $with
     */
    public function __construct($user_id, $with = [])
    {
        $this->user_id = $user_id;
        $this->with = $with;
    }

    /**
     * @inheritDoc
     */
    public function handle()
    {
        $user = User::find($this->user_id);

        if (in_array('suggested_connections', $this->with)) {
            $user['suggested_connections'] = $user->suggestedConnections;
        }

        if (in_array('suggested_countries', $this->with)) {
            $user['suggested_countries'] = $user->suggestedCountries;
        }

        if (in_array('connections_of_connections', $this->with)) {
            $user['connections_of_connections'] = $user->connectionsOfConnections;
        }

        return $user;
    }
}