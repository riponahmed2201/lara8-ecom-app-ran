<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required|unique:categories',
            'category_status' =>'required'
        ]);

        $categories = new Category();
        $categories->category_name = $request->category_name;
        $categories->status = $request->category_status;

        if ($categories->save())
        {
            return back()->with('success', 'Category successfully saved.');
        }else{
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

//        $category = Category::find($id);
//        $category = Category::where('id','=',$id)->first();
//        $category = Category::where('id',$id)->first();
        //Query Builder
//        $category = DB::table('categories')->where('id',$id)->first();
//        $category = DB::table('categories')->where('id','=',$id)->first();
//        $category = DB::table('categories')->find($id);

        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'category_name' => 'required',
            'category_status' =>'required'
        ]);

        $categories = Category::findOrFail($id);
        $categories->category_name = $request->category_name;
        $categories->status = $request->category_status;

        if ($categories->save())
        {
            return back()->with('success', 'Category successfully updated.');
        }else{
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category)
        {
            $category->delete();
            return back()->with('success', 'Category successfully deleted.');
        }else{
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }
    }

    public function active($id)
    {
        $category = Category::where('id',$id)->update(['status' => 1]);
        if ($category)
        {
            return back()->with('success', 'Category activate successfully.');
        }else{
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }
    }

    public function inactive($id)
    {
        $category = Category::where('id',$id)->update(['status' => 0]);
        if ($category)
        {
            return back()->with('success', 'Category inactivate successfully.');
        }else{
            return back()->with('error', 'Something Error Found, Please try after sometimes.');
        }
    }

}
