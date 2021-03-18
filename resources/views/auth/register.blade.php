@extends('layouts.app')

@section('content')
    <div>
    <form action="{{ route('register')}}" method ="post">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type = "text" name = "name" id = "name" placeholder="Name"value ="{{old('name')}}">

            @error('name')
            <div>{{$message}}</div>
            @enderror
        </div>
    
        <div>
            <label for="username">Username</label>
            <input type = "text" name = "username" id = "username" placeholder="Username" value ="{{old('username')}}">
            @error('username')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="email">Email</label>
            <input type = "email" name = "email" id = "email" placeholder="Email" value ="{{old('email')}}">
            @error('email')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type = "password" name = "password" id = "password" placeholder="Password" value ="{{old('password')}}">
            @error('password')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="password_confirmation">Password Again</label>
            <input type = "password" name = "password_confirmation" id = "password_confirmation" placeholder="Enter Password" value ="{{old('password_confirmation')}}">
            @error('password_confirmation')
            <div>{{$message}}</div>
            @enderror
        </div>
    
        <div>
            <button type = "submit" >Register</button>

        </div>
    </form>
    </div>
@endsection