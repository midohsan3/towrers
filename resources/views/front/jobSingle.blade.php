@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('general.Jobs')}}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')

<section class="page-title bg-transparent">
  <div class="container">
    <div class="page-title-row">

      <div class="page-title-content">
        <h1><img src="{{ url('imgs/logo.png') }}" width="150" class="rounded-circle" />
          {{ __('general.Jobs') }}
        </h1>
      </div>

      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>

          <li class="breadcrumb-item"><a href="{{ route('front.jobs') }}"><strong
                style="font-size: 1.5em; color: blue;">{{ __('front.Jobs') }}</strong></a></li>

          <li class="breadcrumb-item"><a href="{{ route('front.jobs.category',$job->job_category_id) }}">
              <strong style="font-size: 1.5em; color: blue;">
                @if (App::getLocale()=='ar')
                {{ $job->categoryJob->name_ar }}
                @else
                {{ $job->categoryJob->name_en }}
                @endif
              </strong>
            </a></li>

          <li class="breadcrumb-item active" aria-current="page">
            <strong style="font-size: 1.5em; color: blue;">
              @if (App::getLocale()=='ar')
              {{ $job->name_ar }}
              @else
              {{ $job->name_ar }}
              @endif
            </strong>
          </li>
        </ol>
      </nav>

    </div>
  </div>
</section>

