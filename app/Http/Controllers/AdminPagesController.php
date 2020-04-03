<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Product;

class AdminPagesController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');}


    public function create()
    {
        return view('admin.pages.product.create');
    }


//store

    public function store(Request $request)
    {

        $product=new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;

        $product->slug=($request->title);
        $product->admin_id=1;
        $product->brand_id=1;
        $product->categories_id=1;
        $product->save();
        return redirect()->route('admin.product.create');


    }



}


