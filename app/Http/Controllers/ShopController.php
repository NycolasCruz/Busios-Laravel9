<?php

namespace App\Http\Controllers;

use App\Enums\IncomeTypeEnum;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected Shop $repository;
    
    public function __construct(Shop $model){
        $this->repository = $model;
    }
    
    public function index()
    {
        $incomes = IncomeTypeEnum::cases();

        return view('dashboard', ['incomes' => $incomes]);
    }

    public function store(ShopRequest $request)
    {
        $allData = $request->validated();

        // vai pegar o usuário logado e salvar no banco
        $user = auth()->user();
        $allData['user_id'] = $user->id;

        return $this->repository->create($allData);
    }

    public function getAllData()
    {
        // vai pegar tudo da model Shop e carregar também a função user, q é o relacionamento, trazendo os dados do usuário
        return $this->repository->all()->load('user');
    }

    public function show($id)
    {
        $data = $this->repository->findOrFail($id);

        // vai pegar tudo da model Shop e a função user, quando o id for igual ao id passado
        $shopOwner = $this->repository->with('user')->where('id', $data->id)->first();

        return response()->json($shopOwner);
    }

    public function update(Request $request)
    {
        $data = $this->repository->findOrFail($request->id)->update($request->all());

        return response()->json($data);
    }
}
