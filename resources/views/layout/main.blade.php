<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
    <style>
        body {
            background-color: cadetblue;
            font-family: 'Roboto';
        }
    </style>
</head>
<body>
    <div class = "containter justify-content-center mt-5">
        <h1 class="text-center">Tebak Kata Futuristik</h1>
        <div class="d-flex justify-content-center mt-3">
            <input class="form-control" id="tebakan" style="width:30%;height:30%" type="text" placeholder="Masukkan sebuah kata">
            <button type="button" id="button" class="btn btn-primary mb-3 ms-2">Confirm identity</button>
        </div>
        <div class = "answers d-flex justify-content-center mt-3">
            <ul class="list-group" id="list_jawaban">
                <!-- <li class="list-group-item">A simple default list group item</li> -->
                @yield('konten')  
                <!-- <li class="list-group-item list-group-item-success mt-3">A simple success list group item</li>
                <li class="list-group-item list-group-item-danger mt-3">A simple danger list group item</li>
                <li class="list-group-item list-group-item-warning mt-3">A simple warning list group item</li> -->
            </ul> 
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@yield('javasc')
</html>