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
                    
                     @if (Auth::guest())
                         <li><a href="/login">Login</a></li>
                         <li><a href="/register">Register</a></li>
                         @endif
                </ul>
                </div>
                @if (!Auth::guest())
                <div class="profile">
                     <ul>
                     <li><img src="user/profile/image/{{ Auth::user()->imgLoc }}" class="rounded-circle" height="50" width="50"></li>
                     <li>{{ Auth::user()->name }} </li>
                     <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="false"><i class="fa fa-chevron-down"></i></i></a>
                          <ul class="dropdown-menu">
                                    
                               <li class=""><a href="/userprofile">Profile</a></li>
                               @if(Auth::user()->role['roleName']=='customer')
                               <li class=""><a href="/allbooking">My bookings</a></li>
                               <li class=""><a href="/aboutus">Favourites</a></li>
                          @else
                                <li class=""><a href="/adminPanel">Dashboard</a></li>
                          @endif
                               <li><a href="/team">Help</a></li>
                          
                               <li><a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    {{ csrf_field() }}
                               </form>
                          </ul>
                     </ul>
                </div>
           @endif

          </div>
     </section>

     <section style="background-image:url('../images/contact.jpg');background-repeat:no-repeat;background-size:cover;">
          <div class="container">
               <div class="text-center">
                    <h1 class="text-white">Contact Us</h1>

                    <br>

                    <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, alias.</p>
               </div>
          </div>
     </section>


     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         @if ($errors->any())
                         <div class="alert alert-danger">
                              <ul>
                              @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                              @endforeach
                              </ul>
                              @if ($errors->has('email'))
                              @endif
                         </div>
                         @endif
                         @if(session()->has('success'))
                         <div class="alert alert-success">
                              {{ session()->get('success') }}
                         </div>
                         @endif
                         <form id="contact-form" role="form" action="/makeContact" method="POST">
                              {{csrf_field()}}
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter full name" name="fullname" required>
                    
                                   <input type="email" class="form-control" placeholder="Enter email address" name="email" required>

                                   <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required></textarea>
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="send message" value="Send Message">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="">
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