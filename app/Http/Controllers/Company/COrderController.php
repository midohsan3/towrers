<?php

namespace App\Http\Controllers\Company;

use App\Models\OrderMdl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class COrderController extends Controller
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
        $orders = OrderMdl::where('user_id', Auth::user()->id)->whereNot('status', 0)->orderBy('id', 'DESC')->paginate(pageCount);

        $ordersCount = OrderMdl::where('user_id', Auth::user()->id)->count();

        $list_title = __('general.All');

        return view('companyOrders.index', compact('orders', 'ordersCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function show($order)
    {
        $order = OrderMdl::find($order);
        if ($order) {
            return view('companyOrders.show', compact('order'));
        }
    }
    /**
     * ============================
     * ============================
     */
    public function complete(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'orderID' => 'required|integer|exists:orders,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $order = OrderMdl::findOrFail($req->orderID);
        $order->status = 2;
        $order->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
