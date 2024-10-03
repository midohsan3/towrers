<?php

use App\Models\User;
use App\Models\NewsMdl;
use App\Models\MajorMdl;
use App\Models\OrderMdl;
use App\Models\CompanyMdl;
use App\Models\ProjectMdl;
use App\Models\SectionMdl;
use App\Models\ClassifiedMdl;
use App\Models\MainSliderMdl;
use App\Models\JobCategoryMdl;
use App\Models\SubscriptionMdl;
use App\Models\ProductCategoryMdl;
use App\Models\ProjectCategoryMdl;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/*
============================
============================
*/

function newCompanies()
{
  return User::where([['role_name', 'Company'], ['approval', 0]])->count();
}
/*
============================
============================
*/
function newPersons()
{
  return User::where([['role_name', 'Person'], ['approval', 0]])->count();
}
/*
============================
============================
*/
function newOrders()
{
  return OrderMdl::where('status', 0)->count();
}
/*
============================
============================
*/
function newAds()
{
  return ClassifiedMdl::where('status', 0)->count();
}
/*
============================
============================
*/

function sections()
{
  return SectionMdl::where('status', 1)->orderBy('id', 'ASC')->get();
}
/*
============================
============================
*/
function majors()
{
  return MajorMdl::where('status', 1)->orderBy('id', 'ASC')->get();
}
/*
============================
============================
*/
function projectCats()
{
  if (App::getLocale() == 'ar') {
    return ProjectCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
  } else {
    return ProjectCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
  }
}
/*
============================
============================
*/
function productCats()
{
  if (App::getLocale() == 'ar') {
    return ProductCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
  } else {
    return ProductCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
  }
}
/*
============================
============================
*/
function jobsCats()
{
  if (App::getLocale() == 'ar') {
    return JobCategoryMdl::where('status', 1)->orderBy('name_ar', 'ASC')->get();
  } else {
    return JobCategoryMdl::where('status', 1)->orderBy('name_en', 'ASC')->get();
  }
}
/*
============================
============================
*/
function mainSliders()
{
  return MainSliderMdl::where('status', 1)->orderBy('id', 'DESC')->get();
}
/*
============================
============================
*/
function newsBar()
{
  return NewsMdl::orderBy('id', 'DESC')->get();
}
/*
============================
============================
*/
function topLeftAds()
{
  return ClassifiedMdl::where([['size_id', 1], ['status', 1]])->inRandomOrder()->limit(10)->get();
}
/*
============================
============================
*/
function bottomLeftAds()
{
  return ClassifiedMdl::where([['size_id', 1], ['status', 1]])->inRandomOrder()->limit(10)->get();
}
/*
============================
============================
*/
function topRightsAds()
{
  return ClassifiedMdl::where([['size_id', 2], ['status', 1]])->inRandomOrder()->limit(10)->get();
}
/*
============================
============================
*/
function bottomRightsAds()
{
  return ClassifiedMdl::where([['size_id', 2], ['status', 1]])->inRandomOrder()->limit(10)->get();
}
/*
============================
============================
*/
function lastCompanies()
{
  return CompanyMdl::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
}
/*
============================
============================
*/
function lastProjects()
{
  return ProjectMdl::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
}
/*
============================
============================
*/
function packageCost()
{
  $subscription = SubscriptionMdl::where([['user_id', Auth::user()->id], ['status', 1]])->orderBy('id', 'DESC')->first();

  if ($subscription) {
    return $subscription->paid_amount;
  } else {
    return 0;
  }
}
/*
============================
============================
*/