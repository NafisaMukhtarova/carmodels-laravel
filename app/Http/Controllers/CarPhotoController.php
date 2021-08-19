<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CarPhoto;


class CarPhotoController extends Controller
{
    public function createPhoto($car_id)
    {
        return view('photo.createphoto',['car_id'=>$car_id]);
    }

    public function createPhotoSubmit(Request $request)
    {
        //Check authorisation
        if(Auth::guest()) {
            return redirect()->route('dashboard')->with('error','Необходима аlвторизация');
        }

        //Check Admin
        if( auth()->user()->admin!= 1) {
            return redirect()->route('home')->with('error','Добавить может только администратором');
        }

        $filenameToStore = null;

        if(($request->hasFile('image'))) {
        
            //Get filename with extension
            $filenameWithExt =  $request->file('image')->getClientOriginalName();

            //Get just the filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

            // Get extension
            $extension =  $request->file('image')->getClientOriginalExtension();

            //Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/gallery',$filenameToStore);
        }

        $carphoto = new CarPhoto;
        $carphoto->car_id = $request->input('car_id');
        $carphoto->car_photo = $filenameToStore;

        $carphoto->save();

        return redirect()->route('car-details',$request->input('car_id'))->with('success','Фото было добавлено');

    }
}
