<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $data = new Products();
        $data->fr_name = $request->fr_name;
        $data->fr_oprice = $request->fr_oprice;
        $data->fr_nprice = $request->fr_nprice;

        if($img = $request->file('fr_img')){
            $img_name = uniqid().'.'.$img->getClientOriginalExtension();
            $img->move("uploads/products/",$img_name);
        }

        $data->fr_img = $img_name;
        $data->save();
        return back();
    }

    
    public function actoin($id){
        $data = Products::find($id);
        $data->fr_status = 0;
        $data->update();
        return back();
    }

    public function intoac($id){
        $data = Products::find($id);
        $data->fr_status = 1;
        $data->update();
        return back();
    }

    
    public function editproduct($id)
    {
        $fruits = Products::find($id);
        return view('backend.edit', compact('fruits'));
    }

    
    public function updateproduct(Request $request, $id)
    {
        $upd = Products::find($id);
        $upd->fr_name = $request->fr_name;
        $upd->fr_oprice = $request->fr_oprice;
        $upd->fr_nprice = $request->fr_nprice;

        $oldimg = 'uploads/products/'.$upd->fr_img;
        $updimg = $request->file('fr_img');

        // echo "Old Image: ".$oldimg;
        // echo "     New Image: ".$updimg;

        if($updimg){
            if(file_exists($oldimg)){
                File::delete($oldimg);
            }
            
            $new_img_name = uniqid().'.'.$updimg->getClientOriginalExtension();
            $updimg->move("uploads/products/",$new_img_name);

            $upd->fr_img = $new_img_name;
        }

        $upd->update();
        return redirect()->route('dashboard');
    }

    //Delete the item
    public function delproduct($id)
    {
        $data = Products::find($id);
        $delimg = 'uploads/products/'.$data->fr_img;

        if(file_exists($delimg)){
            File::delete($delimg);
        }

        $data->delete();
        return back();
    }

}
