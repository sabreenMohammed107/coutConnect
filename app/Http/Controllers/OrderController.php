<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Currency;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Order_status;
use App\Models\Organizer;
use App\Models\Payment_method;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Order $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'admin.orders.';
        $this->routeName = 'orders.';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Order::orderBy("created_at", "Desc")->get();
        $status = Order_status::all();
        $currencies=Currency::all();
        $events=Event::all();
        $pages=Doctor::all();
        $payments=Payment_method::all();
        return view($this->viewName . 'index', compact('rows','status','currencies','events',
        'pages','payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function activeOrder(Request $request)
    {
        // activeDoctor
        $row = Order::where('id', $request->get('order_id'))->first();

        $row->update(['order_status_id' => '1']);
        return redirect()->route($this->routeName . 'index')->with('flash_success', '???? ?????????? ??????????');
    }

    public function filter(Request $request)
    {


        $name= $request->get('name');
        //search func
        $opo=Order::select('*');
        if ($request->get("name") && !empty($request->get("name"))) {
            $opo->where('name', 'like', '%' . $name . '%')
            ->orWhere('phone', 'like', '%' . $name . '%');
        }

        if ($request->get("doctor_id") && !empty($request->get("doctor_id"))) {
            $opo->where('doctor_id', '=',$request->get("doctor_id") );

        }

        if ($request->get("payment_id") && !empty($request->get("payment_id"))) {
            $opo->where('payment_method_id', '=',$request->get("payment_id") );

        }
        if ($request->get("status_id") && !empty($request->get("status_id"))) {
            $opo->where('order_status_id', '=',$request->get("status_id") );

        }
        if ($request->get("created_start") && !empty($request->get("created_start"))) {
            $opo->where('created_at', '>=', Carbon::parse($request->get("created_start")));
        }
        if ($request->get("created_end") && !empty($request->get("created_end"))) {
            $opo->where('created_at', '<=', Carbon::parse($request->get("created_end")));
        }

        $rows =  $opo->get();
        return view($this->viewName . 'preIndex', compact('rows'))->render();
    }
}
