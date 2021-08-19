<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\BodyType;
use App\Models\CarPhoto;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function createCar($model_id)
    {
        $model = CarModel::find($model_id);
        $bodytypes = BodyType::all();
        return view('car.createcar',[ 'model'=> $model,'bodytypes'=> $bodytypes]);
    }

    public function createCarSubmit(Request $request) 
    {
        //Check authorisation
        if(Auth::guest()) {
            return redirect()->route('dashboard')->with('error','Необходима аlвторизация');
        }

        //Check Admin
        if( auth()->user()->admin!= 1) {
            return redirect()->route('home')->with('error','Добавить может только администратором');
        }

        $this->validate($request,[
            'car_name'=>'required',
            'capacity'=>'integer'
        ]);

        $car = new Car;
        $car->car_name = $request->input('car_name');
        $car->modification = $request->input('modification');
        $car->capacity = $request->input('capacity');
        $car->year_of_issue = $request->input('yearissue');
        $car->year_end = $request->input('yearend');
        $car->body_type_id = $request->input('bodytype');
        $car->car_model_id = $request->input('model_id');

        $car->save();

        return redirect()->route('car-model',$request->input('model_id'))->with('success','Комплектация была добавлена');  
    }

    public function show($id)
    {
        $car = Car::with('carPhoto')->find($id);

        
        return view('car.cardetails',[ 'car'=> $car]);
    }
}
