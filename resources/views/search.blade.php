<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="truszed"/>
    <link rel="shortcut icon" href="faviconuse.jpg"/>

    <meta name="description"
          content="Discover your dream home with our comprehensive real estate listings. From cozy condos to luxurious estates, find the perfect property tailored to your lifestyle. Start your search today!"
    " />
    <meta name=" keywords"
          content="home, realtor, house for sell, mls, house for rent, homes for sell, mls listing, real estate agent"/>

    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
          rel="stylesheet"/>

    <link rel="stylesheet" href="fonts/icomoon/style.css"/>
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css"/>

    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

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

<div>
    <div class="hero page-inner overlay" style="background-image: url('images/hero_bg_1.jpg')">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Properties</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Properties
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-properties" @style('margin-top:40px')>
        <div class="container">
            <div class="row">
                @if(count($properties) > 0)
                    @foreach ($properties as $property)
                        @include('components.layouts.allpropertycard')
                    @endforeach
                @else
                    <div @style('display:flex;justify-content:center;font-size:20px;font-style:italic;font-weight:bold')>
                        {{'Record not found'}}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('components.layouts.footer')

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/aos.js"></script>
<script src="js/navbar.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
