<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Annonce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

        <div class="col-md-12">
<img  class="img-fluid p-3" src="http://www.apn.dz/fr/images/footer-apn.png" >
        </div>
<hr>
<h3 class="text-center">{{ __($annonce->title) }}</h3>
<br>
<p class=" text-center">{{$annonce->contenu}}</p>

</body>
</html>
