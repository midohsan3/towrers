<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ProductMdl;
use Illuminate\Http\Request;
use App\Models\ProductPhotoMdl;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductByCompanyController extends Controller
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
    public function index(User $user)
    {
        $user::find($user);

        $products = ProductMdl::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(pageCount);

        $productsCount = ProductMdl::where('user_id', $user->id)->count();

        $photos = ProductPhotoMdl::select('id', 'product_id')->get()->countBy('product_id')->all();

        return view('productsByCompany.index', compact('user', 'products', 'productsCount', 'photos'));
    }
    /**
     * ============================
     * ============================
     */
    public function create(User $user)
    {
        $user::find($user);
        return view('productsByCompany.create', compact('user'));
    }
    /**
     * ============================
     * ============================
     */
    public function store(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'user' => 'required|integer|exists:users,id',
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'quantity' => 'required|numeric',
            'price'     => 'required|numeric',
        ], [
            'user.required' => __('general.Cant complete Your Request Now'),
            'user.integer'  => __('general.Cant complete Your Request Now'),
            'user.exists'    => __('general.Cant complete Your Request Now'),

            'name_ar.required' => __('general.Field Is Required'),
            'name_ar.string' => __('general.Format Not Matching'),

            'name_en.required' => __('general.Field Is Required'),
            'name_en.string' => __('general.Format Not Matching'),

            'quantity.required' => __('general.Field Is Required'),
            'quantity.numeric' => __('general.Field Is Required'),

            'price.required' => __('general.Field Is Required'),
            'price.numeric' => __('general.Field Is Required'),
        ]);

        if ($valid->fails()) {
            return back()->withErrors($valid)->withInput($req->all());
        }

        ProductMdl::create([
            'user_id'            => $req->user,
            'name_en'         => $req->name_en,
            'name_ar'         => $req->name_ar,
            'quantity'         => $req->quantity,
            'price'             => $req->price,
            'description_en' => $req->description_en,
            'description_ar' => $req->description_ar,
        ]);

        Alert()->success(__('general.Record Added Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
