<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    
    public function index()
    {
        //
        $prices = Price::all();

        return \view('admin.prices.index', \compact('prices'));
    }

   
    public function create()
    {
        //
        return \view('admin.prices.create');

    }

    
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:prices',
            'value' => 'required|numeric'
        ]);

        $price = Price::create($request->all());

        return \redirect()->route('admin.prices.edit', $price)->with('info', 'El Nuevo valor se creó con éxito.');
    }

   
    public function show(Price $price)
    {
        //
    }

    
    public function edit(Price $price)
    {
        return \view('admin.prices.edit', \compact('price'));
    }

  
    public function update(Request $request, Price $price)
    {
        //
        $request->validate([
            'name' => 'required|unique:prices,name,'. $price->id,
            'value' => 'required|numeric'
        ]);

        $price->update($request->all());

        return \redirect()->route('admin.prices.edit', $price)->with('info', 'El precio se actualizó con éxito.');
    }

    
    public function destroy(Price $price)
    {
        if ($price->course->count() > 0) {
            return \redirect()->route('admin.prices.index')->with('info-error', 'El precio no se puede eliminar porque esta en usó.');
        }

        $price->delete();

        return \redirect()->route('admin.prices.index')->with('info', 'El precio anterior se eliminó con éxito.');
    }
}
