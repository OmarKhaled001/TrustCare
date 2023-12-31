<?php

namespace App\Repository\Services;
use App\Interface\Services\SingleServieRepositoryInterface;
use App\Models\Service;

class SingleServieRepository implements SingleServieRepositoryInterface
{

    public function index()
    {
        $services = Service::all();
        return view('Dashboard.Services.Single Service.index',compact('services'));
    }

    public function store($request)
    {
        try {
            $SingleService = new Service();
            $SingleService->price = $request->price;
            $SingleService->status = 1;
            $SingleService->save();
            
            // store trans
            $SingleService->name = $request->name;
            $SingleService->description = $request->description;
            $SingleService->save();

            session()->flash('add');
            return redirect()->route('Service.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {

            $SingleService = Service::findOrFail($request->id);
            $SingleService->price = $request->price;
            $SingleService->status = $request->status;
            $SingleService->save();
            
            // store trans
            $SingleService->name = $request->name;
            $SingleService->description = $request->description;
            $SingleService->save();

            session()->flash('edit');
            return redirect()->route('Service.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        Service::destroy($request->id);
        session()->flash('delete');
        return redirect()->route('Service.index');
    }
}
