<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    public function getProduct()
    {
        return product::get();
    }
    public function addProduct(Request $request){
        $valed = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
        return product::create($valed);
    }
    public function deleteProduct($id){
        return product::where("id", $id) -> delete();
    }
}
