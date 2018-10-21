<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.Laravel = {csrfToken:'{{csrf_token()}}'}</script>
    
    <title>Phone Book</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    
</head>
<body>
        
    <div id="app">
        <div class="container">
        <myheader></myheader>

        <router-view></router-view>
          

        <myfooter></myfooter>
        </div>
        
      
    </div>
   

         

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>