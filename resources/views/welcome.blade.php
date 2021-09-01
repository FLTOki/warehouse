<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StoreAway</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <script src="https://www.paypal.com/sdk/js?client-id=AYqCJP7-fpd069teA-o2uTrYNxsShjv25eKP7A3gY4Urny7amU1kVdysNIly911TGO4ObtMZ7vSmVM9T"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.
    </script>

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            /* vertical-align: middles */
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <a class="navbar-brand pt-3 pl-5" href="{{ url('/') }}">
        StoreAway
    </a>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <button class="btn btn-success"><a href="/profile/{{ Auth::user()->id }}" class="text-sm text-white-700 uppercase">My Profile</a></button>
            <!--  url'/home'  -->
            @else
            <button class="btn btn-success"><a href="{{ route('login') }}" class="text-sm text-white-700 uppercase">SIGN IN</a></button>

            @if (Route::has('register'))
            <button class="btn btn-success"><a href="{{ route('register') }}" class="ml-4 text-sm text-white-700 uppercase">SIGN UP</a></button>
            @endif
            @endauth
        </div>
        @endif

        <div class="container-fluid">
            <div class="HeroContainer" id="home">
                <div class="HeroBg">
                    <!-- <div class="VideoBg" autoPlay loop muted>
                        <source type='video/mp4' src="https://player.vimeo.com/external/490251401.sd.mp4?s=f811e4ba0b9d7de9b7145435ce61930c4728173d&profile_id=139&oauth2_token_id=57447761" />
                    </div> -->
                    <video class="VideoBg" autoplay muted loop>
                        <source src="https://player.vimeo.com/external/490251401.sd.mp4?s=f811e4ba0b9d7de9b7145435ce61930c4728173d&profile_id=139&oauth2_token_id=57447761" type="video/mp4">
                    </video>
                </div>

                <div class="HeroContent">
                    <div class="HeroH1">Welcome to StoreAway</div>
                    <div class="HeroP">Sign Up for a new Account</div>

                    <div class="HeroBtnWrapper">
                        <a href="/register" class="btn btn-success uppercase">
                            Get Started
                        </a>
                    </div>

                </div>
            </div>

            <div class="InfoContainer">
                <div class="row pt-5">
                    <div class=" InfoRow">
                        <div class=" pl-5 ImgWrap">
                            <Img src="{{ asset('images/img1.svg') }}" class="pt-5" />
                        </div>
                        <div class="Column1">
                            <div class="TextWrapper">
                                <div class="TopLine"> StoreAway </div>
                                <div class="Heading lightText={lightText}">Storage at your convenience </div>
                                <div class="Subtitle darkText={darkText}"> Get the perfect storage space for your needs without any stress or hustle</div>
                                <div class="BtnWrap">
                                    <a href="/index" class="btn btn-success uppercase">
                                        Get Started
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="InfoContainer1">
                <div class="pt-5 row">
                    <div class="InfoRow col-sm">
                        <div class="Column1">
                            <div class="TextWrapper">
                                <div class="TopLine"> Acres of Space </div>
                                <div class="Heading ">Find Space anywhere you are </div>
                                <div class="Subtitle "> Browse locations all over the country, narrow down to your location and select the perfect space for you</div>
                                <div class="BtnWrap">
                                    <a href="/index" class="btn btn-success uppercase">
                                        Browse
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ImgWrap col-sm">
                        <Img src="{{ asset('images/img2.svg') }}" class="pt-5" />
                    </div>
                    </div>
                    
                </div>
            </div>

            <div class="InfoContainer2">
                <div class="row pt-5">

                    <div class="InfoRow ">
                        <div class="ImgWrap pl-5">
                            <Img src="{{ asset('images/img3.svg') }}" class="pt-5" />
                        </div>
                        <div class="Column1">
                            <div class="TextWrapper">
                                <div class="TopLine"> Register </div>
                                <div class="Heading">Create your account today</div>
                                <div class="Subtitle "> Register and get unlimited access to our library of storage facilities, zero fees, zero hustle</div>
                                <div class="BtnWrap">
                                    <a href="/register" class="btn btn-success uppercase">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <div class="ServicesContainer" id="services">
                <div class="ServicesH1">Our Services</div>
                <div class="ServicesWrapper row">
                    <div class="ServicesCard col-sm-3">
                        <div class="ServicesIcon" src={Icon1} />
                        <div class="ServicesH2">Premium Account</div>
                        <div class="ServicesP">Want to lease your property through us? Get in touch with our team ASAP! www.storeawayhelp.com</div>
                    </div>

                    <div class="ServicesCard col-sm-3">
                        <div class="ServicesIcon" src={Icon2} />
                        <div class="ServicesH2">Cashless Transactions</div>
                        <div class="ServicesP">Lease a warehouse from the comfort of your office through Paypal and MPesa</div>
                    </div>

                    <div class="ServicesCard col-sm-3">
                        <div class="ServicesIcon" src={Icon3} />
                        <div class="ServicesH2">After Sales Services</div>
                        <div class="ServicesP">Get in touch easily with the property owner or our team for any inquiries or concerns.</div>
                    </div>
                </div>
            </div> -->

            <!-- @include('layouts.footer') -->
        </div>
    </div>
</body>

</html>