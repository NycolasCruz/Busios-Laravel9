<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;

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
		$search = request('search');

		if ($search) {
			return $this->repository
				->where('shop_name', 'like', '%' . $search . '%')
				->get()
				->load('user');
		}

		return $this->repository->all()->load('user');
	}

	public function show($shop_id)
	{
		$data = $this->repository->findOrFail($shop_id);

		$shopOwner = $this->repository->with('user')->where('id', $data->id)->first();

		return response()->json($shopOwner);
	}

	public function update(UpdateShopRequest $request)
	{
		$data = $this->repository->findOrFail($request->shop_id)->update($request->all());
		return response()->json($data);
	}
}
