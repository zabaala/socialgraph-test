<?php

namespace App\Domains\SocialGraph\Services;

use App\Domains\SocialGraph\Models\UserConnection;
use App\Support\Services\ServiceInterface;

class ConnectionsOfConnectionsService implements ServiceInterface
{
    private $user_id;

    /**
     * FriendsOfFriendsService constructor.
     * @param $user_id
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @inheritDoc
     */
    public function handle()
    {
        /**
            select
                uc1.user_id 'user_requested',
                uc2.user_id 'direct_friend',
                uc2.friend_id 'indirect_friend'
            from
                user_connections uc1
                left join user_connections uc2 on uc2.user_id = uc1.friend_id
            where
                uc2.friend_id != uc1.user_id and
                uc1.user_id = ?;
         */

        $connections = (new UserConnection)
            ->with(['user'])
            ->select([
//                \DB::raw('user_connections.user_id as user_requested'),
//                \DB::raw('uc2.user_id as direct_friend'),
                \DB::raw('uc2.friend_id as user_id'),
            ])
            ->leftJoin(
                \DB::raw('user_connections as uc2'),
                'uc2.user_id',
                '=',
                'user_connections.friend_id')
            ->where('uc2.friend_id', '!=', \DB::raw('user_connections.user_id'))
            ->where('user_connections.user_id', '=', $this->user_id);

        return $connections->get();
    }
}