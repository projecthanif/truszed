<div>
    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('images/hero_bg_3.jpg')"></div>
            <div class="img overlay" style="background-image: url('images/hero_bg_2.jpg')"></div>
            <div class="img overlay" style="background-image: url('images/hero_bg_1.jpg')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        Easiest way to find your dream home
                    </h1>
                    <form action="/search" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up"
                        data-aos-delay="200">
                        <input type="text" class="form-control px-4" name="search"
                            placeholder="search by state, location, price, or type" />
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">
                        Popular Properties
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p>
                        <a href="{{ route('properties') }}" target="_blank"
                            class="btn btn-primary text-white py-3 px-4">
                            View all properties
                        </a>
                    </p>
                </div>
{{--                {{dd($featuredProperties)}}--}}
                @if (!empty($featuredProperties))
                <div class="row">
                    <div class="col-12">
                        <div class="property-slider-wrap">
                            <div class="property-slider">
                                @foreach ($featuredProperties as $property)
                                    @include('components.layouts.propertycard')
                                @endforeach
                            </div>

                            <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                                <span class="prev" data-controls="prev" aria-controls="property"
                                    tabindex="-1">Prev</span>
                                <span class="next" data-controls="next" aria-controls="property"
                                    tabindex="+1">Next</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <section class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <span class="flaticon-house"></span>
                        <h3 class="mb-3">Our Properties</h3>
                        <p>We believe everyone should be able to rent a home without breaking the bank. Let us help you
                            find rentals that fit within your budget.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                        <span class="flaticon-building"></span>
                        <h3 class="mb-3">Property for Sale</h3>
                        <p>You're seeking a luxurious home with top-notch amenities, appliances, and services. We'll
                            find the perfect fit.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                        <span class="flaticon-house-3"></span>
                        <h3 class="mb-3">Real Estate Agent</h3>
                        <p>Seeking advice from industry experts is a savvy move when making property decisions. With
                            their guidance, you can ensure your choices are well-informed.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
                <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                        <span class="flaticon-house-1"></span>
                        <h3 class="mb-3">Best Prices</h3>
                        <p>Let's find you a comfortable home where the amenities, appliances, and services are all top
                            of the line.</p>
                        <p><a href="#" class="learn-more">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section section-4 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Let's find home that's perfect for you
                    </h2>
                    <p class="text-black-50">
                        Let's embark on a journey to discover the perfect home tailored just for you.
                        Together, we'll explore options, consider your preferences,
                        and find the ideal house that meets your every need and desire.
                    </p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-home2"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Nice Properties</h3>
                            <p class="text-black-50">
                                Rest assured, the finest properties will be presented to you.
                                Each one meticulously selected to meet the highest standards of luxury,
                                comfort, and functionality.
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-person"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Top Rated Agents</h3>
                            <p class="text-black-50">
                                You'll have access to top-tier agents renowned for their expertise, professionalism,
                                and dedication to finding the perfect property for you
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3">
                            <span class="icon-security"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Legit Properties</h3>
                            <p class="text-black-50">

                                Rest assured, only legitimate properties will be considered in our search.
                                Each one thoroughly vetted to ensure compliance with legal regulations and standards
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-counter mt-5">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">3298</span></span>
                        <span class="caption text-black-50"># of Buy Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">2181</span></span>
                        <span class="caption text-black-50"># of Sell Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">9316</span></span>
                        <span class="caption text-black-50"># of All Properties</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="counter-wrap mb-5 mb-lg-0">
                        <span class="number"><span class="countup text-primary">7191</span></span>
                        <span class="caption text-black-50"># of Agents</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="row justify-content-center footer-cta" data-aos="fade-up">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="mb-4">Be a part of our growing real state agents</h2>
                <p>
                    <a href="{{ route('agent.index') }}" target="_blank"
                        class="btn btn-primary text-white py-3 px-4">Apply for Real
                        Estate agent</a>
                </p>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>
</div>
