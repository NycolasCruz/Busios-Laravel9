<?php

namespace App\Http\Controllers;

use App\Enums\IncomeTypeEnum;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $incomes = IncomeTypeEnum::cases();

        return view('dashboard', ['incomes' => $incomes]);
    }

    public function store(StoreRequest $request)
    {
        $allData = $request->validated();

        // vai pegar o usuário logado e salvar no banco
        $user = auth()->user();
        $allData['user_id'] = $user->id;

        return Store::create($allData);
    }

    public function getAllData()
    {
        // vai pegar tudo da model Store e carregar também a função user, q é o relacionamento, trazendo os dados do usuário
        return Store::all()->load('user');
    }

    public function show($id)
    {
        $data = Store::findOrFail($id);

        // vai pegar tudo da model Store e a função user, quando o id for igual ao id passado
        $storeOwner = Store::with('user')->where('id', $data->id)->first();

        return response()->json($storeOwner);
    }

    public function update(Request $request)
    {
        $data = Store::findOrFail($request->id)->update($request->all());

        return response()->json($data);
    }
}
