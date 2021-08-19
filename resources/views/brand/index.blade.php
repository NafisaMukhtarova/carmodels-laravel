@extends('layouts.app')

@section('content')

<div class="container">
    @guest
    @else
        @if(  Auth::user()->admin  == 1 )
            <a class = "button" href="{{ route('add_brand') }}">Add brand</a>
        @endif
    @endguest

    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-">
        @foreach($brands as $brand)
        
            <div class="col">  
                <div class="p-3 border bg-light">
                    <a href="{{ route('car-brand',$brand->id ) }}" role="button">{{$brand->car_brand_name}}
                        <img src="storage/brandphotos/{{$brand->brand_photo}}"class="img-fluid">
                    </a>
                </div>    
            </div>
        @endforeach
    </div>
</div>

@endsection