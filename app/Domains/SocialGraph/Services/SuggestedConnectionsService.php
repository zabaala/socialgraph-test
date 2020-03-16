<?php

namespace App\Domains\SocialGraph\Services;

use App\Domains\SocialGraph\Models\UserConnection;
use App\Support\Services\ServiceInterface;

class SuggestedConnectionsService implements ServiceInterface
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
            -- Friends of friends original query.
            select
                c1.user_id me,
                c2.user_id suggested_friend,
                count(c1.friend_id) mutual_friend_count
            from
                user_connections c1
                left join user_connections c2 on c2.friend_id = c1.friend_id
            where
                c1.user_id = ? and
                suggested_friend != me
            group by suggested_friend
            having mutual_friend_count >= 2;
         */

        $connections = (new UserConnection)
            ->with(['user'])
            ->select([
                \DB::raw('user_connections.user_id me'),
                \DB::raw('count(user_connections.friend_id) mutual_friend_count'),
                'uc2.user_id'
//                \DB::raw('uc2.user_id suggested_friend'),
            ])

            ->leftJoin(
                \DB::raw('user_connections as uc2'),
                'uc2.friend_id',
                '=',
                'user_connections.friend_id')
            ->where('user_connections.user_id', '=', $this->user_id)
            ->where('uc2.user_id', '!=', 'user_connections.user_id')
            ->groupBy('uc2.user_id')
            ->having('mutual_friend_count', '>=', 2);

         return $connections->get();
    }
}