<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\CarBrand;

class CarModelController extends Controller
{
    public function index($brand_id)
    {
        $carmodels = CarModel::all();
        return view('models')->with('models',$carmodels);
    }

    public function createModel($brand_id)
    {
        $brand = CarBrand::find($brand_id);
        return view('model.createmodel',[ 'brand'=>$brand]);
    }

    public function createModelSubmit(Request $req)
    {
        $brand = new CarModel;
        $brand->car_brand_id = $req->input('brand_id');
        $brand->car_model_name = $req->input('model_name');
        $brand->save();
        return redirect()->route('car-brand',$req->input('brand_id'))->with('success','Модель была добавлена');  

    }

    public function show($model_id)
    {
        $model = CarModel::with(['car'=>function($query){
            $query->orderBy('car_name');
        }])->find($model_id);
        return view('car.cars')->with('model',$model);
    }
    

}
