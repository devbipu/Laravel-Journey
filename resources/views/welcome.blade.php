@extends('layout.app')


@section('body')
    <h4>Home page</h4>

    <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data"> 
        @csrf
        <pre>
            
        {!! print_r($errors->all()); !!}
        </pre>
        <div class="form_col">
            <label>Name</label>
            <input type="text" name="name" value="{{old('name')}}">
        </div>
        <div class="form_col">
            <label>Email</label>
            <input type="text" name="email" value="{{old('email')}}">
        </div>
        <div class="form_col">
            <label>Password</label>
            <input type="password" name="password" >
        </div>
        <div class="form_col">
            <label>Confirm Password</label>
            <input type="text" name="confirm_password">
        </div>
        <div class="form_col">
            <label>Photo</label>
            <input type="file" name="photo">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </div>
@endsection


