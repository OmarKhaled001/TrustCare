<?php
namespace App\Interface\Doctors;
interface DoctorRepositoryInterface
{
    // get all sections
    public function index();
    
    // get all sections
    public function create();
    
    // add section
    public function store($request);
    
    // get section
    public function update($request);
    
    // destroy section
    public function destroy($request);
    
    // destroy section
    public function update_status($request);

    // destroy section
    public function update_password($request);

    // destroy section
    public function edit($id);
}
