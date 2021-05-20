<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Accept a card payment</title>
    <meta name="description" content="A demo of a card payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{asset('css/global.css')}}" />
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="{{asset('js/client.js')}}" ></script>
  </head>

  <body>
    <!-- Display a payment form -->
    <form accept-charset="UTF-8" action="{{route('payment.store')}}" class="require-validation"
        data-cc-on-file="false"
        data-stripe-publishable-key="sk_test_51I39rQFtwYK1Z7SqBKJEBU6BJ8UpakhaS4PvbXsniyXM8hq1KM45FmeymGNY5Tl0tlaToQTTDOGIejAiVOvMTDLP001a4MVanX"
        id="payment-form" method="post">
        {{ csrf_field() }}
        <div class="row g-3">
            <div class='col-md-12 required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='4' type='text'>
            </div>
            <div class='col-md-12 required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' size='20'
                                type='text'>
            </div>
            <div class='col-md-12 required'>
                <label class='control-label'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                    type='text'>
            </div>
            <div class='col-md-12 required'>
                <label class='control-label'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2'
                                type='text'>
            </div>
            <div class='col-md-12 required'>
                <label class='control-label'> </label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                type='text'>
            </div>
            <div class='col-md-12'>
                <div class='form-control total btn btn-info'>
                    Total: <span style="font-size:25px;" class='amount'>$ {{App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('shipping')+App\Cart::where('user_id',Auth::id())->where('etat', 'off')->get()->sum('price_total')}}</span>
                </div>
            </div>
            <div class='col-md-12'>
                    <button class='form-control btn btn-primary submit-button'
                    type='submit' style="margin-top: 10px;">Pay »</button>
            </div>
            <br>
            <div class='col-md-12'>
                <a class='btn btn-outline-danger'
                href='{{route('cart-index')}}' style="margin-top: 10px;">Go Back</a>
            </div>

                @if(Session::has('success-message'))
                    <div class="alert alert-success">
                        {{Session::get('success-message')}}
                    </div>
                @endif
                @if(Session::has('fail-message'))
                    <div class="alert alert-danger">
                        {{Session::get('fail-message')}}
                    </div>
                @endif
            </div>
        </form>
  </body>
</html>
