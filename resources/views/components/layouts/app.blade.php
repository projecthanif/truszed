<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="truszed" />
    <link rel="shortcut icon" href="faviconuse.jpg" />

    <meta name="description"
        content="Discover your dream home with our comprehensive real estate listings. From cozy condos to luxurious estates, find the perfect property tailored to your lifestyle. Start your search today!"" />
    <meta name=" keywords"
        content="home, realtor, house for sell, mls, house for rent, homes for sell, mls listing, real estate agent" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <title>
        {{ $title ?? '' }}
    </title>

    <style>
        .status-tag {
            position: absolute;
            top: -150px;
            /* Adjust as needed */
            right: 10px;
            /* Adjust as needed */
            background-color: red;
            color: white;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 2px;
        }
    </style>
</head>

<body>

    @include('components.layouts.navbar')

    {{ $slot }}

    @include('components.layouts.footer')

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
