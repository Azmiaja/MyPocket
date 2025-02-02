<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyPocket</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">

    <link rel="shortcut icon" href="{{ asset('img/logo-pocket.svg') }}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>

    <style>
        .transparent-bg,
        .transparent-bg input,
        .transparent-bg .input-group-text,
        .transparent-bg input:focus,
        .dt-search input,
        .dt-search input:focus,
        .dt-length select,
        .dt-paging-button .page-link:is(.first),
        .dt-paging-button .page-link:is(.previous),
        .dt-paging-button .page-link:is(.next),
        .dt-paging-button .page-link:is(.last) {
            /* text-align: center; */
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
        }

        .transparent-bg input,
        .transparent-bg .input-group-text,
        .transparent-bg input:focus,
        .dt-search input,
        .dt-search input:focus,
        .dt-length select,
        .dt-length select:focus {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .dt-paging-button {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .dt-length select option {
            color: black;
        }

        body {
            /* height: 100vh; */
            /* background: rgb(2, 0, 36); */
            /* background: linear-gradient(142deg, rgba(2, 0, 36, 1) 0%, rgba(121, 48, 9, 1) 35%, rgba(106, 0, 255, 1) 100%); */
            background-image: url("{{ asset('img/foggy-mountainous-scenery-gloomy-sky.jpg') }}"), linear-gradient(rgba(255, 0, 0, 0.5), rgba(0, 0, 255, 0.5));
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: multiply;
            background-attachment: fixed;
        }

        .table-glass {
            background: rgba(255, 255, 255, 0.1) !important;
            /* Tambahkan !important */
            backdrop-filter: blur(10px) !important;
            /* Tambahkan !important */
            border-radius: 5px !important;
            overflow: hidden;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2) !important; */
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .table-glass th,
        .table-glass td {
            padding: .5rem;
            color: white !important;
            border-color: rgba(255, 255, 255, 0.3) !important;
        }

        .table-glass tbody tr:hover {
            background: rgba(255, 255, 255, 0.2) !important;
        }

        .image-account,
        .image-account img {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            border: 1.5px solid rgba(255, 255, 255, 0.3);
        }

        .transparent-bg .dropdown-item-2 {
            display: block;
            width: 100%;
            font-weight: 400;
            text-align: center;
            text-decoration: none;
            white-space: nowrap;
            padding: .25rem 1rem .25rem 1rem;
            color: rgb(255, 255, 255);
            /* background: rgba(255, 255, 255, 0.2) !important; */
        }

        .transparent-bg .dropdown-item-2:hover,
        .transparent-bg .dropdown-item-2:active {
            /* color: rgb(255, 255, 255); */
            background: rgba(255, 255, 255, 0.2) !important;
        }

        .img-container img {
            margin: 1.5rem 2rem .6rem 2rem;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .img-container p {
            padding: .5rem;
            text-align: center;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.2) !important;
        }

        .nav-link.active,
        .nav-link:hover {
            font-weight: 500;
            transition: ease-in;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand sticky-top transparent-bg shadow mx-lg-0 mx-2">
        <div class="container">
            <a class="navbar-brand fw-bold link-light" href="{{ route('home') }}">MyPocket</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav me-lg-4 me-2">
                    <a class="nav-link link-light {{ Request::routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Pocket</a>
                    <a class="nav-link link-light" href="#">Report</a>
                </div>
                <div class="dropdown">
                    <a class="text-decoration-none image-account" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('img/logo-pocket.svg') }}" class="img-fluid object-fit-cover" alt="">
                    </a>
                    <ul class="transparent-bg dropdown-menu dropdown-menu-end shadow mt-2">
                        <li>
                            <h6 class="dropdown-header fw-bold text-center text-light">Account</h6>
                        </li>
                        <li>
                            <div class="img-container">
                                <img src="{{ asset('img/logo-pocket.svg') }}" class="img-fluid object-fit-cover"
                                    alt="">
                                <p>{{ auth()->user()->name }}</p>
                            </div>
                        </li>
                        <li><a class="dropdown-item-2" href="#">My Account</a></li>
                        <li><a class="dropdown-item-2" id="logout" href="javasript:void(0)">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
