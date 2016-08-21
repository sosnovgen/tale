<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\Article;
use App\Category;
use Validator;
use Session;
use Redirect;

use App\Http\Requests;

class ListController extends Controller
{
    //------------------- Список заказов  -----------------------
    public function list_orders()
    {
        $orders = Order::all();
        foreach ($orders as $order)
        {
            $products = Product::where('order_id','=',$order -> id) -> get();
            $summa = 0;
            foreach($products as $product)
            {
                $summa = $summa +(($product -> cena)*($product -> count));
            }
            $order['summa'] = $summa;
        }

        //return view('admin.test',['orders' => $orders]);
        $products = Product::all();

        return view('admin.list',
            [
                'orders' => $orders,
                'products' => $products,
            ]);

    }

    //-------------------------------------------------------
    //Изменить статус заказа.
    public function edit($id)
    {

    }

    //-------- Удаление строки заказа -------------------
    public function destroy($id)
    {
        $order = Order::find($id); //сам заказ
        $order -> delete();

        $product = Product::where('order_id','=',$id); //все товары из этого заказа
        $product -> delete();

    }
    //-------- Сведения о заказе -------------------
    public function detals($id)
    {
        $order = Order::find($id); //сам заказ
        $status = ['Новый','Закрыт','Оплачен','Отменён'];
        
        $products = Product::where('order_id','=',$order -> id) -> get();
        $summa = 0;
        foreach($products as $product)
        {
            $summa = $summa +(($product -> cena)*($product -> count));
        }
        $order['summa'] = $summa;
        
        
        
        
        
        return view('admin.detals',
            [
                'order' => $order,
                'products' => $products,
                'status' => $status,
            ]);
    }

    //-------- Сохранить изменения в заказе -------------------
    public function store(Request $request,$id)
        {
            $order = Order::find($id);
            $order -> update($request->all()); //внести исправления

            Session::flash('message', 'Изменения сохранены!');
            return redirect()->back();
       
        }   

}
