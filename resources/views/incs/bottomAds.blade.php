<div class="row shop-categories mt-5">
  @if (bottomLeftAds())
  <div class="col-lg-7">
    <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md" data-pagi="false" data-items-xs="1"
      data-items-sm="1" data-items-md="1" data-items-lg="1">
      <div class="oc-item">
        <div class="entry">
          <div class="entry-image">
            <div class="fslider" data-arrows="false" data-lightbox="gallery">
              <div class="flexslider">
                <div class="slider-wrap">
                  @foreach (bottomLeftAds() as $bottomLeft)
                  <div class="slide">
                    <a href="{{ $bottomLeft->link }}" >
                      <img src="{{ url('storage/app/public/imgs/ads/'.$bottomLeft->photo) }}"
                        alt="{{ $bottomLeft->photo }}"></a>
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


  @if (bottomRightsAds())
  <div class="col-lg-5">
    <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md" data-pagi="false" data-items-xs="1"
      data-items-sm="1" data-items-md="1" data-items-lg="1">
      <div class="oc-item">
        <div class="entry">
          <div class="entry-image">
            <div class="fslider" data-arrows="false" data-lightbox="gallery">
              <div class="flexslider">
                <div class="slider-wrap">
                  @foreach (bottomRightsAds() as $bottomRight)
                  <div class="slide">
                    <a href="{{ $bottomRight->link }}">
                      <img src="{{ url('storage/app/public/imgs/ads/'.$bottomRight->photo) }}"
                        alt="{{ $bottomRight->photo }}"></a>
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