<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .active {
            color: red;
        }
    </style>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</head>
<body>
<a href="/lesson6" class="asdasd<?= !isset($_GET['page']) ? ' active' : ''; ?>">Index</a>
<a href="/lesson6?page=articles" class="asdasd<?= $_GET['page'] == 'articles' ? ' active' : ''; ?>">Articles</a>
<a href="/lesson6?page=register" class="asdasd<?= $_GET['page'] == 'register' ? ' active' : ''; ?>">Register</a>
<h3>Main menu goes in here</h3>