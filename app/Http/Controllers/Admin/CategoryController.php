<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Str;
use \DB;
use App\Models\Category;
class CategoryController extends Controller
{
    public function create(){
        return View('admin.category.create');
    }
    public function store(Request $request){
        $category['name'] = $request->name;
        $category['status'] = $request->status;
        $category['created_at'] = now();
        $category['updated_at'] = now();
        $category['image'] = 'abc.png';
        $category['admin_id'] = \Auth::guard('admin')->user()->id;
        $category['slug'] = Str::slug($request->name);

        DB::table('categoris')->insert($category);

        return redirect()->route('admin.category.index');
    }
    public function index(Request $request){
        $categorys= Category::orderby('id','DESC');
        if($request->keySearch){
            $categorys = $categorys->where('name','like','%'.$request->keySearch.'%');
        }
        $categorys = $categorys->paginate(7);
        return view('admin.category.index',compact('categorys'));
    }
    public function edit($id){
        $category = DB::table('categoris')->where('id','=',$id)->first();
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $category['name'] = $request->name;
        $category['status'] = $request->status;
        // $category['created_at'] = now();
        $category['updated_at'] = now();
        $category['image'] = 'abc.png';
        $category['admin_id'] = \Auth::guard('admin')->user()->id;
        $category['slug'] = Str::slug($request->name);

        DB::table('categoris')->where('id','=',$id)->update($category);

        return redirect()->route('admin.category.index');
    }
    public function destroy($id){
        DB::table('categoris')->where('id','=',$id)->delete();
        return redirect()->route('admin.category.index');

    }
}
