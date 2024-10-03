@if (mainSliders()->count()>0)

<div class="section m-0 p-0">
  <div class="container">
    <div class="row backInUp animated">
      <div class="col-12">
        <div class="row align-items-stretch align-items-center">
          <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget posts-md" data-pagi="false"
            data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">
            <div class="oc-item">
              <div class="entry">
                <div class="entry-image">
                  <div class="fslider" data-arrows="false" data-lightbox="gallery">
                    <div class="flexslider">
                      <div class="slider-wrap">
                        @foreach (mainSliders() as $mSlider)
                        <div class="slide">
                          <a href="{{ $mSlider->link}}" >
                            <img class="w-100" src="{{ url('storage/app/public/imgs/sliders/'.$mSlider->photo) }}"
                              alt="{{ $mSlider->photo }}"></a>
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
      </div>
    </div>
  </div>
</div>
@endif

{{-- #Slider End --}}
@if (newsBar()->count()>0)
<section class=" py-2" style="background-color:#2f638b;">
  <div class="container" @if (App::getLocale()=='ar' ) dir="ltr">
    @else
    dir="rtl">
    @endif

    <marquee class="col-12" @if (App::getLocale()=='ar' ) direction="right" @else direction="left" @endif
      onmouseover="this.stop();" onmouseout="this.start();">
      @foreach (newsBar() as $news)
      <strong class="text-white"><span class="mx-2"> </span>
        @if (!empty($news->link))
        <a href="{{ $news->link }}" class="text-white" <span>
          @if (App::getLocale()=='ar')
          {{ $news->text_ar }}
          @else
          {{ $news->text_en }}
          @endif
          </span></a>
        @else
        <span>
          @if (App::getLocale()=='ar')
          {{ $news->text_ar }}
          @else
          {{ $news->text_en }}
          @endif
        </span>
        @endif
      </strong>
      @endforeach
    </marquee>
  </div>
  </div>
</section>
@endif