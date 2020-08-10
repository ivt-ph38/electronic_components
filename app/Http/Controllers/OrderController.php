<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\OrderCreateRequest;
use Session;
use Cart;
use Illuminate\Support\Str;
use Mail;

session_start();

class OrderController extends Controller
{
    const PAGE = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(self::PAGE);
        return view('admin.orders.index',compact('orders'));
    }

    public function searchByStatus(Request $request)
    {
        $status = $request->status;
        if ($status == 0) {
            $orders = Order::paginate(self::PAGE);
        } else {
            $orders = Order::where('status', $status)->paginate(self::PAGE);
        }
        return view('admin.orders.index',compact('orders', 'status'));
    }

    public function search(Request $request)
    {
        $query = Order::where('id', '<>', 0);
        if ($request->name != '') { 
            $query->where('name', 'like', '%'.$request->name.'%');
        }
        if ($request->phone != '') { 
            $query->where('phone', 'like', '%'.$request->phone.'%');
        }
        if ($request->id != '') { 
            $query->where('id', $request->id)->orWhere('code', $request->id);
        }
        $orders = $query->paginate(self::PAGE);
        return view('admin.orders.index',compact('orders'));
    }

    public function checkout_form()
    {
        $menus = Category::where('parent_id', '=', 0)->get();
        return view('pages.checkout',compact('menus'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request)
    {
        $request->request->add(['code' => strtoupper(Str::random($length = 4)).time()]);
        $request->request->add(['status' => 1]);
        $request->request->add(['total' => (int)Cart::total(0, 0, '')]);
        $request->request->add(['discount' => 0]);
        $data = $request->except('_token');
        $order = Order::create($data);
        foreach (Cart::content() as $item) {
            $data['price'] = $item->price;
            $data['quantity'] = $item->qty;
            $data['product_id'] = $item->id;
            $data['order_id'] = $order->id;
            $data['discount'] = $item->options->discount;
            $detail = OrderDetail::create($data);
        }
        Cart::destroy();
    
            $email = $order->email;
            
        Mail::send('admin.orders.send_mail', compact('order'), function($message) use($order){
            $message->to( $order->email, 'THSHOP')->subject('THSHOP phản hồi: Đặt hàng thành công');
        });


        $menus = Category::where('parent_id', '=', 0)->get();
        $request->session()->flash('success', 'Đặt hàng thành công! Vui lòng kiểm tra email!');
        return redirect(url('/order/'.$order->code)); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $order = Order::where('code', $request->code)->firstOrFail();
        $menus = Category::where('parent_id', '=', 0)->get();
        return view('pages.show_order',compact('menus', 'order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $order = Order::findOrFail($request->id);
        return view('admin.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
