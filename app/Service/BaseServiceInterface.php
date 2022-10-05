<?php

namespace App\Service;

interface BaseServiceInterface
{
    public function index();
    public function create($request);
    public function show($id);
    public function update($request, $id);
    public function delete($id);
}
