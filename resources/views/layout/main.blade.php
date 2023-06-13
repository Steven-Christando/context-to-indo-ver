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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
        }

        #button:hover{
            background-color: #FFFFFF !important;
            color: #1F2131 !important;
            border: 1px solid #1F2131 !important;
            transition: 790ms;
        }

        #list_jawaban {
            border-radius: 10px !important;
            min-width: 100%;
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
    <div class="containter justify-content-center mt-5 mx-3">
        <h1 class="text-center" id="judul">KONTEKS</h1>
        <div class="answers d-flex justify-content-center mt-3">
            <h1 class="mx-4 p-2 kuning">tipen</h1>
            <h1 class="mx-4 p-2 ijo">susin</h1>
            <h1 class="mx-4 p-2 biru">tuny</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="d-flex justify-content-center mt-3">
                    <input class="form-control rounded-pill" id="tebakan" type="text" placeholder="Masukkan sebuah kata">
                    <button type="button" id="button" class="btn btn-primary rounded-pill ms-2">HINT</button>
                </div>
                <div class="answers d-flex justify-content-center my-3">
                    <ul class="list-group" id="list_jawaban">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        first = true;

        $("#button").click(function() {
            //show hint
            $.ajax({
                method: "GET",
                url: "/hint/25",
                success(response) {
                    rank = response.data.rank;
                    rand = Math.floor((Math.random() * 15) + 10)
                    hint = rank[rand][0];

                    tebak(hint);

                    console.log("tebak");
                },
                error(jqXHR, textStatus, errorThrown) {
                    alert_error(jqXHR.responseJSON.message);
                    console.log("error");
                }
            });
        });

        $('#tebakan').keypress(function (e) {
            var key = e.which;
            if(key == 13)  // the enter key code
            {
                var tebakan = $("#tebakan").val();
                if (tebakan == "") {
                    console.log("jangan kosong kakak")
                } else {
                    $("#tebakan").val("");
                    tebak(tebakan);
                }
            }
        });  

    });

    function alert_error(msg){
        let timerInterval
        Swal.fire({
            icon: 'error',
            title: msg,
            timer: 1500,
            timerProgressBar: true,
        });
    }
    
    function alert_warning(msg){
        let timerInterval
        Swal.fire({
            icon: 'warning',
            title: msg,
            timer: 2000,
            timerProgressBar: true,
        });
    }

    function tebak(word){
        $.ajax({
            method: "GET",
            url: "/word/"+word,
            success(response) {
                //cari ranknya
                $.ajax({
                    method: "GET",
                    url: "/rank/"+word,
                    success(response) {
                        rank = response.data.rank;
                        
                        insertTebakan(word, rank);

                        console.log("tebak");
                    },
                    error(jqXHR, textStatus, errorThrown) {
                        alert_error(jqXHR.responseJSON.message);
                        console.log("error");
                    }
                });

            },
            error(jqXHR, textStatus, errorThrown) {
                alert_error(jqXHR.responseJSON.message);
                console.log("error");
            }
        });
    }

    function insertTebakan(word, rank){
        insert = false;
        var jawaban = '<li class="list-group-item list-group-item-success rounded-pill mt-3 oren border-3 border-black animate__animated animate__backInLeft">' + word + '<span class="float-end rank">' + rank + '</span> </li>'

        if(!first){
            //loop for search right position
            $(".rank").each(function(i, obj){
                currRank = parseInt($(this).text());
                if(rank < currRank){
                    console.log("loop");
                    remove_border();
                    $(jawaban).insertBefore($(this).parent());

                    insert = true;
                    return false;

                }else if (rank == currRank){    //ranknya sama == katanya sama
                    alert_warning(word + " sudah ada");
                    insert = true;
                    return false;
                }
            });
        }
        
        //last rank
        if(first || !insert){
            console.log("last");
            remove_border();
            $("#list_jawaban").append(jawaban);
        }
        first = false;

        if(rank == 1){
            win();
        }
    }

    function remove_border(){
        $(".border-3").removeClass("border-3");
        $(".border-black").removeClass("border-black");
    }

    function win(){
        Swal.fire({
            title: 'Kamu berhasil!',
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Random Kata Lagi'
        }).then((result) => {
            if (result.isConfirmed) {
                //regenerate
                $.ajax({
                    method: "GET",
                    url: "/regenerate",
                    success(response) {
                        console.log("regenerate");
                        $("#list_jawaban").html("");

                        alert_warning("Berhasil Merandom Kata");
                    },
                    error(jqXHR, textStatus, errorThrown) {
                        alert_error(jqXHR.responseJSON.message);
                        console.log("error");
                    }
                });
            }
        })
    }
</script>

</html>