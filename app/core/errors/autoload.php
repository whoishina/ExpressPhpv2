<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet">
    <style>
        *{
            font-family : "Roboto",
            font-weight : 100
        }
    </style>
    <title>Http Server Error !!</title>
  </head>
  <body>
        <div class="container">
        <div class="p-5 m-5 text-center">
            <h2 class="mx-auto py-5">
                <b>Http Server Error </b>
            </h2>
            <div class="text-left">
                <p><b>File Directory : </b>/public/template/http.php</p>
                <p><b>Error : </b> File not found !</p>

                <p><b>Root Directory : </b><?= $_SERVER['DOCUMENT_ROOT'] ?></p>
                <p><b>Request URI : </b><?= ($_SERVER['PATH_INFO']) ?? '/' ?></p>
            </div>
        </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>
