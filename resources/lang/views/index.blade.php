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
     
     @if (session('info'))
     <div class="alert alert-success" style="text-align: center">
          {{ session('info') }}
     </div>
     @endif

     @if (session('error'))
     <div class="alert alert-success" style="text-align: center">
          {{ session('error') }}
     </div>
     @endif
    
    
     <!-- HOME -->
     <section id="home">
          <div class="row">
               <div class="owl-carousel owl-theme home-slider">
                    <div class="item item-first">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>World Class Service</h1>
                                        <h3>Top premium cars from the top to the top.</h3>
                                        <a href="fleet.html" class="section-btn btn btn-default">Fleet</a>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="item item-second">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>One to one replacement</h1>
                                        <h3>Replace cars any point anywhere in the world.</h3>
                                        <a href="fleet.html" class="section-btn btn btn-default">Fleet</a>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="item item-third">
                         <div class="caption">
                              <div class="container">
                                   <div class="col-md-6 col-sm-12">
                                        <h1>Reasonable price for exceptional quality</h1>
                                        <h3>Quality cars at affordable prices.</h3>
                                        <a href="fleet.html" class="section-btn btn btn-default">Fleet</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>

     <main>
          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="text-center">
                                   <h2>About us</h2>

                                   <br>

                                   <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore molestias ipsa veritatis nihil iusto maiores natus dolor, a reiciendis corporis obcaecati ex. Totam assumenda impedit aut eum, illum distinctio saepe explicabo. Consequuntur molestiae similique id quos, quasi quas perferendis laboriosam, fugit natus odit totam! Id dolores saepe, sint debitis rerum dolorem tempora aliquid, pariatur enim nisi. Quia ab iusto assumenda.</p>
                              </div>
                         </div>
                    </div>
               </div>
          </section>

          <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Offers <small>Our latest promotions</small></h2>
                              </div>
                         </div>
                         @isset($offers)
                             
                         @foreach($offers as $offer)
                         <div class="col-md-4 col-sm-6">
                              <div class="team-thumb">
                                   <div class="courses-image">
                                        <img src="offer/image/{{$offer->imgLoc}}" class="img-responsive" alt="">
                                   </div>
                                   <div class="team-info">
                                        <h3>{{$offer->title}}</h3>

                                        <p class="lead"><b><small>{{$offer->description}}</small></b></p>

                                      
                                   </div>
                                  
                              </div>
                         </div>
                         @endforeach
                         @endisset
                    
                    </div>
               </div>
          </section>
          {{-- <section>
               <div class="container">
                    <div class="row">
                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Latest Blog posts <small>Lorem ipsum dolor sit amet.</small></h2>
                              </div>
                         </div>

                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="images/blog-1-720x480.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                             <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                             <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="blog-post-details.html">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</a></h3>
                                   </div>

                                   <div class="courses-info">
                                        <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="images/blog-2-720x480.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                             <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                             <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="blog-post-details.html">Tempora molestiae, iste, consequatur unde sint praesentium!</a></h3>
                                   </div>

                                   <div class="courses-info">
                                        <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                                   </div>
                              </div>
                         </div>

                         <div class="col-md-4 col-sm-4">
                              <div class="courses-thumb courses-thumb-secondary">
                                   <div class="courses-top">
                                        <div class="courses-image">
                                             <img src="images/blog-3-720x480.jpg" class="img-responsive" alt="">
                                        </div>
                                        <div class="courses-date">
                                             <span title="Author"><i class="fa fa-user"></i> John Doe</span>
                                             <span title="Date"><i class="fa fa-calendar"></i> 12/06/2020 10:30</span>
                                             <span title="Views"><i class="fa fa-eye"></i> 114</span>
                                        </div>
                                   </div>

                                   <div class="courses-detail">
                                        <h3><a href="blog-post-details.html">A voluptas ratione, error provident distinctio, eaque id officia?</a></h3>
                                   </div>

                                   <div class="courses-info">
                                        <a href="blog-post-details.html" class="section-btn btn btn-primary btn-block">Read More</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </section> --}}
          <section id="testimonial">
               <div class="container">
                    <div class="row">

                         <div class="col-md-12 col-sm-12">
                              <div class="section-title text-center">
                                   <h2>Testimonials <small>from around the world</small></h2>
                              </div>

                              <div class="owl-carousel owl-theme owl-client">

                                   @isset($testimonials)
                                   @foreach($testimonials as $testimonial)
                                  
                                   <div class="col-md-4 col-sm-4">
                                        <div class="item">
                                             <div class="tst-image">
                                                  <img src="user/profile/image/{{$testimonial->User['imgLoc']}}" class="img-responsive" alt="">
                                             </div>
                                             <div class="tst-author">
                                                  <h4>{{$testimonial->User['name']}}</h4>
                                                  <span>{{$testimonial->created_at}}</span>
                                             </div>
                                             <p>{{$testimonial->description}}</p>
                                             <div class="tst-rating">
                                                  @if($testimonial->rating == 1)
                                                  <i class="fa fa-star"></i>
                                                  @elseif($testimonial->rating == 2)
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  @elseif($testimonial->rating == 3)
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  @elseif($testimonial->rating == 4)
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  @elseif($testimonial->rating == 5)
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  <i class="fa fa-star"></i>
                                                  @endif
                                             </div>
                                        </div>
                                   </div>
                                   @endforeach
                                   @endisset
                              

                              </div>
                        </div>
                    </div>
               </div>
          </section> 
     </main>

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
                         <div class="alert alert-success" >
                              {{ session()->get('success') }}
                         </div>
                         @endif
                         <form id="contact-form" role="form" action="/makeContact" method="post">
                              {{csrf_field()}}
                              <div class="section-title">
                                   <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                              </div>

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
                              <img src="images/contact-1-600x400.jpg" class="img-responsive" alt="Smiling Two Girls">
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
     <script>
        
     </script>

</body>
</html>