<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    protected Curriculum $repository;

    public function __construct(Curriculum $model)
    {
        $this->repository = $model;
    }

    public function store(Request $request)
    {
        $data = $request->only('curriculum');
        $user = auth()->user()->id;
        $shop = $request->shop_id;

        $data['user_id'] = $user;
        $data['shop_id'] = $shop;

        return $this->repository->create($data);
    }
}
