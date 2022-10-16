<?php

namespace App\Http\Controllers;

use App\Enums\IncomeTypeEnum;
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
        $incomes = IncomeTypeEnum::cases();

        return view('dashboard', ['incomes' => $incomes]);
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
        // vai pegar tudo da model Shop e carregar também a função user, q é o relacionamento, trazendo os dados do usuário
        return $this->repository->all()->load('user');
    }

    public function show($shop_id)
    {
        $data = $this->repository->findOrFail($shop_id);

        // vai pegar tudo da model Shop e a função user, quando o id for igual ao id passado
        $shopOwner = $this->repository->with('user')->where('id', $data->id)->first();

        return response()->json($shopOwner);
    }

    public function update(Request $request)
    {
        $data = $this->repository->findOrFail($request->shop_id)->update($request->all());
        return response()->json($data);
    }
}
