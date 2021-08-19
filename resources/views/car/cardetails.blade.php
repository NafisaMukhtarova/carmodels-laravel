@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="d-flex justify-content-center">
        <h1> {{$car->car_name}}</h1>
    </div>

    <form action="" >
        
        @csrf   

            <div class="mb-3">
                 <label for="car_name" class="form-label">Name</label>
                <input type="text" class="form-control" value = {{$car->car_name}} id="car_name" name="car_name" disabled>
                   
            </div>

            <div class="mb-3">
                <label for="body_type" class="form-label">Body type</label>
               <input type="text" class="form-control" value = "{{$car->bodyType->body_type}}" id="body_type" 
                    name="body_type" disabled>
                  
           </div>
            
            <div class="mb-3">
                <label for="modification" class="form-label">Modification</label>
               <input type="text" class="form-control" value = {{$car->modification}} id="modification" 
                    name="modification" disabled>
                  
           </div>

           <div class="mb-3">
                  <label for="capacity" class="form-label">Capacity, horsepower</label>
                <input type="number" class="form-control" value = {{$car->capacity}} id="capacity" 
                    name="capacity" disabled >
              
            </div>

            <div class="mb-3">
                <label for="yearissue" class="form-label">Year of issue</label>
              <input type="number" class="form-control" disabled value = {{$car->year_of_issue}} >
            
          </div>

          <div class="mb-3">
                  <label for="yearend" class="form-label">Year end</label>
                <input type="text" disabled class="form-control" value = {{$car->year_end}} > 
              
            </div>
    </form>

    <div class="container">
        <h3 class ="text-center">Gallery</h3>
           

        @guest
        @else
            @if(  Auth::user()->admin  == 1 )
                <a class = "button" href="{{ route( 'add-photo',$car->id)}}">Upload</a>
            @endif
        @endguest

        
        <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-">  
           @foreach($car->carPhoto as $photo)
                <div class="col">  
                    <div class="p-3 border bg-light">
                        <img src="/storage/gallery/{{$photo->car_photo}}"class="img-fluid">
                    </div>    
                </div>
            @endforeach
        </div>

    </div>

</div>
@endsection