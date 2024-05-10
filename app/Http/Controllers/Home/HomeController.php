<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use \Storage;
use Illuminate\Support\Arr;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->pagi){
            $request->session()->put('pagi', $request->pagi);
        }

        $category = Category::orderby('id','DESC')->get();
        $dataProduct = Product::orderby('id','DESC');


        if($request->keySearch){
            $dataProduct = $dataProduct->where('name','like','%'.$request->keySearch.'%');
        }
        if($request->search){
            $dataProduct = $dataProduct->where('category_id','=',$request->search);
        }
        $dataProduct = $dataProduct->paginate($request->session()->has('pagi')?$request->session()->get('pagi'):9);

        //cartmini
        $cart = $request->session()->get('cart');
        $cart = Arr::sort($cart);
        $total =0;
        foreach($cart as $row){
            $total+= $row['price']*$row['quantity'];
        }
        //

        // dd($dataProduct);
        // dd($request->session());
        return view('home.layouts_home.shop',compact('dataProduct','category','cart','total'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyCart(Request $request)
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

        return redirect()->route('home');
    }
}
