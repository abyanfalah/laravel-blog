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

    {{-- jQuery & Bootstrap JS --}}
    <script src="/assets/jquery/jquery.min.js"></script>
    <script src="/assets/bootstrap/bootstrap.min.js"></script>

    {{-- Sidebar css & js --}}
    <link rel="stylesheet" href="/assets/bootstrap/sidebars.css">
    <script src="/assets/bootstrap/sidebars.js"></script>

    {{-- Datatables  --}}
    <link rel="stylesheet" href="/assets/datatables/dataTables.bootstrap4.min.css">
    <script src="/assets/datatables/dataTables.bootstrap4.min.js"></script>

    {{-- Trix --}}
    <link rel="stylesheet" href="/assets/trix/trix.css">
    <script src="/assets/trix/trix.js"></script>

    {{-- slugify.js --}}
    <script src="/assets/slugify.js"></script>

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

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        trix-toolbar [data-trix-button-group=file-tools]{
            display: none;
        }
    </style>

</head>
<body class="bg-light">

