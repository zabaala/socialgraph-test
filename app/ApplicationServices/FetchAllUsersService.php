<?php

namespace App\ApplicationServices;

use App\Domains\SocialGraph\Services\FetchAllUsersService as FetchAllSUsers;
use App\Support\Services\ServiceInterface;
use Illuminate\Http\Request;

class FetchAllUsersService implements ServiceInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * FetchAllUsers constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function handle()
    {
        $service = new FetchAllSUsers;

        if ($this->request->has('pageSize')) {
            $service->setPageSize($this->request->pageSize);
        }

        if ($this->request->has('keyword')) {
            $service->searchKeyword($this->request->keyword);
        }

        $isPaginated = $this->request->has('paginated') && $this->request->paginated === 'true';

        if ($isPaginated) {
            $service
            ->isPaginated($isPaginated)
            ->setQueryStringParameters($this->request->all());
        }

        return $service->handle();
    }
}