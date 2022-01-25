
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!--begin::Head-->
    <head><base href="../../../">
        <meta charset="utf-8" />
        <title>Sign Up | Hope 87</title>
        <meta name="description" content="Login page example" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Page Custom Styles(used by this page)-->
        <link href="{{asset('assets/css/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body  class="header-fixed header-mobile-fixed subheader-enabled page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Login-->
            <div class="login login-1  d-flex flex-column flex-lg-row flex-column-fluid bg-white" >
                <!--begin::Aside-->
                <div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
                    <!--begin::Aside Top-->
                    <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                        <!--begin::Aside header-->
                        <a href="#" class="text-center mb-10">
                            <img src="assets/media/logos/logo-letter-1.png" class="max-h-70px" alt="" />
                        </a>
                        <!--end::Aside header-->
                        <!--begin::Aside title-->
                        <h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Growing And Built 
                        <br />New Generation</h3>
                        <!--end::Aside title-->
                    </div>
                    <!--end::Aside Top-->
                    <!--begin::Aside Bottom-->
                    <div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/media/svg/illustrations/login-visual-1.svg)"></div>
                    <!--end::Aside Bottom-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                    <!--begin::Content body-->
                    <div class="d-flex flex-column-fluid flex-center">
                        <!--begin::Signin-->
                       
                        <!--end::Signin-->
                        <!--begin::Signup-->
                        <div class="login-form ">
                            <!--begin::Form-->
                            <form method="POST" action="{{ route('register') }}">
                              @csrf
                                <!--begin::Title-->
                                <div class="pb-13 pt-lg-0 pt-5">
                                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
                                    <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
                                    <span class="text-muted font-weight-bold font-size-h4">Have Already Acount
                                    <a href="{{route('login')}}"  class="text-primary font-weight-bolder">Sign In</a></span>
                                </div>
                                <!--end::Title-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="name" name="name" autofocus="" autocomplete="off" required  />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" required  />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="password" name="password" autocomplete="off" required  />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="password_confirmation"  autocomplete="off" required />
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <label class="checkbox mb-0">
                                    <input type="checkbox" name="agree" />I Agree the
                                    <a href="#">terms and conditions</a>.
                                    <span></span></label>
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                                    <button type="submit"  class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Sign Up</button>
                                    <button type="button"  class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                                </div>
                                <!--end::Form group-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signup-->
                        <!--begin::Forgot-->
                       
                        <!--end::Forgot-->
                    </div>
                    <!--end::Content body-->
                    <!--begin::Content footer-->
                    <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                        <a href="#" class="text-primary font-weight-bolder font-size-h5">Terms</a>
                        <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Plans</a>
                        <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Contact Us</a>
                    </div>
                    <!--end::Content footer-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Login-->
        </div>
        <!--end::Main-->
       
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="assets/plugins/global/plugins.bundle.js"></script>
        <script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="assets/js/scripts.bundle.js"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Scripts(used by this page)-->
        <!-- <script src="assets/js/pages/custom/login/login-general.js"></script> -->
        <!--end::Page Scripts-->
    </body>
    <!--end::Body-->
</html>