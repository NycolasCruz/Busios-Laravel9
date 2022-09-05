<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $storeCreated = new Store;

        $storeCreated->name = $request->name;
        $storeCreated->branch = $request->branch;
        $storeCreated->description = $request->description;
        $storeCreated->cpf = $request->cpf;
        $storeCreated->number = $request->number;
        $storeCreated->place = $request->place;

        return $storeCreated->save();
    }

    public function getAxios()
    {
        return Store::all();
    }
}
