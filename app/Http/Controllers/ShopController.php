<?php

namespace App\Http\Controllers;

use App\Models\ShopModels\Category;
use App\Models\ShopModels\Product;
use App\Models\ShopModels\User;

class ShopController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function viewEditProducts(){
        $products = Product::all();
        return view('viewEditProducts', compact('products'));
    }

    public function viewEditProduct($id){
        $categoryList = Category::all();
        $product = Product::find($id);
        return view('shop/edit-product', compact('product', 'categoryList'));
    }

    public function viewEditCategory($id){
        $category = Category::find($id);
        return view('shop/edit-category', compact('category'));
    }

    public function viewEditCategories(){
        $categories = Category::all();
        return view('shop/viewEditCategories', compact('categories'));
     }

    public function category(){
        return view('shop/create_category');
    }

    public function product(){
        $categoryList = category::all();
        return view('shop/create_product', compact('categoryList'));
    }

    public function categories(){
        $products = Product::all();
        return response()->json(['products' => $products->toArray()]);
    }

    public function profileProductJson($id){
        $product = Product::where('id', $id)->get();
        return response()->json(['product' => $product->toArray()]);
    }

    public function apiCategory(){
        return redirect('/');
    }

    public function profileProduct($id){
        return redirect('/');
    }

    public function apiCategoryJson($id){
        $products = Product::where('category_id', $id)->get();
        return response()->json(['products' => $products->toArray()]);
    }

    public function ordering(){
        $categories = Category::all();
        return view('ordering');
    }


}
