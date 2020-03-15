<?php

namespace App\Domains\SocialGraph\Services;

use App\Domains\SocialGraph\Models\User;
use App\Support\Services\ServiceInterface;

class FetchAllUsersService implements ServiceInterface
{
    /**
     * @var bool
     */
    protected $paginated = false;

    /**
     * @var int
     */
    protected $pageSize = 15;

    /**
     * @var null|string
     */
    protected $searchKeyword = null;

    /**
     * A list of additional query string parameter of paginator object.
     *
     * @var array
     */
    protected $queryStringParameters = [];

    /**
     * Define a keyword to filter users.
     *
     * @param string $keyword
     * @return $this
     */
    public function searchKeyword($keyword)
    {
        $this->searchKeyword = $keyword;
        return $this;
    }

    /**
     * @param int $size
     * @return FetchAllUsersService
     */
    public function setPageSize($size = 15)
    {
        $this->pageSize = $size;
        return $this;
    }

    /**
     * @param array $queryStringParameters
     * @return FetchAllUsersService
     */
    public function setQueryStringParameters($queryStringParameters)
    {
        $this->queryStringParameters = $queryStringParameters;
        return $this;
    }

    /**
     * Define if fetched results will be returned paginated or like as collection.
     *
     * @param bool $paginated
     * @return FetchAllUsersService
     */
    public function isPaginated($paginated = true)
    {
        $this->paginated = $paginated;
        return $this;
    }

    /**
     * Handle the service.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = new User();

        // filter users by keyword...
        if (! is_null($this->searchKeyword)) {
            $users = $users->where(function ($query) {
                $query->where('first_name', 'like', "%{$this->searchKeyword}%");
                $query->orWhere('surname', 'like', "%{$this->searchKeyword}%");
            });
        }

        // users order...
        $users = $users->orderBy('first_name', 'asc');

        // define if users will be returned through pagination or collection...
        if ($this->paginated) {
            $users = $users
                ->paginate($this->pageSize)
                ->appends($this->queryStringParameters);
        } else {
            $users = $users->get();
        }

        return $users;
    }
}