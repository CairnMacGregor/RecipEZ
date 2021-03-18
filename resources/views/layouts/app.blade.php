<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecipEZ</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('recipes')}}">Recipes</a></li> 
        </ul>

        <ul>
           @auth
            <li> <a href=""></a>{{auth()->user()->name}}</li>
            <form action="{{route('logout')}}" method ="post">
                @csrf
                <button type = "submit">Logout</button></form>
            @endauth
            @guest
            <li> <a href="{{route('login')}}">Login</a></li>
            <li><a href="{{route('register')}}">Register</a></li>
            @endguest
           
           
           
        </ul>

    </nav>
    @yield('content')
</body>
</html>