<?php
namespace App\Interface\Services;
use Illuminate\Http\Request;

interface SingleServieRepositoryInterface
{
    // get all sections
    public function index();
    
    // add section
    public function store($request);
    
    // get section
    public function update($request);
    
    // destroy section
    public function destroy($request);
    

}
