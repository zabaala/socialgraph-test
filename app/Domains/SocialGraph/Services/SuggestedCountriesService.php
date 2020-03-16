<?php

namespace App\Domains\SocialGraph\Services;

use App\Domains\SocialGraph\Models\UserCity;
use App\Support\Services\ServiceInterface;

class SuggestedCountriesService implements ServiceInterface
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
            c1.name sugested_city,
            c1.rate
        from
            user_cities c1
            left join user_cities c2 on c1.name = c2.name and c2.user_id = 3
        where
            c2.name is null
        group by c1.name;
         */

        $connections = (new UserCity)
            ->select([
                'user_cities.name',
                'user_cities.rate',
            ])
            ->leftJoin(\DB::raw('user_cities as uc2'), function ($join) {
                $join->on('user_cities.name', '=', 'uc2.name');
                $join->on(\DB::raw('uc2.user_id'), '=', \DB::raw($this->user_id));
            })
            ->whereNull('uc2.user_id')
            ->groupBy('user_cities.name');

         return $connections->get();
    }
}