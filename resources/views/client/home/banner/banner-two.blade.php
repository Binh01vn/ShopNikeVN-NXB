<!-- Begin Banner Area Two -->
<div class="banner-area banner-area-2">
    <div class="container">
        <div class="row">
            @foreach ($dataBN2 as $item)
                <div class="col-md-6">
                    <div class="banner-item img-hover_effect">
                        <div class="banner-img">
                            <a href="javascrip:void(0)">
                                <img class="img-full" src="{{ Storage::url($item->imgBanner) }}" alt="Banner">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner Area Two End Here -->
