<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Str;
use \DB;
use App\Models\Product;
use App\Models\Category;
use \Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $product = Product::orderby('id','DESC');
        if($request->keySearch){
            $product->where('name','like','%'.$request->keySearch.'%');
        }
        $product = $product->paginate(5);
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderby('id','DESC')->get();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->only('name','price','info','quantity','status');
        $product['sold'] = 0;
        $product['category_id']= $request->category;
        $product['created_at'] = now();
        $product['updated_at'] = now();
        $product['admin_id'] = \Auth::guard('admin')->user()->id;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('');
            $product['image'] = $path;
        }
        // dd($product);
        Product::create($product);
        return redirect()->route('admin.product.index')->with('success','Thêm mới sản phẩm thành công');
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
    public function edit(Product $product)
    {
        $category = Category::orderby('id','DESC')->get();
        return view('admin.product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $productNew = $request->only('name','price','info','status');
        $productNew['category_id'] = $request->category;
        $productNew['updated_at'] = now();
        $productNew['admin_id'] = \Auth::guard('admin')->user()->id;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('');
            $productNew['image'] = $path;

            $file = $product->image;
            if($file && Storage::exists($file)){
                Storage::delete($file);
            }
        }
        if(!$product->update($productNew)){
            return redirect()->route('admin.product.index')->with('erorr','Cập nhật thất bại');
        }
        return redirect()->route('admin.product.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(!$product->delete()){
            return redirect()->route('admin.product.index')->with('erorr','Xóa thất bại');
        }
        return redirect()->route('admin.product.index')->with('success','Xóa thành công');
    }

    //function search
    public function search(Request $request)
    {
        $input = $request->q;
        if (empty($input)) {
            return response()->json([]);
        }

        $provinces = Product::select("id", "name")->where('name', 'like','%' . $input . '%')->limit(5)->get();

        return response()->json($provinces);

    }
}
