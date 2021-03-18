@extends('layouts.app')

@section('content')
    <div>
        @if (session('status'))
            {{session('status')}}
        @endif
    <form action="{{ route('login')}}" method ="post">
        @csrf
        
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
        <div>
            <input type="checkbox" name ="remember" id ="remember">
            <label for="remember">Remember me</label>
        </div>
    </div>
        <div>
            <button type = "submit" >Login</button>

        </div>
    </form>
    </div>
@endsection