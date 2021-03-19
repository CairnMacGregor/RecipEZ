<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="https://kit.fontawesome.com/faea18554b.js" crossorigin="anonymous"></script>
    <title>RecipEZ</title>
</head>
<body>
    <nav class = "navBar">
        <ul class = "navLeft navMenu">
            <li class ="nav-link"><a href="{{route('home')}}"><i class="fas fa-home"></i> Home</a></li>
            <li class ="nav-link"><a href="{{route('dashboard')}}"><i class="fas fa-clipboard-list"></i> Favourites</a></li>
            <li class ="nav-link"><a href="{{route('recipes')}}"><i class="fas fa-utensils"></i> Recipes</a></li> 
        </ul>

        <ul class ="navRight navMenu">
           @auth
            <li class ="nav-link"> <a href=""></a><i class="fas fa-user"></i>  {{auth()->user()->name}}</li>
            <form action="{{route('logout')}}" method ="post" >
                @csrf
                <button class ="nav-link nav-button" type = "submit"> <i class="fas fa-sign-out-alt"></i>Logout</button></form>
            @endauth
            @guest
            <li class ="nav-link"> <a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li class ="nav-link"><a href="{{route('register')}}">Register</a></li>
            @endguest
           
           
           
        </ul>

    </nav>
    @yield('content')

    <!-- Site footer -->
    <footer class="footer">
        <div class="footer-container">
          <div class="row">
            <div class="footer-col">
              <h4>RecipEZ</h4>
              <p>
                Recipes for you, from the community
              </p>
            </div>
  
            <div class="footer-col">
              <h4>Site Map</h4>
              <ul>
                <li>
                  <a href=""><span class="hover">Home</span></a>
                </li>
                <li>
                  <a href=""><span class="hover">Favourites</span></a>
                </li>
                <li>
                  <a href=""
                    ><span class="hover">Recipes</span></a
                  >
                </li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Contact</h4>
              <p>
                Have some ideas? Want to get involved? Get in touch!
              </p>
              <p class = "notice"><a href="https://www.cairnmacgregor.com">Contact me!</a></p>
              
            </div>
  
            <div class="footer-col">
              <h4>Notice</h4>
              
              <div class="notice">
                <p>
                  Copyright &copy; 2021 All Rights Reserved by
                  <a href="#">RecipEZ</a>.
                </p>
                <p>
                  Developed by
                  <a target="_blank" href="https://www.cairnmacgregor.com/"
                    >Cairn MacGregor</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
</body>
</html>