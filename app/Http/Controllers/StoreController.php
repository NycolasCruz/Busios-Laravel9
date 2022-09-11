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

        return Store::create($allData);
    }

    public function getAllData()
    {
        return Store::all();
    }

    public function show($id)
    {
        $data = Store::findOrFail($id);

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $data = Store::findOrFail($request->id)->update($request->all());

        return response()->json($data);
    }
}
