@php
    $background = $property->listing_type ?? false === 'Sale' ? 'green' : 'red';
@endphp
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
    <div class="property-item mb-30">
        <a href="/detail/{{$property->slug}}" class="img">
            <div
                class="status-tag" @style('background:'.$background)>
                FOR {{strtoupper($property->listing_type)}}
            </div>
            <img src="/storage/{{ $property->property_thumbnail[0] ?? 'images/img_1.jpg'}}" alt="Image"
                 class="img-fluid"/>
        </a>

        <div class="property-content">
            <div class="price mb-2"><span> &#8358; {{number_format($property->price, 3)}}</span></div>
            <div>
                <span class="d-block mb-2 text-black-50">{{$property->address}}</span>
                <span class="city d-block mb-3">{{$property->state, $property->city}}</span>

                <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                                            <span class="icon-bed me-2"></span>
                                            <span class="caption">{{$property->no_of_bedroom}} beds</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                                            <span class="icon-bath me-2"></span>
                                            <span class="caption">{{$property->no_of_bathroom}} baths</span>
                                        </span>
                </div>

                <a href="/detail/{{$property->slug}}" class="btn btn-primary py-2 px-3" wire:navigate>See details</a>
            </div>
        </div>
    </div>
    <!-- .item -->
</div>
