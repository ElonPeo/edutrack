<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400;500;600;700&family=Roboto:wght@100;400;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Playwrite+GB+S:ital@0;1&family=Playwrite+IT+Moderna:wght@100..400&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <style>
            .welcome-content{
                width: 100%;
                height: 700px;
            }



            .welcome-content img{
                width: 100%;
                height: 100%;
                object-fit: cover
            }
        </style>
    </head>
    <body>
        @include('components.navigationBar')
        <div class="welcome-content">
            <img src="{{ asset('..\assets\images\welcome\wel-content.jpg') }}" alt="Profile">
        </div>
    </body>

</html>
