<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderMdl;
use App\Models\CompanyMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
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
        $orders = OrderMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $ordersCount = OrderMdl::count();

        $list_title = __('general.All');

        return view('orders.index', compact('orders', 'ordersCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
    public function show($order)
    {
        $order = OrderMdl::find($order);

        if ($order) {
            return view('orders.show', compact('order'));
        }
    }
    /**
     * ============================
     * ============================
     */
    public function approve(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'orderID' => 'required|integer|exists:orders,id'
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $order = OrderMdl::findOrFail($req->orderID);
        $order->status = 1;
        $order->save();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function reject(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'orderID' => 'required|integer|exists:orders,id',
            'reason' => 'required|string',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $order = OrderMdl::findOrFail($req->orderID);
        $order->reject_reason = $req->reason;
        $order->status = 3;
        $order->save();

        Alert()->success(__('general.Record Updated Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
    public function destroy(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'orderID' => 'required|integer|exists:orders,id',
        ]);

        if ($valid->fails()) {
            Alert()->error(__('general.Cant complete Your Request Now'));
            return back();
        }

        $order = OrderMdl::findOrFail($req->orderID);
        $order->delete();

        Alert()->success(__('general.Record Deleted Successfully'));
        return back();
    }
    /**
     * ============================
     * ============================
     */
}
