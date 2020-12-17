<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function cart(){
        $user = auth()->user();
        if(!$user){
            return redirect()->route('login');

        }else{
        $carts=Cart::with('product')->where('user_id',$user->id)->get();
        if($carts->isEmpty()){
            $productcount=0;
            $totalprice=0;

        }else{
        $productcount=0;
        foreach ($carts as $cart):
            $price=$cart->product->price;
            $quantity=$cart->quantity;//
            $totalprice=$price*$quantity;
            $productcount +=$cart->quantity;
        endforeach;
    }
        return view('cart',compact('carts','totalprice','productcount'));
    }
}
    public function addtocart(Request $request,$id){
        $user = auth()->user();
        if($user){
        $exist=Cart::where('product_id',$id)->where('user_id',$user->id)->get();
        if($exist->isEmpty()){

        $cart= new cart();//new row in db
        $cart->quantity=1;
        $cart->user_id=$user->id;
        $cart->product_id=$id;
        $cart->save();
        return redirect()->back()->with(['added'=>'added to cart']);
    }else{

    return redirect()->back()->with(['added'=>'already added to cart']);

    }
}
return redirect()->back()->with(['added'=>'please login first']);

    }
    public function deletefromcart($id){
        $products=Cart::where('product_id',$id)->get();
        foreach($products as $product){
            $product->delete();
        }

        return redirect()->back()->with(['deleted'=>'deleted from cart']);
        // return route('cart');

    }
    public function updatecart(Request $request){
        $cart=Cart::find($request->cartid);
        $cart->quantity=$request->get('quantity');
        $cart->save();
        return redirect()->back()->with(['deleted'=>'updated']);


    }
    public function processtocheckout(){
        $user = auth()->user();
        $products=Cart::with('product')->where('user_id',$user->id)->get();
        if($products->isEmpty()){
            return redirect()->back()->with(['added'=>'cart is empty']);

        }
        else{
        $productcount=0;
        foreach ($products as $product):
            $price=$product->product->price;
            $quantity=$product->quantity;//
            $totalprice=$price*$quantity;
            $productcount +=$product->quantity;
        endforeach;
        // $receipt= new Receipt();//new row in db
        // $receipt->user_id=$user->id;
        // $receipt->total_price=$totalprice;
        // $receipt->save();
        // $order= new Order();//new row in db
        // $order->quantity=$user->id;
        // $receipt->total_price=$totalprice;

        return view('checkout',compact('products','totalprice','productcount'));
    }
}
}
