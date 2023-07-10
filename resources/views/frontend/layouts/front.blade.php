<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" href="{{ asset('uploads/Logo.png') }}" type="image/png">

    <title>Laranews</title>
  </head>
  <style>
    body{
      background-color: aliceblue
    }
    footer {
      background-color: #343a40;
      color: #f8f9fa;
      padding: 20px 0;
    }
    .footer-link {
      color: #f8f9fa;
    }
  </style>
  <body>
    
   @include('frontend.includes.header');
        <div class="container">
            @yield('content')
        </div>
      <br><br><br><br>
   @include('frontend.includes.js');

   
  <footer class="bg-dark text-white text-center py-2">
    <div class="container d-flex justify-content-center align-items-center ">
        <p class="m-0">&copy; 2023 Laranews. All Rights Reserved. Created by Siti Nurkhodijah & Nandy Naufal</p>
    </div>
  </footer>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-XXXXX" crossorigin="anonymous"></script>
  </body>
</html>
