<div>
    <div class="hero page-inner overlay" @style("background-image: url('images/hero_bg_3.jpg')")>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">DETAILS ABOUT PROPERTY</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <center>
        <h1 @style('color:black; font-weight:bold; ')>FULL PROPERTY DETAILS</h1>
    </center>
    <!-- details images -->
    <!-- Gallery -->
    <div class="row">
        @php
                $images = $property->property_thumbnail;
        @endphp
        @if(is_array($images))
            @foreach($images as $image)
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="/storage/agents/{{ asset($image) }}" class="w-100 shadow-1-strong rounded mb-4"
                         alt="Boat on Calm Water"/>
                </div>
            @endforeach
        @else
            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <img src="{{ asset('images/img_5.jpg') }}" class="w-100 shadow-1-strong rounded mb-4"
                     alt="Boat on Calm Water"/>

                <img src="{{ asset('images/img_6.jpg') }}" class="w-100 shadow-1-strong rounded mb-4"
                     alt="Wintry Mountain Landscape"/>
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset('images/img_7.jpg') }}" class="w-100 shadow-1-strong rounded mb-4"
                     alt="Mountains in the Clouds"/>

                <img src="{{ asset('images/img_8.jpg') }}" class="w-100 shadow-1-strong rounded mb-4"
                     alt="Boat on Calm Water"/>
            </div>

            <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="{{ asset('images/img_5.jpg') }}" class="w-100 shadow-1-strong rounded mb-4"
                     alt="Waves at Sea"/>

                <img src="{{ asset('images/img_5.jpg') }}" class="w-100 shadow-1-strong rounded mb-4"
                     alt="Yosemite National Park"/>
            </div>
        @endif

    </div>

    <!-- Gallery -->


    <center>


        <div class="property-item">

            <div class="property-content">
                <div class="price mb-2"><span> &#8358; {{number_format($property->price, 3)}}</span></div>
                <div>
                    <span class="d-block mb-2 text-black-50">{{$property->description}}</span>
                    <span class="icon-bath me-2"></span>
                    <span class="caption">{{$property->no_of_bedroom}} bed apartment</span>
                    <span class="icon-trello me-2"></span>
                    <span class="caption">Toilet: {{$property->no_of_bathroom}}</span>
                    <br>
                    <span class="icon-map-pin me-2"></span>
                    <span class="caption">land size(sqm): {{$property->square_footing}}</span>
                    <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3"> </span>
                    </div>

                    <a href="http://wa.me/8039811738" class="btn btn-primary py-2 px-3" @style('border-radius:2px;')>
                        contact agent
                    </a>
                    <a href="http://wa.me/8039811738" class="btn btn-primary py-2 px-3" @style('border-radius:2px;')>
                        Pay Now
                    </a>
                    <br> <br>
                    <a href="http://wa.me/8039811738" class="btn btn-primary py-2 px-3" @style('border-radius:2px;')>
                        Request a private showing
                    </a>
                </div>
            </div>
        </div>
    </center>
    <br>
    <br>
    <center>
        <ul class="social list-unstyled list-inline dark-hover">
            <li class="list-inline-item">
                <a href="#"><span class="icon-twitter"></span></a>
            </li>
            <li class="list-inline-item">
                <a href="#"><span class="icon-facebook"></span></a>
            </li>
            <li class="list-inline-item">
                <a href="#"><span class="icon-linkedin"></span></a>
            </li>
            <li class="list-inline-item">
                <a href="#"><span class="icon-instagram"></span></a>
            </li>
        </ul>
    </center>
</div>
