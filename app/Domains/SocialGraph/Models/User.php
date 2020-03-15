<?php

namespace App\Domains\SocialGraph\Models;

use App\Domains\SocialGraph\Services\ConnectionsOfConnectionsService;
use App\Domains\SocialGraph\Services\SuggestedConnectionsService;
use App\Domains\SocialGraph\Services\SuggestedCountriesService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $fillable = [
        'id', 'first_name', 'surname', 'age', 'gender'
    ];

    /**
     * Create relationship with user connections.
     *
     * @return HasMany
     */
    public function connections() {
        return $this->hasMany(UserConnection::class);
    }

    /**
     * Create relationship with user cities.
     *
     * @return HasMany
     */
    public function cities() {
        return $this->hasMany(UserCity::class);
    }

    /**
     * Store user related connections.
     *
     * @param array $connections
     */
    public function setConnectionsAttribute($connections) {
        foreach($connections as $connection) {
            $this->connections()->create(['friend_id' => $connection]);
        }
    }

    /**
     * Store user related cities.
     *
     * @param array $cities
     */
    public function setCitiesAttribute($cities) {
        foreach ($cities as $city => $rate) {
            $this->cities()->create([
                'name' => $city,
                'rate' => $rate
            ]);
        }
    }

    public function getFullNameAttribute()
    {
        $name = sprintf('%s %s', $this->first_name, $this->surname);
        return rtrim($name);
    }

    public function getSuggestedConnectionsAttribute()
    {
        return (new SuggestedConnectionsService($this->id))->handle();
    }

    public function getSuggestedCountriesAttribute()
    {
        return (new SuggestedCountriesService($this->id))->handle();
    }

    public function getConnectionsOfConnectionsAttribute()
    {
        return (new ConnectionsOfConnectionsService($this->id))->handle();
    }
}
