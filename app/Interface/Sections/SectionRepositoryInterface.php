<?php
namespace App\Interface\Sections;

interface SectionRepositoryInterface
{
    // get all sections
    public function index();
    
    // add section
    public function store($request);
    
    // get section
    public function update($request);
    
    // destroy section
    public function destroy($request);
    
    // destroy Sections
    public function show($id);
}
