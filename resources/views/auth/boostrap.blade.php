<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion Etudiant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://threejs.org/build/three.js"></script>
<style>
    .card{
        border:none;

        position:relative;
        overflow:hidden;
        border-radius:8px;
        cursor:pointer;
    }

    .card:before{

        content:"";
        position:absolute;
        left:0;
        top:0;
        width:4px;
        height:100%;
        background-color:gray;
        transform:scaleY(1);
        transition:all 0.5s;
        transform-origin: bottom
    }

    .card:after{

        content:"";
        position:absolute;
        left:0;
        top:0;
        width:4px;
        height:100%;
        background-color:darkturquoise;
        transform:scaleY(0);
        transition:all 0.5s;
        transform-origin: bottom
    }

    .card:hover::after{
        transform:scaleY(1);
    }
    </style>
</body>
</html>
@yield('design')
