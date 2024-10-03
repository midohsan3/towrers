<div class="row shop-categories">
  @if (topLeftAds())
  <div class="col-lg-7">
    <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md" data-pagi="false" data-items-xs="1"
      data-items-sm="1" data-items-md="1" data-items-lg="1">
      <div class="oc-item">
        <div class="entry">
          <div class="entry-image">
            <div class="fslider" data-arrows="false" data-lightbox="gallery">
              <div class="flexslider">
                <div class="slider-wrap">
                  @foreach (topLeftAds() as $topLeft)
                  <div class="slide">
                    <a href="{{ $topLeft->link }}" >
                      <img src="{{ url('storage/app/public/imgs/ads/'.$topLeft->photo) }}"
                        alt="{{ $topLeft->photo }}"></a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  @endif


  @if (topRightsAds())
  <div class="col-lg-5">
    <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md" data-pagi="false" data-items-xs="1"
      data-items-sm="1" data-items-md="1" data-items-lg="1">
      <div class="oc-item">
        <div class="entry">
          <div class="entry-image">
            <div class="fslider" data-arrows="false" >
              <div class="flexslider">
                <div class="slider-wrap">
                  @foreach (topRightsAds() as $topRight)
                  <div class="slide">
                    <a href="{{ $topLeft->link }}" data-lightbox="gallery-item">
                      <img src="{{ url('storage/app/public/imgs/ads/'.$topRight->photo) }}"
                        alt="{{ $topRight->photo }}"></a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  @endif
</div>