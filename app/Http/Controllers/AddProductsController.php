<?php

namespace App\Http\Controllers;
use App\Models\AddProduct;
use App\Models\category;
use App\Models\Images;
use Illuminate\Http\Request;
class AddProductsController extends Controller
{
    public function products(){
        $category = category::all();
        return view("admin_dashboard.products_list.show_product", compact('category'));
    }


    // public function store_product(Request $request){
    //     $request -> validate([
    //         'product_name' => 'required|string|max:100',
    //         'product_description'=>'required|string|max:100',
    //         'product_price'=> 'required|numeric',
    //         'product_quantity' => 'required|integer|min:1',
    //         'product_category' => 'required|string',
    //         'product_image' => 'required',
    //         'product_image*' => 'mimes:jpg,jpeg,png,gif,svg|max:2048',
    //     ]);
        // $product_image = time() . '.' . $request->product_image->extension();
        // $request->product_image->move(public_path('products/'), $product_image);
        // if ($request->hasFile('product_image')) {
        //     foreach ($request->file('product_image') as $file) {
        //         $imageName = time() . '_' . uniqid() . '.' . $file->extension();
        //         $file->move(public_path('uploads'), $imageName);
        //         AddProduct::create([
        //             'product_name' => $request->input('product_name'),
        //             'product_description' => $request->input('product_description'),
        //             'product_price' => $request->input('product_price'),
        //             'product_quantity' => $request->input('product_quantity'),
        //             'product_category' => $request->input('product_category'),
        //             'product_image' => 'uploads/' . $imageName,
        //         ]);
        //     }
        // }
        // $AddProduct = new AddProduct();
        // $AddProduct->product_name = $request->product_name;
        // $AddProduct->product_description = $request->product_description;
        // $AddProduct->product_price = $request->product_price;
        // $AddProduct->product_quantity = $request->product_quantity;
        // $AddProduct->product_category = $request->product_category;
        // $AddProduct->product_image = 'upload/'.$product_image;
        // $AddProduct->save();

//         return redirect()->back()->with('success', 'Product Added Successfully');
// }


public function store_product(Request $request)
{
    $request->validate([
        'product_name' => 'required|string|max:255',
        'product_price' => 'required|numeric',
        'product_quantity' => 'required|integer',
        'product_description' => 'required|string',
        'product_image' => 'required|array',
        'product_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = AddProduct::create([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'product_category' => $request->product_category,
        'product_description' => $request->product_description,
    ]);

    if ($request->hasFile('product_image')) {
        foreach ($request->file('product_image') as $imageFile) {
            $imagePath = $imageFile->store('products', 'public');

            Images::create([
                'product_id' => $product->id,
                'image_path' => $imagePath
            ]);
        }
    }

    return redirect()->route('Product.list')->with('success', 'Product added successfully!');
}
public function deleteProduct($id){
    AddProduct::destroy($id);
    return redirect()->back()->with('success', 'Category Deleted Successfully');
}


public function IndexProduct(){
    $AddProduct = AddProduct::with('category')->get();
    return view('admin_dashboard.products_list.show_product',compact('AddProduct'));
}
public function AddProducts(){
    $categories = category::all();
    return view('admin_dashboard.products_list.add_products',compact('categories'));
}

public function editProduct($id){
    $product = AddProduct::findOrFail($id);
    $categories = category::all();
    return view('admin_dashboard.products_list.update_product', compact('product', 'categories'));
}
public function updateProduct(Request $request, $id){
        $request->validate([
        'product_name' => 'required|string|max:100',
        'product_description'=>'required|string|max:100',
        'product_price'=> 'required|numeric',
        'product_quantity' => 'required|integer|min:1',
        'product_category' => 'required',
        'product_image' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    $product = AddProduct::findOrFail($id);

    if ($request->hasFile('product_image')) {
        $imagename = time().'.'.$request->product_image->extension();
        $request->product_image->move(public_path('storage/products'), $imagename);
        // dd('Image uploaded to: ' . public_path('upload/' . $imagename));
        $product->product_image = 'products/' . $imagename;
    }

    $product->product_name = $request->product_name;
    $product->product_description = $request->product_description;
    $product->product_price = $request->product_price;
    $product->product_quantity = $request->product_quantity;
    $product->product_category = $request->product_category;
    $product->save();

    return redirect()->route( 'product.edit', $product->id)->with('success', 'Product Updated Successfully');
}


public function ExploreProducts(){
    return view('user.explore_product');
}
}
