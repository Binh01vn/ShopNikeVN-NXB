<!-- Begin Banner Area -->
<div class="banner-area">
    <div class="container">
        <div class="row">
            @foreach ($dataBN3 as $item)
                <div class="col-md-4 col-6 custom-xxs-col">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img src="{{ Storage::url($item->imgBanner) }}" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner Area End Here -->
