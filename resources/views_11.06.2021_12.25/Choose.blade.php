<!DOCTYPE html>
<html lang="en-us" id="extr-page">
<head>
    <meta charset="utf-8">
    <title>Choose Project</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('public/img/favicon/favicon.ico') }}" type="image/x-icon">

    <!--     <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/css/bootstrap.min.css') }}">
    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!------ Include the above in your HEAD tag ---------->

    <style type="text/css">
        .form-signin {
          max-width: 400px; 
          display:block;
          background-color: #f7f7f7;
          -moz-box-shadow: 0 0 3px 3px #888;
          -webkit-box-shadow: 0 0 3px 3px #888;
          box-shadow: 0 0 3px 3px #888;
          border-radius:2px;
      }
      .main{
        padding: 38px;
    }
    .social-box{
      margin: 0 auto;
      padding: 38px;
      border-bottom:1px #ccc solid;
  }
  .social-box a{
      font-weight:bold;
      font-size:18px;
      padding:8px;
  }
  .social-box a i{
      font-weight:bold;
      font-size:20px;
  }
  .heading-desc{
    font-size:20px;
    font-weight:bold;
    padding:38px 38px 0px 38px;
    
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: 20px;
  padding: 20px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: 10px;
  border-radius: 5px;
  
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-radius: 5px;
}
.login-footer{
    background:#f0f0f0;
    margin: 0 auto;
    border-top: 1px solid #dadada;
    padding:20px;
}
.login-footer .left-section a{
    font-weight:bold;
    color:#8a8a8a;
    line-height:19px;
}
.mg-btm{
    margin-bottom:20px;
}
</style>
</head>
<body>
    <center>
        <div class="container">
            <div class="row">
                <form class="form-signin mg-btm">
                    <h3 class="heading-desc"></h3>
                    <!-- <hr> -->
                    <img src="{{ asset('public/img/logo.png') }}" alt="PHMeter">
                    <hr>
                    <div class="social-box">
                        <div class="row mg-btm">
                         <div class="col-md-12">
                            <a href="<?php echo url('/Login');?>" class="btn btn-primary btn-block">
                              <i class="icon-facebook"></i>Calibration
                          </a>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <a href="http://localhost/phmeter/Login" class="btn btn-success btn-block" >
                          <i class="icon-twitter"></i>PHMeter
                      </a>
                  </div>
              </div>
          </div>

          <div class="login-footer">
            <p class="copy-right-grids">Developed By :
                <a href="http://inboxtechs.com/" target="_blank">Inbox Infotech Pvt. Ltd.</a>
            </p>
        </div>
    </form>
</div>
</div>
</center>
</body>
</html>