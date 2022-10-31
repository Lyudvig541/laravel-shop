<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        $validateData = $request->validated();

        $category = Category::findOrFail($validateData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'price' => $validateData['price'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',

        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

            $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $finalImagePathName,
            ]);
            }
        }

        
        return redirect('/admin/products')->with('message','Product added Successfully');
    }

    public function edit(int $product_id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($product_id);
        return view ('admin.products.edit', compact('categories','product'));
    }

    // public function update(ProductFormRequest $request, int $product_id)
    // {
    //     $validatedData = $request->validated();

    //     $product = Category::findOrFail($validatedData['category_id'])
    //                     ->products()->where('id',$product_id)->first();

    //     if($product)
    //     {
    //         $product->update([
    //             'category_id' => $validateData['category_id'],
    //             'name' => $validateData['name'],
    //             'slug' => Str::slug($validateData['slug']),
    //             'small_description' => $validateData['small_description'],
    //             'description' => $validateData['description'],
    //             'price' => $validateData['price'],
    //             'trending' => $request->trending == true ? '1':'0',
    //             'status' => $request->status == true ? '1':'0',
    
    //         ]);

    //         if($request->hasFile('image')){
    //             $uploadPath = 'uploads/products/';
    
    //             $i = 1;
    //             foreach($request->file('image') as $imageFile){
    //                 $extension = $imageFile->getClientOriginalExtension();
    //                 $filename = time().$i++.'.'.$extension;
    //                 $imageFile->move($uploadPath,$filename);
    //                 $finalImagePathName = $uploadPath.$filename;
    
    //                 $product->productImages()->create([
    //                     'product_id' => $product->id,
    //                     'image' => $finalImagePathName,
    //                 ]);
    //             }
    //         }
    
            
    //         return redirect('/admin/products')->with('message','Product added Successfully');
    //     }
    //     else
    //     {
    //         return redirect('admin/products')->with('message','No such product id found');
    //     }
            
    // }
}

