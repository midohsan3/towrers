<?php

namespace App\Http\Controllers\Api;

use App\Models\OrderMdl;
use App\Models\ProductMdl;
use Illuminate\Http\Request;
use App\Models\ProductPhotoMdl;
use App\Models\ProductCategoryMdl;
use App\Models\ProjectCategoryMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductPController extends Controller
{
    /*
    ===================
    ===================
    */
    public function index()
    {
        $products = ProductMdl::orderBy('id', 'DESC')->paginate(pageCount);
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        }elseif(empty($products)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function photos()
    {
        $photos = ProductPhotoMdl::orderby('product_id', 'ASC')->get();
        if ($photos->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $photos));
        }elseif(empty($photos)){
            return json_encode(array('status' => 'empty'));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function categories(){
        $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

        if ($categories->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $categories));
        }elseif(empty($categories)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function category($category){

        $category = ProductCategoryMdl::find($category);

        $products = ProductMdl::where('product_category_id', $category->id)->orderBy('id', 'DESC')->paginate(pageCount);

        if ($products->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $products));
        }elseif(empty($products)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function single($product){

        $product=ProductMdl::find($product);

        if ($product->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $product));
        }elseif(empty($product)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function productPhotos($product){

        $product=ProductMdl::find($product);

        $photos = $photos = ProductPhotoMdl::where('product_id', $product->id)->get();

        if ($photos->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $photos));
        }elseif(empty($photos)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function recommended($product){

        $product=ProductMdl::find($product);

        $recommended = ProductMdl::where('product_category_id',
        $product->product_category_id)->inRandomOrder()->limit(4)->get();

        if ($recommended->count() > 0) {
        return json_encode(array('status' => 'success', 'data' => $recommended));
        }elseif(empty($recommended)){
        return json_encode(array('status' => 'empty'));
        } else {
        return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function aluminum()
    {
        $products = ProductMdl::where('product_category_id', 4)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function blocks()
    {
        $products = ProductMdl::where('product_category_id', 6)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function cement()
    {
        $products = ProductMdl::where('product_category_id', 5)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function electrical()
    {
        $products = ProductMdl::where('product_category_id', 12)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function machinery()
    {
        $products = ProductMdl::where('product_category_id', 9)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function marbles()
    {
        $products = ProductMdl::where('product_category_id', 10)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function paints()
    {
        $products = ProductMdl::where('product_category_id', 7)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function plumbing()
    {
        $products = ProductMdl::where('product_category_id', 8)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function steel()
    {
        $products = ProductMdl::where('product_category_id', 3)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function tiles()
    {
        $products = ProductMdl::where('product_category_id', 11)->orderBy('id', 'DESC')->get();
        if ($products->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $products));
        } else {
            return json_encode(array('status' => 'fail'));
        }
    }
    /*
    ===================
    ===================
    */
    public function inquire(Request $req){
        $valid = Validator::make($req->all(), [
        'product_id' => 'required|integer|exists:products,id',
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        'details' => 'required|string|min:10',
        ], [
        'product_id.required' => __('general.Cant complete Your Request Now'),
        'product_id.integer' => __('general.Cant complete Your Request Now'),
        'product_id.exists' => __('general.Cant complete Your Request Now'),

        'name.required' => __('general.Field Is Required'),
        'name.string' => __('general.Format Not Matching'),
        'name.min' => __('general.Text Too Short'),

        'email.required' => __('general.Field Is Required'),
        'email.email' => __('general.Format Not Matching'),

        'phone.required' => __('general.Field Is Required'),
        'phone.numeric' => __('general.Format Not Matching'),

        'details.required' => __('general.Field Is Required'),
        'details.string' => __('general.Format Not Matching'),
        'details.min' => __('general.Text Too Short'),
        ]);

        if ($valid->fails()) {
            return json_encode(array('status' => 'fail','data'=>null,'errors'=>$valid));
        }

        $product = ProductMdl::find($req->product_id);

        $order = OrderMdl::create([
        'user_id' => $product->user_id,
        'product_id' => $product->id,
        'name' => $req->name,
        'phone' => $req->phone,
        'email' => $req->email,
        'subject' => 'Product' . $product->name_en,
        'details' => $req->details,
        'status' => 0,
        ]);

        if ($order->count() > 0) {
            return json_encode(array('status' => 'success', 'data' => $order));
        } else {
            return json_encode(array('status' => 'fail','data'=>null));
        }
    }
    /*
    ===================
    ===================
    */
}