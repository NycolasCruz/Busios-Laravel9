<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCurriculumRequest;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    protected Curriculum $repository;

    public function __construct(Curriculum $model)
    {
        $this->repository = $model;
    }

    public function store(StoreCurriculumRequest $request)
    {
        $data = $request->validated();
        $shop = $request->shop_id;

        $data['shop_id'] = $shop;

        return $this->repository->create($data);
    }
}
