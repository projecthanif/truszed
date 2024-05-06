<div class="property-item">

    <a href="property-single.php" class="img">
        <div class="status-tag">FOR SELL</div>
        <img src="images/img_1.jpg" alt="Image" class="img-fluid" />
    </a>

    <div class="property-content">
        <div class="price mb-2"><span> &#8358;{{ number_format('1291000') }}</span></div>
        <div>
            <span class="d-block mb-2 text-black-50">
                {{ 'Here the address of the property' }}
            </span>
            <span class="city d-block mb-3">{{ 'Name of property' }}</span>

            <div class="specs d-flex mb-4">
                <span class="d-block d-flex align-items-center me-3">
                    <span class="icon-bed me-2"></span>
                    <span class="caption">{{ '3 room apartment' }}</span>
                </span>
                {{-- <span class="d-block d-flex align-items-center">
                    <span class="icon-bath me-2"></span>
                    <span class="caption">2 baths</span>
                </span> --}}
            </div>

            <a href="/detail/{{ 1 }}" class="btn btn-primary py-2 px-3" wire:navigate>See details</a>
        </div>
    </div>
</div>
<!-- .item -->
