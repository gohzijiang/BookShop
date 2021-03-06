<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BookShop</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app2.css') }}" rel="stylesheet">

</head>
<div class="page-wrapper">
    
</div>

    <body>
        <div id="app" class="sticky">
           
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>

<footer class="footer">
      <div class="footer-content">
      <br>
          <h3>Green & River Book Shop</h3>
          <p>Every book is a soul printed in black words on white paper, as long as my eyes, my knowledge touch it, it comes alive.</p>
          <p>Email  :goh09282000@gmail.com</p>
          <ul class="socials">
              <li>   <a href="https://www.facebook.com/%E7%BB%BF%E6%B2%B3%E4%B9%A6%E7%B1%8D-100969648996154"><i  class="fa fa-facebook"></i></a></li>
              <li>   <a href="https://twitter.com/GreenRi05699013"><i  class="fa fa-twitter"></i></a></li>
              <li>   <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=GTvVlcSBpgPgNjKQmkbpCGCqVLGSLgppxchZlPpNfkMWKxgQbZFlRXTdmZwlmSZQNHmjLqVxRSmZC"><i  class="fa fa-google-plus" ></i></a></li>
              <li>   <a href="https://www.youtube.com/watch?v=kul-g_30HuU&t=10s"><i  class="fa fa-youtube"></i></a></li>
             
        </ul>
        
       
      </div>
      <div class="footer-bottom">
            &copy;Green & RiverBookShop | Designed by ShuLing and Zi Jiang
      </div>

</footer>   
</html>