<section id="content">
  <div class="content-wrap">
    <div class="container">

      <div class="row col-mb-50">
        <div class="col-md-7">
          <div class="fancy-title title-bottom-border">
            <h3>
              @if (App::getLocale()=='ar')
              {{ $job->name_ar }}
              @else
              {{ $job->name_en}}
              @endif
            </h3>
            <br />

          </div>

          <h5>
            @if ($job->user_id !== null)
            @if (App::getLocale()=='ar')
            {{ $job->userJob->companyUser->name_ar }}
            @else
            {{ $job->userJob->companyUser->name_en }}
            @endif
            @else
            {{ __('general.System') }}
            @endif

            @if ($job->city_id !== null)
            <span>,</span>
            @if (App::getLocale()=='ar')
            {{ $job->cityJob->name_ar }}
            @else
            {{ $job->cityJob->name_en }}
            @endif
            @endif

          </h5>
          <p class="text-wrap">
            @if (App::getLocale()=='ar')
            {{ $job->description_ar }}
            @else
            {{ $job->description_ar }}
            @endif
          </p>
          @if ($job->photo !== null)
          <img src="{{ url('storage/app/public/imgs/jobs/'.$job->photo) }}" width="100%" />
          @endif

          <div class="accordion accordion-bg">

            <div class="accordion-header">
              <div class="accordion-icon">
                <i class="accordion-closed bi-check-circle-fill"></i>
                <i class="accordion-open bi-x-circle-fill"></i>
              </div>
              <div class="accordion-title">
                {{ __('front.Phone') }}
              </div>
            </div>
            <div class="accordion-content">
              {{ $job->phone }}

            </div>

            <div class="accordion-header">
              <div class="accordion-icon">
                <i class="accordion-closed bi-check-circle-fill"></i>
                <i class="accordion-open bi-x-circle-fill"></i>
              </div>
              <div class="accordion-title">
                {{ __('front.WhatsApp') }}
              </div>
            </div>
            <div class="accordion-content">
              {{ $job->whatsapp }}
            </div>

            <div class="accordion-header">
              <div class="accordion-icon">
                <i class="accordion-closed bi-check-circle-fill"></i>
                <i class="accordion-open bi-x-circle-fill"></i>
              </div>
              <div class="accordion-title">
                {{__('front.Email')}}
              </div>
            </div>
            <div class="accordion-content">
              {{ $job->email }}
            </div>

          </div>

          <a href="#" data-scrollto="#job-apply" class="button button-3d button-black m-0">Apply Now</a>


        </div>

        <div class="col-md-5">
          <div id="job-apply" class="heading-block highlight-me">
            <h2>Apply Now</h2>
            <span>And well get back to you within 48 hours.</span>
          </div>

          <div class="form-widget">
            <div class="form-result"></div>

            <form action="====" class="row mb-0" method="POST">

              <div class="form-process">
                <div class="css3-spinner">
                  <div class="css3-spinner-scaler"></div>
                </div>
              </div>

              <div class="col-md-6 form-group">
                <label for="template-jobform-fname">First Name <small>*</small></label>
                <input type="text" id="template-jobform-fname" name="template-jobform-fname" value=""
                  class="form-control required">
              </div>

              <div class="col-md-6 form-group">
                <label for="template-jobform-lname">Last Name <small>*</small></label>
                <input type="text" id="template-jobform-lname" name="template-jobform-lname" value=""
                  class="form-control required">
              </div>

              <div class="w-100"></div>

              <div class="col-12 form-group">
                <label for="template-jobform-email">Email <small>*</small></label>
                <input type="email" id="template-jobform-email" name="template-jobform-email" value=""
                  class="required email form-control">
              </div>

              <div class="col-md-6 form-group">
                <label for="template-jobform-age">Age <small>*</small></label>
                <input type="text" name="template-jobform-age" id="template-jobform-age" value="" size="22" tabindex="4"
                  class="form-control required">
              </div>

              <div class="col-md-6 form-group">
                <label for="template-jobform-city">City <small>*</small></label>
                <input type="text" name="template-jobform-city" id="template-jobform-city" value="" size="22"
                  tabindex="5" class="form-control required">
              </div>

              <div class="w-100"></div>

              <div class="col-12 form-group">
                <label for="template-jobform-service">Position <small>*</small></label>
                <select name="template-jobform-position" id="template-jobform-position" tabindex="9"
                  class="form-select required">
                  <option value="">-- Select Position --</option>
                  <option value="Senior Python Developer">Senior Python Developer</option>
                  <option value="Design Analyst">Design Analyst</option>
                  <option value="Head of UX and Design">Head of UX and Design</option>
                  <option value="Web &amp; Visual Designer (Marketing)">Web &amp; Visual Designer (Marketing)</option>
                </select>
              </div>

              <div class="col-md-6 form-group">
                <label for="template-jobform-salary">Expected Salary</label>
                <input type="text" name="template-jobform-salary" id="template-jobform-salary" value="" size="22"
                  tabindex="6" class="form-control">
              </div>

              <div class="col-md-6 form-group">
                <label for="template-jobform-time">Start Date</label>
                <input type="text" name="template-jobform-start" id="template-jobform-start" value="" size="22"
                  tabindex="7" class="form-control">
              </div>

              <div class="w-100"></div>

              <div class="col-12 form-group">
                <label for="template-jobform-website">Website (if any)</label>
                <input type="text" name="template-jobform-website" id="template-jobform-website" value="" size="22"
                  tabindex="8" class="form-control">
              </div>

              <div class="col-12 form-group">
                <label for="template-jobform-experience">Experience (optional)</label>
                <textarea name="template-jobform-experience" id="template-jobform-experience" rows="3" tabindex="10"
                  class="form-control"></textarea>
              </div>

              <div class="col-12 form-group">
                <label for="template-jobform-application">Application <small>*</small></label>
                <textarea name="template-jobform-application" id="template-jobform-application" rows="6" tabindex="11"
                  class="form-control required"></textarea>
              </div>

              <div class="col-12 form-group d-none">
                <input type="text" id="template-jobform-botcheck" name="template-jobform-botcheck" value=""
                  class="form-control">
              </div>

              <div class="col-12 form-group">
                <button class="button button-3d button-large w-100 m-0" name="template-jobform-apply" type="submit"
                  value="apply">Send Application</button>
              </div>

              <input type="hidden" name="prefix" value="template-jobform-">

            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
{{-- 
  ======================
  =PAGE SCRIPTS
  ======================
  --}}
@section('page-scripts')

@endsection