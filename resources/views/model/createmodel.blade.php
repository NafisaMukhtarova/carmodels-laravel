@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="d-flex justify-content-center">
        <h1>Add model - {{$brand->car_brand_name}}</h1>
    </div>
    <div  class="d-flex justify-content-center">
        <img src="/storage/brandphotos/{{$brand->brand_photo}}"class="img-fluid">    
    </div>
   
    <form action="{{ route('model-submit') }}" method="POST">
        
        @csrf
            <div class="mb-3">
                 <label for="car_model_name" class="form-label">Model name</label>
                <input type="text" class="form-control" inactive id="car_model_name" name="car_model_name" required >
                <input type="hidden" id="brand_id" name="brand_id" value = {{$brand->id}}>    
            </div>
            
        
        <button type="submit" class="btn btn-primary" > Добавить</button>
    
    </form>
</div>

@endsection;