<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>CMS | Login</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <!--begin::Global Theme Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--end::Web font -->
    <!--begin::Global Theme Styles -->
    <link href="{{ asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{{ asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
    <!--begin::Customize Css -->
    <link href="{{ asset('assets/customize.css')}}" rel="stylesheet" type="text/css" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-grid--hor-tablet-and-mobile m-login m-login--6 m-login--signin"
            id="m_login">
            <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2  m-grid m-grid--hor m-login__aside "
                style="background-image: url(assets/app/media/img//bg/bg-9.jpg);">
                <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver">
                    <div class="m-grid__item m-grid__item--middle m--align-center">
                        <span class="m-login__title">Backend Panel</span>
                        <a href="" class="m-login__subtitle m-link" target="_blank">View Frontend<i class="la la-external-link"></i></a>
                    </div>
                </div>
                <div class="m-grid__item">
                    <div class="m-login__info">
                        <div class="m-login__section">
                            <span>
                                Developed by
                            </span>
                            <a href="#" class="m-link">4 Vision Media</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-grid__item m-grid__item--fluid  m-grid__item--order-tablet-and-mobile-1  m-login__wrapper">
                <!--begin::Body-->                
                @yield('isi')
                <!--end::Body-->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <script src="{{ asset('js/webfont.js') }}"></script>
    <script src="{{ asset('js/forWebFont.js') }}"></script>
    <script src="{{ asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>
</body>
</html>
