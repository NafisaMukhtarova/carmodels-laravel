@extends('layouts.app')

@section('content')

<h1>Add photo</h1>

<form action="{{ route('photo-submit') }}" method="POST" enctype ="multipart/form-data">
        
        @csrf

        <input type="hidden" id="car_id" name="car_id" value = {{$car_id}}> 
            
        <div class="mb-3">
            <label for="image" class="form-label">Photo</label>
            <input type="file" name = "image" id ="image">
        </div>
        
        <button type="submit" class="btn btn-primary"> Добавить</button>

</form>


@endsection;