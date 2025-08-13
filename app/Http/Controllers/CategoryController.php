<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function Create(){
        return view('admin_dashboard.categories.add-category');
    }
    public function Store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:category,category_name',
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $imagename = time() .'.'. $request->image->extension();
        $request->image->move(public_path('upload'),$imagename);

        $category = new category();
        $category->category_name = $request->category_name;
        $category->category_slug= str::slug($request->category_name);
        $category->image = 'upload/'.$imagename;
        $category->save();

        return redirect()->route('category.list')->with('Success', 'Category Added Successfully');

    }
    public function Index(){
        $categories = Category::all();
        return view('admin_dashboard.categories.category-list', compact('categories'));
    }

       public function DeleteId($id){
        category::destroy($id);
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function edit($id)
{
    $category = Category::find($id);
    return view('admin_dashboard.categories.update_category', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'category_name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $data = category::findOrFail($id);
    $data->category_name = $request->category_name;
    $data->category_slug = Str::slug($request->category_name);

    if ($request->hasFile('image')) {
        if ($data->image && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/categories'), $imageName);
        $data->image = 'uploads/categories/' . $imageName;
    }

    $data->save();

    return redirect()->route('category.list')->with('success', 'Category updated successfully.');
}
}
