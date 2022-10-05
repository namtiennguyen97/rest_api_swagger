<?php

namespace App\Repository\Eloquent;

use App\Repository\RepositoryInterface\BaseRepositoryInterface;

abstract class BaseEloquent implements BaseRepositoryInterface
{
    protected $model;
    public function __construct()
    {
        $this->model = $this->setModel();
    }
    abstract function getModel();
    public function setModel(){
        return $this->model = app()->make($this->getModel());
    }
    public function index()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        return $this->model->create($request);
    }

    public function show($id)
    {
       return $this->model->find($id);
    }

    public function update($request, $id)
    {
        $object = $this->model->find($id);
        return $object->update($request);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
