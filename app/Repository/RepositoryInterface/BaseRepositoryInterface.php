<?php

namespace App\Repository\RepositoryInterface;

interface BaseRepositoryInterface
{
    public function index();
    public function create($request);
    public function show($id);
    public function update($request, $id);
    public function delete($id);
}
