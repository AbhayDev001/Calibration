<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
    <meta charset="utf-8">
    <title>Calibration - Ldap Configuration</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/smartadmin-production.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/style.css') }}">
    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="{{ asset('public/css/GoogleFont.css') }}">
    <link rel="apple-touch-icon" href="{{ asset('public/img/splash/sptouch-icon-iphone.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/splash/touch-icon-ipad.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/splash/touch-icon-iphone-retina.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/img/splash/touch-icon-ipad-retina.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('public/img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">
</head>
<body class="animated fadeInDown">
    <div class="main-area">
        <!-- MAIN CONTENT -->
        <div id="content" class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 login-form-data">
                    <div class="text-center">
                        @if(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible myalert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {!! \Session::get('failed') !!}
                        </div>
                        @endif
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible myalert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {!! \Session::get('success') !!}
                        </div>
                        @endif
                    </div>
                    <div class="well no-padding smart-form client-form">
                        <header>
                            <a href="{{ url('/') }}" class="login-logo">
                                <!--h2 style="font-weight: bold;letter-spacing: 4px;">Calibration</h2-->
                                <img src="{{ asset('public/img/logo.png') }}" alt="Calibration">
                            </a>
                        </header>
                        <header style="text-align: center;"><b>Change Ldap Setting</b></header>
                        <form name="frm" method="post" action="{{ url('SaveLdapConfiguration') }}">
                            <input type="hidden" value="{{csrf_token()}}" name="_token" />
                            <fieldset>
                                <section class="LdapSetting">
                                    <div class="checkbox" style="padding-left: 0; ">
                                        <label>
                                            <input type="checkbox" name="chkLDAP_HOSTNAME" value="1" class="checkbox style-1 chkLDAP_HOSTNAME" readonly="readonly">
                                            <span></span>LDAP_HOSTNAME
                                        </label>
                                    </div>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="password" name="LDAP_HOSTNAME" autocomplete="off" class="LDAP_HOSTNAME" readonly="readonly">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>enter LDAP_HOSTNAME</b>
                                    </label>
                                </section>
                                <section class="LdapSetting">
                                    <div class="checkbox" style="padding-left: 0; ">
                                        <label>
                                            <input type="checkbox" name="chkLDAP_ADMIN" value="1" class="checkbox style-1 chkLDAP_ADMIN" readonly="readonly">
                                            <span></span>LDAP_ADMIN
                                        </label>
                                    </div>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="password" name="LDAP_ADMIN" autocomplete="off" class="LDAP_ADMIN" readonly="readonly">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>enter your LDAP_ADMIN</b>
                                    </label>
                                </section>
                                <section class="LdapSetting">
                                    <div class="checkbox" style="padding-left: 0; ">
                                        <label>
                                            <input type="checkbox" name="chkLDAP_PASSWORD" value="1" class="checkbox style-1 chkLDAP_PASSWORD">
                                            <span></span>LDAP_PASSWORD
                                        </label>
                                    </div>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="password" name="LDAP_PASSWORD" autocomplete="off" class="LDAP_PASSWORD" readonly="readonly">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>enter LDAP_PASSWORD</b>
                                    </label>
                                </section>
                                <section class="LdapSetting">
                                    <div class="checkbox" style="padding-left: 0; ">
                                        <label>
                                            <input type="checkbox" name="chkLDAP_DC1" value="1" class="checkbox style-1 chkLDAP_DC1">
                                            <span></span>LDAP_DC1
                                        </label>
                                    </div>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="password" name="LDAP_DC1" autocomplete="off" class="LDAP_DC1" readonly="readonly">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>enter LDAP_DC1</b>
                                    </label>
                                </section>
                                <section class="LdapSetting">
                                    <div class="checkbox" style="padding-left: 0; ">
                                        <label>
                                            <input type="checkbox" name="chkLDAP_DC2" value="1" class="checkbox style-1 chkLDAP_DC2">
                                            <span></span>LDAP_DC2
                                        </label>
                                    </div>
                                    <label class="input">
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="password" name="LDAP_DC2" autocomplete="off" class="LDAP_DC2" readonly="readonly">
                                        <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>enter LDAP_DC2</b>
                                    </label>
                                </section>
                                <section>
                                    <button type="Submit" name="btnSubmit" class="btn btn-primary btnSubmit">
                                        Submit
                                    </button>
                                </section>
                            </fieldset>
                        </form>
                        <footer>
                            <span style="color: red;text-align: center;width: 100%;display: inline-block;">Note :  Ldap settings apply after logout...</span>
                        </footer>
                        <footer>
                            <p class="copy-right-grids">2020 Calibration. | Developed By :
                                <a href="http://inboxtechs.com/" target="_blank">inboxtechs</a>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/js/libs/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('public/js/libs/jquery-ui-1.10.3.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".LdapSetting input[type='checkbox']").click(function() {
                if($(this).prop("checked") == true)
                {
                    $(this).parents(".LdapSetting").find("input").removeAttr("readonly");
                }
                else
                {
                    $(this).parents(".LdapSetting").find("input").attr("readonly","readonly");
                }
            });
            $(".btnSubmit").click(function() {
                if($(".chkLDAP_HOSTNAME").prop("checked")==true)
                {
                    if($(".LDAP_HOSTNAME").val()=="")
                    {
                        $(".LDAP_HOSTNAME").focus();
                        return false;
                    }
                }
                if($(".chkLDAP_ADMIN").prop("checked")==true)
                {
                    if($(".LDAP_ADMIN").val()=="")
                    {
                        $(".LDAP_ADMIN").focus();
                        return false;
                    }
                }
                if($(".chkLDAP_PASSWORD").prop("checked")==true)
                {
                    if($(".LDAP_PASSWORD").val()=="")
                    {
                        $(".LDAP_PASSWORD").focus();
                        return false;
                    }
                }
                if($(".chkLDAP_DC1").prop("checked")==true)
                {
                    if($(".LDAP_DC1").val()=="")
                    {
                        $(".LDAP_DC1").focus();
                        return false;
                    }
                }
                if($(".chkLDAP_DC2").prop("checked")==true)
                {
                    if($(".LDAP_DC2").val()=="")
                    {
                        $(".LDAP_DC2").focus();
                        return false;
                    }
                }
            });
        });
    </script>
</body>
</html>
