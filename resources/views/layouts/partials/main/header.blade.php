<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Str::ucfirst($title ?? "Blog") }}</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="/assets/bootstrap/bootstrap.min.css">

    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="/assets/bootstrap/icons/bootstrap-icons.css">

    {{-- popper.js --}}
    {{-- <script src="/assets/bootstrap/bootstrap.min.js"></script> --}}

    {{-- jQuery & Bootstrap JS --}}
    <script src="/assets/jquery/jquery.min.js"></script>
    <script src="/assets/bootstrap/bootstrap.min.js"></script>

    <style>
        a{
            text-decoration: none;
            color : black;
        }

        a:hover{
            color: #dc3545;
        }

        img{
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-light">

