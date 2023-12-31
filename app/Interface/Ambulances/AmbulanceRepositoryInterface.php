<?php
namespace App\Interface\Ambulances;

interface AmbulanceRepositoryInterface
{
    // get all sections
    public function index();
    
    // get all sections
    public function create();
    
    // add section
    public function edit($id);

    // add section
    public function store($request);
    
    // get section
    public function update($request);
    
    // destroy section
    public function destroy($request);
    

}
