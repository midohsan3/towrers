@extends('layouts.admin')

{{--
=====================
=TITLE
=====================
--}}
@section('title')
{{ __('general.Interests') }}
@endsection
{{--
=====================
=PAGE CONTENT
=====================
--}}
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">

                            <h3 class="nk-block-title page-title">{{ __('general.My-Interests') }}/ <strong
                                    class="text-primary small">
                                    {{ __('general.Choose Your Interests') }}
                                </strong>
                            </h3>

                        </div>

                    </div>
                </div>
                {{-- .nk-block-head --}}

                <div class="nk-block">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <div class="preview-block">
                                <span class="preview-title-lg overline-title">{{ __('general.Main Information')
                                    }}</span>
                                <form action="{{ route('c-company.interest.update') }}" method="POST">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input hidden class="form-control" id="user" name="user"
                                                        value="{{ Auth::user()->id }}" readonly />
                                                    @error('user')
                                                    <span class="bg-danger text-white" role="alert">{{ $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row gy-4">
                                        @if ($interests->count()>0)
                                        @foreach ($interests as $interest)
                                        @if (array_key_exists($interest->id,$userInterests))
                                        <div class="col-md-3 custom-control custom-checkbox mb-1">
                                            <input type="checkbox" checked class="custom-control-input"
                                                id="interest{{ $interest->id }}" name="interest[]"
                                                value="{{ $interest->id }}">
                                            <label class="custom-control-label text-capitalize"
                                                for="interest{{ $interest->id }}">
                                                @if (App::getLocale()=='ar')
                                                {{ $interest->name_ar }}
                                                @else
                                                {{ $interest->name_en }}
                                                @endif
                                            </label>
                                        </div>
                                        @else
                                        <div class="col-md-3 custom-control custom-checkbox mb-1">
                                            <input type="checkbox" class="custom-control-input"
                                                id="interest{{ $interest->id }}" name="interest[]"
                                                value="{{ $interest->id }}">
                                            <label class="custom-control-label text-capitalize"
                                                for="interest{{ $interest->id }}">
                                                @if (App::getLocale()=='ar')
                                                {{ $interest->name_ar }}
                                                @else
                                                {{ $interest->name_en }}
                                                @endif
                                            </label>
                                        </div>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>

                                    <hr class="preview-hr">

                                    <div class="form-group mt-2">
                                        <div class="form-control-wrap">
                                            <input type="submit" class="btn btn-primary"
                                                value="{{ __('general.Update') }}" />
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>`
                    {{-- .card --}}
                </div>
                {{-- .nk-block --}}
            </div>
        </div>
    </div>
</div>
@endsection