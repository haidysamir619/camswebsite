<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Receipt;
use App\Models\Order;


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
        $totalprice=0;
        foreach ($carts as $cart):
            $price=$cart->product->price;
            $quantity=$cart->quantity;//
            $totalprice+=$price*$quantity;
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
        $user = auth()->user();
        $product=Cart::where('product_id',$id)->where('user_id',$user->id)->select();
        $product->delete();
        return redirect()->back()->with(['deleted'=>'deleted from cart']);
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
        $totalprice=0;
        foreach ($products as $product):
            $price=$product->product->price;
            $quantity=$product->quantity;//
            $totalprice+=$price*$quantity;
            $productcount +=$product->quantity;
        endforeach;
        return view('checkout',compact('products','totalprice','productcount'));
    }

}
public function  continuetocheckout(Request $request){
    $user=Auth::user();
    $validated = $request->validate([
        'fullname' => ['required', 'string', 'max:255'],
        'email' => ['required'],
        'address' => ['required'],
         'zip' => ['required'],
         'state' => ['required', 'string'],
         'country' => ['required', 'string'],

        'city' => ['required', 'string'],
        'cardname' => ['required'],
        'phone' => ['required'],

        'cardnumber' => ['required','min:3','regex:/^[\p{Arabic}0-9\-\, ]|[a-zA-Z0-9\-\, ]+$/u'],
        'expmonth' => ['required'],
        'expyear' => ['required'],
        'cvv' => ['required'],
        'sameadr' => ['required'],
    ]);
    $carts=Cart::with('product')->where('user_id',$user->id)->get();
    $totalprice=0;

    foreach ($carts as $cart):
        $price=$cart->product->price;
        $quantity=$cart->quantity;//
        $totalprice +=$price*$quantity;
    endforeach;
      $receipt= new Receipt();//new row in db
      $receipt->user_id=$user->id;
      $receipt->address=$request->address;
      $receipt->city=$request->city;
      $receipt->phone=$request->phone;
      $receipt->country=$request->country;
      $receipt->state=$request->state;
      $receipt->total_price=$totalprice;
      $receipt->save();
    $cartproducts=Cart::where('user_id',$user->id)->get();
    foreach($cartproducts as $cartproduct){
        $order= new Order();//new row in db
        $order->quantity=$cartproduct->quantity;
        $order->product_id=$cartproduct->product_id;
        $order->receipt_id=$receipt->id;
        $order->save();
    }
    foreach($cartproducts as $cartproduct){
        $cartproduct->delete();
    }
    return redirect()->route('cart');


}
}
