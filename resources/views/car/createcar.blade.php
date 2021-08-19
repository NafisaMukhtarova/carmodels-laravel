@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="d-flex justify-content-center">
        <h1> Добавить комплектацию модели - {{$model->car_model_name}}</h1>
    </div>

    <form action="{{ route('car-submit') }}" method="POST">
        
        @csrf
        <input type="hidden" id="model_id" name="model_id" value = {{$model->id}}> 


        <div class="form-group">
            <label for="bodytype"> Body type</label>
            <select class="form-control" id="bodytype" name="bodytype">
                @foreach ($bodytypes as $type)
                <option value="{{ $type->id }}">{{ $type->body_type }}</option>
                
                @endforeach
            </select>
        </div>
            

            <div class="mb-3">
                 <label for="car_name" class="form-label">Name</label>
                <input type="text" class="form-control" inactive id="car_name" name="car_name" required >
                   
            </div>
            
            
            <div class="mb-3">
                <label for="modification" class="form-label">Modification</label>
               <input type="text" class="form-control" inactive id="modification" name="modification" required >
                  
           </div>

           <div class="mb-3">
                  <label for="capacity" class="form-label">Capacity, horsepower</label>
                <input type="number" class="form-control" inactive id="capacity" name="capacity" required >
              
            </div>

            <div class="mb-3">
                <label for="yearissue" class="form-label">Year of issue</label>
              <input type="number" class="form-control" inactive id="yearissue" name="yearissue" 
                                 placeholder="YYYY" min ="1900" max = "2050" required>
            
          </div>

          <div class="mb-3">
                  <label for="yearend" class="form-label">Year end</label>
                <input type="text" class="form-control" inactive id="yearend" name="yearend" 
                                 placeholder="YYYY" min ="1900" max = "2050">
              
            </div>
            
            
        
        <button type="submit" class="btn btn-primary" > Добавить комплектацию</button>
    
    </form>
</div>
@endsection