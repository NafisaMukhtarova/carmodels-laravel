<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarBrand;

class CarBrandController extends Controller
{
    public function index()
    {
        $carbrands = CarBrand::all();
        return view('brand.index')->with('brands',$carbrands);

    }

    public function createBrand()
    {
        return view('brand.createbrand');
    }

    public function createBrandSubmit(Request $req)
    {
        $filenameToStore = null;

        if(($req->hasFile('image'))) {
        
            //Get filename with extension
            $filenameWithExt =  $req->file('image')->getClientOriginalName();

            //Get just the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            // Get extension
            $extension =  $req->file('image')->getClientOriginalExtension();

            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $req->file('image')->storeAs('public/brandphotos',$filenameToStore);
        }

        $brand = new CarBrand;
        $brand->car_brand_name = $req->input('brand_name');
        $brand->brand_photo = $filenameToStore;

        $brand->save();
        return redirect()->route('home')->with('success',' Бренд был добавлен');
    }

    public function show($brand_id)
    {
        $brand = CarBrand::with(['carModel'=>function($query){
            $query->orderBy('car_model_name');
        }])->find($brand_id);
        return view('model.models')->with('brand',$brand);
    }
}
