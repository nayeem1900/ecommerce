<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Product;
use App\ProductImage;
use Intervention\Image\Facades\Image;

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



        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);






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

        /*  // ProductImage Model inser Image
           if ($request-> hasFile('product_image')){
               // insert that image
               $image =$request->file('product_image');
               $img =time(). '.'.$image->getClientOriginalExtension();
               $location=public_path('images/products/'.$img);
               Image::make($image)->save( $location);
               $product_image=new ProductImage;
               $product_image->product_id= $product->id;
               $product_image->image= $img;
               $product_image->save();
           }
   */

        if (count($request->product_image)>0){
            foreach ($request->product_image as $image){

                // insert that image

                //$image =$request->file('product_image');
                $img =time(). '.'.$image->getClientOriginalExtension();
                $location=public_path('images/products/'.$img);

                Image::make($image)->save( $location);
                $product_image=new ProductImage;
                $product_image->product_id= $product->id;
                $product_image->image= $img;
                $product_image->save();



            }
        }




        return redirect()->route('admin.product.create');


    }



}


