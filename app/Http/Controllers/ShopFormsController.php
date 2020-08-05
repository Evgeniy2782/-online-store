<?php

namespace App\Http\Controllers;
use App\Http\Requests\shopRequestForm\FormEditRequestProduct;
use App\Http\Requests\shopRequestForm\FormRequestProduct;
use App\Http\Requests\shopRequestForm\FormRequestCategory;
use App\Http\Requests\shopRequestForm\FormEditRequestCategory;
use App\Models\ShopModels\Product;
use App\Models\ShopModels\Category;
use Illuminate\Http\Request;
use function GuzzleHttp\default_ca_bundle;

class ShopFormsController extends Controller
{
    public function createCategory(FormRequestCategory $request){

        $data = $request->all();
        $categoryName = (new Category())->create($data);

        if($categoryName){
            return redirect()
                ->route('new-category')
                ->with(['success' => 'Успешно сохранено !']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function editCategory(FormEditRequestCategory $request, $id){
        $dataCategory = $request->all();
        $category = Category::find($id);

        if(empty($dataCategory['active'])){
            $category['active'] = 'off';
        }

        if(!empty($dataCategory['active'])){
            $category['active'] = 'on';
        }

        $resultCategory = $category->update($dataCategory);

        if($resultCategory){
            return redirect()
                ->route('view-edit-category', $category->id)
                ->with(['success' => 'Успешно сохранено !']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function editProduct(FormEditRequestProduct $request, $id){
        $dataProduct = $request->all();
        $product = Product::find($id);

                if(empty($dataProduct['active'])){
                    $product['active'] = 'off';
                }

                if(!empty($dataProduct['active'])){
                    $product['active'] = 'on';
                }

        if(!empty($dataProduct['picture'])){
            $dataProduct['picture'] = $request->file('picture')->storePublicly('images/products');;
        }

        $resultProduct = $product->update($dataProduct);

        if($resultProduct){
            return redirect()
                ->route('view-edit-product', $product->id)
                ->with(['success' => 'Успешно сохранено !']);
        }else{
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

    public function createProduct(FormRequestProduct $request){

        $data = $request->all();

        if(!empty($request->picture)) {
            $data['picture'] = $request->file('picture')->storePublicly('images/products');
        }

        $productName = (new Product())->create($data);

        if($productName){
            return redirect()->route('new-product')
                ->with(['success' => 'Успешно сохранено !']);
        }else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                         ->withInput();
        }
    }
}
