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

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">

    <link rel="shortcut icon" href="{{ asset('img/logo-pocket.svg') }}" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <style>
        body {
            height: 100vh;
            background-image: url("{{ asset('img/foggy-mountainous-scenery-gloomy-sky.jpg') }}"), linear-gradient(rgba(255, 0, 0, 0.5), rgba(0, 0, 255, 0.5));
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: multiply;
            background-attachment: fixed;
        }

        .transparent-bg,
        .transparent-bg input:not(.form-check-input),
        .transparent-bg .input-group-text,
        .transparent-bg input:focus:not(.form-check-input) {
            /* text-align: center; */
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .transparent-bg h2 {
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .transparent-bg button {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

@yield('container-auth')

</body>

</html>