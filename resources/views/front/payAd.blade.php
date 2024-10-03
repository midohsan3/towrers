@extends('layouts.front')

{{-- 
  ======================
  =PAGE TITLE
  ======================
  --}}
@section('page-title')
{{__('general.Classifieds')}}
@endsection
{{-- 
  ======================
  =PAGE CONTENT
  ======================
  --}}
@section('page-content')


<section id="content">
  <div class="content-wrap d-flex min-vh-100 align-items-center">
    <div class="container">

      <div>
        <div class="container">
          <div class="page-title-row">

            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('front') }}"><strong
                      style="font-size: 1.5em; color: blue;">{{ __('front.Home') }}</strong></a></li>

                <li class="breadcrumb-item active" aria-current="page">
                  <strong style="font-size: 1.5em; color: blue;">{{__('general.Classifieds')}}</strong>
                </li>
              </ol>
            </nav>

          </div>
        </div>
      </div>

      <div class="row mt-3 d-flex justify-center">
        <script
          src="https://www.paypal.com/sdk/js?client-id=AaQJ4MtFTXTrjE-ZUwDZl95r9lOMnLHH6Q4ZDTHescMew1hNJvAgaUeWhNf631uMGpLMy59IS8dSEWas&enable-funding=venmo&currency=USD"
          data-sdk-integration-source="button-factory"></script>
        <script>
          function initPayPalButton() {
                      
                      paypal.Buttons({
                        style: {
                          shape: 'pill',
                          color: 'blue',
                          layout: 'vertical',
                          label: 'paypal',
                          
                        },                       
                
                        createOrder: function(data, actions) {
                          return actions.order.create({
                            purchase_units: [{"amount":{"currency_code":"AED","value":{{ $classified->paid_amount }} }}]
                          });
                        },
                
                        onApprove: function(data, actions) {
                          return actions.order.capture().then(function(orderData) {
                            
                            // Full available details
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                
                            // Show a success message within this page, e.g.
                            const element = document.getElementById('paypal-button-container');
                            //element.innerHTML = '';
                            //element.innerHTML = '<h3>Thank you for your payment!</h3>';
                            
                              actions.redirect('https://towersuae.ae/en/main{{ $classified->id }}/finishpayment');
                            
                          });
                        },
                
                        onError: function(err) {
                          console.log(err);
                        }
                      }).render('#paypal-button-container');
                    }
                    initPayPalButton();
        </script>
        <div id="paypal-button-container"></div>

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