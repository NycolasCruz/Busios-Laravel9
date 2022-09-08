<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(StoreRequest $request)
    {
        $allData = $request->validated();

        return Store::create($allData);
    }

    public function getAllData()
    {
        return Store::all();
    }
}
