<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
    <style>
        body {
            background-image: url("image/bg.jpg");
            background-size: contain;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
        }

        #judul {
            color: #1F2131;
            font-family: 'Montserrat', sans-serif;
            font-weight: 900 !important;
            text-shadow: 5px 3px 0px rgba(0, 0, 0, 1);
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: white !important;
        }

        #button {
            background-color: #1F2131 !important;
            color: #FFFFFF;
            border-radius: 50px !important;
        }

        #button:hover,
        #button:focus,
        #button:active {
            background-color: #FFFFFF !important;
            color: #1F2131 !important;
            border: 2px solid #1F2131 !important;
            transition: 790ms;
        }

        #list_jawaban {
            border-radius: 10px !important;
            min-width: 50vw;
        }

        .kuning {
            background: #EEBF6F;
        }

        .ijo {
            background: #3A8A6A;
        }

        .oren {
            background: #F88965;
        }

        .biru {
            background: #7482ed;
        }
    </style>
</head>

<body>
    <div class="containter justify-content-center mt-5">
        <h1 class="text-center" id="judul">CONTEXTO</h1>
        <div class="answers d-flex justify-content-center mt-3">
            <h1 class="me-5 p-2 kuning">tipen</h1>
            <h1 class="me-5 p-2 ijo">susin</h1>
            <h1 class="me-5 p-2 biru">tuny</h1>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <input class="form-control" id="tebakan" style="width:30%;height:30%" type="text" placeholder="Masukkan sebuah kata">
            <button type="button" id="button" class="btn btn-primary mb-3 ms-2">Confirm identity</button>
        </div>
        <div class="answers d-flex justify-content-center mt-3">
            <ul class="list-group" id="list_jawaban">
            </ul>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        base_url = "https://d9b5-34-145-179-89.ngrok-free.app";
        //load library
        $.ajax({
            method: "GET",
            url: "/word/budaya",
            // headers: {
            //     'ngrok-skip-browser-warning':'blablabla',
            // },
            success(response) {
                alert(response.message);
            },
            error(jqXHR, textStatus, errorThrown) {
                alert(jqXHR.responseJSON);
                console.log("error");
            }
        });

        $("#button").click(function() {
            var tebakan = $("#tebakan").val();
            if (tebakan == "") {
                console.log("jangan kosong kakak")
            } else {
                $("#tebakan").val("");
                var jawaban = '<li class="list-group-item list-group-item-success mt-3 oren">' + tebakan + '</li>'
                $("#list_jawaban").append(jawaban)
            }
        })
    })
</script>

</html>