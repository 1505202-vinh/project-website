<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Arr;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->session());
        // $request->session()->forget('cart');
        $cart = $request->session()->get('cart');
        $cart = Arr::sort($cart);
        // dd($cart);
        $total =0;
        foreach($cart as $row){
            $total+= $row['price']*$row['quantity'];
        }
        return view('home.layouts_home.cart',compact('cart','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Product $product)
    {
        $checkcart = true;
        if($request->session()->has('cart')){
            foreach($request->session()->get('cart') as $cart){
                if($cart['id'] == $request->id){
                    $checkcart = false;
                    break;
                }
            }
        }
        if($checkcart){
            $cartProduct = Product::where('id','=',$request->id)->first();
            $request->session()->push('cart',['id'=>$cartProduct->id,'name'=>$cartProduct->name,'price'=>$cartProduct->price,'image'=>$cartProduct->image,'quantity'=>1]);

        }
        else{
            $cartss=[];
            foreach($request->session()->get('cart') as $key=>$cart){
                if($cart['id'] == $request->id){
                    $cartss = Arr::prepend($cartss,$cart);
                    $cartss[0]['quantity']+=1;
                    // $request->sesison()->push()
                }
                else{
                    $cartss = Arr::prepend($cartss,$cart);
                }
            }
        $request->session()->forget('cart');
        $request->session()->put('cart',$cartss);
        }
        // Cart::add(['id'=>$cartProduct->id,'name'=>$cartProduct->name,'price'=>$cartProduct->price,'image'=>$cartProduct->image]);
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function up(Request $request){
        $cartss=[];
        foreach($request->session()->get('cart') as $key=>$cart){
            if($cart['id'] == $request->id){
                $cartss = Arr::prepend($cartss,$cart);
                $cartss[0]['quantity']+=1;
                // $request->sesison()->push()
            }
            else{
                $cartss = Arr::prepend($cartss,$cart);
            }
        }
        $request->session()->forget('cart');
        $request->session()->put('cart',$cartss);
        // dd($request->session());
        return redirect()->route('cart');
    }
    public function low(Request $request){
        $cartss=[];
        foreach($request->session()->get('cart') as $key=>$cart){
            if($cart['id'] == $request->id){
                $cartss = Arr::prepend($cartss,$cart);
                if($cartss[0]['quantity']>1){
                    $cartss[0]['quantity']-=1;
                }

                // $request->sesison()->push()
            }
            else{
                $cartss = Arr::prepend($cartss,$cart);
            }
        }
        $request->session()->forget('cart');
        $request->session()->put('cart',$cartss);
        return redirect()->route('cart');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(count($request->session()->get('cart'))==1){
            $request->session()->forget('cart');
        }
        else{
            $cartss=[];
            foreach($request->session()->get('cart') as $key => $cart){

                if(!($request->id == $cart['id'])){
                    $cartss = Arr::prepend($cartss,$cart);
                }
            }
            $cartss = Arr::sort($cartss);
            // dd($cartss);
            $request->session()->forget('cart');
            foreach($cartss as $row){
                $request->session()->push('cart',$row);
            }
            // dd($request->session());
        }

        return redirect()->route('cart');
    }
}
//main

