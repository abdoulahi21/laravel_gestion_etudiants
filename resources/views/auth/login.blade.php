@extends('auth.boostrap')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Etudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-info">
<div style="padding-left:35%;padding-top:70px;">
<div class="card col-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="padding:24px;">
   <center><h3>Connexion</h3></center>
    <div class="card-body">
        <form action="{{route('auth.login')}}" method="post" class="vstack gap-3">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                @error("email")
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mot de Passe</label>
                <input type="password" class="form-control" id="password" name="password">
                @error("password")
                <span style="color: red;">{{$message}}</span>
                @enderror
            </div>
            <button class="btn btn-primary"  >Se connecter</button>
        </form>

    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

