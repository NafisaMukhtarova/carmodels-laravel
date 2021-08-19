@extends('layouts.app')

@section('content')

<h1>Add brand</h1>

<form action="{{ route('brand_submit') }}" method="POST" enctype ="multipart/form-data">
        
        @csrf
            <div class="mb-3">
                 <label for="car_brand_name" class="form-label">Name</label>
                <input type="text" class="form-control" inactive id="car_brand_name" name="car_brand_name" required >
            </div>
                
             <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                 <input type="file" name = "image" id ="image">
             </div>
        
        <button type="submit" class="btn btn-primary" > Добавить</button>
    </form>


@endsection;