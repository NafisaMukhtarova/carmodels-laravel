@extends('layouts.app')


@section('content')
<div class="container">
    <div  class="d-flex justify-content-center">
        <h1>Комплектации модели {{$model->car_model_name}}</h1>
    </div>
    <div >

    @guest
    @else
        @if(  Auth::user()->admin  == 1 )
            <a class = "button" href="{{ route('add-car',$model->id) }}"> Добавить комплектацию</a>
        @endif
    @endguest

        
    </div>
</div>

<div class="container">
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-">     
         @foreach($model->car as $car)
         
             <div class="col">  
                 <div class="p-3 border bg-light">
                    <a href=" {{ route('car-details',$car->id) }}" role="button">{{$car->car_name}}
                    </a>
                                      </div>    
             </div>
         @endforeach
     </div>   
 
 </div>

@endsection