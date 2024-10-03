<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionMdl;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
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
        $subscribers = SubscriptionMdl::orderBy('id', 'DESC')->paginate(pageCount);

        $subscribersCount = SubscriptionMdl::count();

        $list_title = __('general.All');

        return view('subscription.index', compact('subscribers', 'subscribersCount', 'list_title'));
    }
    /**
     * ============================
     * ============================
     */
}
