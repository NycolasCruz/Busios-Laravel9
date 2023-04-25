<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected Shop $repository;

    public function __construct(Shop $model)
    {
        $this->repository = $model;
    }

    public function index()
    {

        return view('dashboard');
    }

    public function store(StoreShopRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user()->id;

        $data['user_id'] = $user;

        return $this->repository->create($data);
    }

    public function getAllData()
    {
        return $this->repository->all()->load('user');
    }

    public function show($shop_id)
    {
        $data = $this->repository->findOrFail($shop_id);

        $shopOwner = $this->repository->with('user')->where('id', $data->id)->first();

        return response()->json($shopOwner);
    }

    public function update(Request $request)
    {
        $data = $this->repository->findOrFail($request->shop_id)->update($request->all());
        return response()->json($data);
    }
}
