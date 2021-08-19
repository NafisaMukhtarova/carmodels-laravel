@extends('layouts.app')


@section('content')
<div class="container">
    <div  class="d-flex justify-content-center">
        <h1>Brand {{$brand->car_brand_name}} - Models</h1>
        
    </div>
    <div  class="d-flex justify-content-center">
    <img src="/storage/brandphotos/{{$brand->brand_photo}}"class="img-fluid">
    </div>

    @guest
    @else
        @if(  Auth::user()->admin  == 1 )
        <a class = "button" href="{{ route('add-model',$brand->id) }}">Add model</a>
        @endif
    @endguest

   
</div>

<div class="container">
   <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-">     
        @foreach($brand->carModel as $model)
        
            <div class="col">  
                <div class="p-3 border bg-light">
                    <a href=" {{ route('car-model',$model->id) }}" role="button">{{$model->car_model_name}}
                    </a>
                </div>    
            </div>
        @endforeach
    </div>   

</div>

@endsection