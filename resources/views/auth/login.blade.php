<!DOCTYPE html>
<html lang="en">
<head>

     <title>Banger & Co.</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="/" class="navbar-brand">Banger & Co.</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="/">Home</a></li>
                         <li><a href="/fleet">Fleet</a></li>
                         <li><a href="/offers">Offers</a></li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>
                              
                              <ul class="dropdown-menu">
                                   
                                   <li class="active"><a href="/aboutus">About Us</a></li>
                                   <li><a href="/team">Team</a></li>
                                  
                                   <li><a href="/terms">Terms</a></li>
                              </ul>
                         </li>
                         <li><a href="/contactus">Contact Us</a></li>
                         <li><a href="/login">Login</a></li>
                         <li><a href="/register">Register</a></li>
                    </ul>
               </div>

          </div>
     </section>

     <section class="bg-f8f8f8" style="background-image: url('images/offers.jpg'); background-repeat:no-repeat;background-size:cover;">
        <div class="container">
             <div class="text-center">
                  <h1 style="color:rgb(212, 212, 212)">Login</h1>

                
             </div>
        </div>
   </section>

<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               @if ($errors->any())
               <div class="alert alert-success">
                    <ul>
                         @foreach ($errors->all() as $error)
                              <li class="list-error">{{ $error}}</li>
                         @endforeach
                    </ul>
               </div>
               @endif
                

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-6 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                {{-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-6 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

 <!-- FOOTER -->
 <footer id="footer">
    <div class="container">
         <div class="row">

              <div class="col-md-4 col-sm-6">
                   <div class="footer-info">
                        <div class="section-title">
                             <h2>Headquarter</h2>
                        </div>
                        <address>
                             <p>212 Barrington Court <br>New York, ABC 10001</p>
                        </address>

                        <ul class="social-icon">
                             <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                             <li><a href="#" class="fa fa-twitter"></a></li>
                             <li><a href="#" class="fa fa-instagram"></a></li>
                        </ul>

                        <div class="copyright-text"> 
                             <p>Copyright &copy; 2020 Banger & Co.</p>
                             <p>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
                        </div>
                   </div>
              </div>

              <div class="col-md-4 col-sm-6">
                   <div class="footer-info">
                        <div class="section-title">
                             <h2>Contact Info</h2>
                        </div>
                        <address>
                             <p>+1 333 4040 5566</p>
                             <p><a href="mailto:contact@BangerCo.com">contact@BangerCo.com</a></p>
                        </address>

                        <div class="footer_menu">
                             <h2>Quick Links</h2>
                             <ul>
                                  <li><a href="/">Home</a></li>
                                  <li><a href="/aboutus">About Us</a></li>
                                  <li><a href="/terms">Terms & Conditions</a></li>
                                  <li><a href="/contactus">Contact Us</a></li>
                             </ul>
                        </div>
                   </div>
              </div>

              <div class="col-md-4 col-sm-12">
                   <div class="footer-info newsletter-form">
                        <div class="section-title">
                             <h2>Newsletter Signup</h2>
                        </div>
                        <div>
                             <div class="form-group">
                                  <form action="#" method="get">
                                       <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                                       <input type="submit" class="form-control" name="submit" id="form-submit" value="Send me">
                                  </form>
                                  <span><sup>*</sup> Please note - we do not spam your email.</span>
                             </div>
                        </div>
                   </div>
              </div>
              
         </div>
    </div>
</footer>


<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
