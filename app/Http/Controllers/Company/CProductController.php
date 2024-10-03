<?php

namespace App\Http\Controllers\Company;

use App\Models\UnitMdl;
use App\Models\ProductMdl;
use Illuminate\Http\Request;
use App\Models\ProductPhotoMdl;
use App\Models\ProductCategoryMdl;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * ============================
     * ============================
     */
    public function index()
    {
        $products = ProductMdl::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $productsCount = ProductMdl::where('user_id', Auth::user()->id)->count();

        $photos = ProductPhotoMdl::select('id', 'product_id')->get()->countBy('product_id')->all();

        return view('companyProducts.index', compact('products', 'productsCount', 'photos'));
    }
    /**
     * ============================
     * ============================
     */
    public function create()
    {
        if (App::getLocale() == 'ar') {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        }

        return view('companyProducts.create', compact('categories', 'units'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'name_ar' => 'nullable|string',
            'name_en' => 'required|string',
            'category' => 'required|integer|exists:products_categories,id',
            'quantity' => 'required|numeric',
            'unit'      => 'required|integer|exists:units,id',
            'price'     => 'required|numeric',
        ], [
            //'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string' => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string' => __('general.Format Not Matching'),

            'category.required' => __('general.Field Is Required'),
            'category.integer'  => __('general.Format Not Matching'),
            'category.exists'    => __('general.This Filed Dosnt Exist'),

            'quantity.required' => __('general.Field Is Required'),
            'quantity.numeric' => __('general.Field Is Required'),

            'unit.required' => __('general.Field Is Required'),
            'unit.integer'  => __('general.Format Not Matching'),
            'unit.exists'    => __('general.This Filed Dosnt Exist'),

            'price.required' => __('general.Field Is Required'),
            'price.numeric' => __('general.Field Is Required'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        if ($req->name_ar == null) {
            $name_ar = $req->name_en;
        } else {
            $name_ar = $req->name_ar;
        }

        ProductMdl::create([
            'user_id'                  => Auth::user()->id,
            'product_category_id' => $req->category,
            'unit_id'                  => $req->unit,
            'name_en'               => $req->name_en,
            'name_ar'               => $name_ar,
            'quantity'               => $req->quantity,
            'price'                   => $req->price,
            'description_en'       => $req->description_en,
            'description_ar'       => $req->description_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return redirect()->route('c-company.product.index');
    }
    /**
     * ============================
     * ============================
     */
    public function edit(ProductMdl $product)
    {
        $product::find($product);

        if (App::getLocale() == 'ar') {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
        } else {
            $categories = ProductCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();

            $units = UnitMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
        }


        return view('companyProducts.edit', compact('product', 'categories', 'units'));
    }
    /**
     * ============================
     * ============================
     */
}
