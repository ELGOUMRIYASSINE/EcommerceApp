<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment Checkout</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-container {
            max-width: 420px;
            margin: 60px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .payment-container h2 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px;
            font-size: 16px;
        }
        .form-group {
            position: relative;
            margin-bottom: 15px;
        }
        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }
        .form-group input {
            padding-left: 40px;
        }

        /* Fix for icons in the CVC, MM, and YYYY fields */
        .form-row {
            display: flex;
            gap: 10px;
        }
        .form-row .form-group {
            flex: 1;
            position: relative;
        }
        .form-row .form-group i {
            left: 15px;
        }
        .form-row .form-group input {
            padding-left: 40px;
        }

        .btn-pay {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: white;
            font-size: 18px;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            padding: 12px;
            transition: 0.3s;
        }
        .btn-pay:hover {
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
            box-shadow: 0 4px 10px rgba(255, 75, 43, 0.5);
        }
        .alert {
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- Include Header -->
        @include('home.header')

        <div class="payment-container">
            <h2>Secure Payment</h2>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            <form action="{{ route('stripe.post', $totalPrice) }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf

                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="text" class="form-control" placeholder="Name on Card" required>
                </div>

                <div class="form-group">
                    <i class="fa fa-credit-card"></i>
                    <input type="text" class="form-control card-number" placeholder="Card Number" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        {{-- <i class="fa fa-lock"></i> --}}
                        <input type="text" class="form-control card-cvc" placeholder="CVC" required>
                    </div>
                    <div class="form-group">
                        {{-- <i class="fa fa-calendar"></i> --}}
                        <input type="text" class="form-control card-expiry-month" placeholder="MM" required>
                    </div>
                    <div class="form-group">
                        {{-- <i class="fa fa-calendar"></i> --}}
                        <input type="text" class="form-control card-expiry-year" placeholder="YYYY" required>
                    </div>
                </div>

                <button class="btn btn-pay w-100 mt-3" type="submit">
                    Pay Now ${{ $totalPrice }}
                </button>
            </form>
        </div>
    </div>

    <script>
        $(function() {
            var $form = $(".require-validation");

            $form.on('submit', function(e) {
                var $inputs = $form.find('.form-control'),
                    valid = true;

                $inputs.each(function() {
                    if ($(this).val() === '') {
                        $(this).addClass('is-invalid');
                        valid = false;
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });

                if (!valid) {
                    e.preventDefault();
                    return;
                }

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, function(status, response) {
                        if (response.error) {
                            alert(response.error.message);
                        } else {
                            $form.append("<input type='hidden' name='stripeToken' value='" + response.id + "'/>");
                            $form.get(0).submit();
                        }
                    });
                }
            });
        });
    </script>
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
</body>
</html>
