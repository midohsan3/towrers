@extends('layouts.admin')

{{--
  =====================
  =TITLE
  =====================
  --}}
@section('title')
{{ __('general.Packages') }}
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
          <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h3 class="nk-block-title page-title">{{ __('package.Confirm Your Order') }}</h3>
            </div>
            {{-- .nk-block-head-content --}}

          </div>
        </div>
        {{-- .nk-block-head --}}

        <div class="nk-block">
          <script src="https://www.paypal.com/sdk/js?client-id=test&currency=AED"
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
                              purchase_units: [{"amount":{"currency_code":"AED","value":{$package->price}}}]
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
                  //let $ad = 11111;
                                //actions.redirect('https://macraphon.com/en/new-ad/featured/days-'+{$ad});
                                actions.redirect('{route("c-company.package.store.subscribe",$package->id)}');
                                //window.location.href = "https://macraphon.com/en/new-ad/featured/days-"+{$ad};
                              
                            });
                          },
                  
                          onError: function(err) {
                            console.log(err);
                          }
                        }).render('#paypal-button-container');
                      }
                      initPayPalButton();
          </script>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
{{--
  =====================
  =PAGE SCRIPTS
  =====================
  --}}
@section('scripts')

@endsection