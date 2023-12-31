<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interface\Services\SingleServieRepositoryInterface;


class SingleServiceController extends Controller
{
    private $SingleService;

    public function __construct(SingleServieRepositoryInterface $SingleService)
    {
        $this->SingleService = $SingleService;
    }

    public function index()
    {
        return $this->SingleService->index();

    }

    public function store(Request $request)
    {
        return $this->SingleService->store($request);

    }


    public function update(Request $request)
    {
        return $this->SingleService->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->SingleService->destroy($request);
    }
}
