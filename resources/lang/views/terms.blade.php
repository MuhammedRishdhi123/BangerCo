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

     <section style="background-image:url('../images/terms.jpg');background-repeat:no-repeat;background-size:cover;">
          <div class="container">
               <div class="text-center">
                    <h1 class="text-white">Terms</h1>

                    <br>

                    <p class="lead text-white">Our company terms and conditions.</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="about-info">
                    <h2>Please be kind enough to follow our company guidelines and rules.</h2>

                    <h1>Terms and Conditions for Banger</h1>

                    <h2>Introduction</h2> 
                      
                    <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Banger Co. accessible at www.BangerCo.com.</p>
                    
                    <p>These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions. These Terms and Conditions have been generated with the help of the <a href="https://www.termsandcondiitionssample.com">Terms And Conditiions Sample</a> and the <a href="https://www.generateprivacypolicy.com">Privacy Policy Generator</a>.</p>
                    
                    <p>Minors or people below 18 years old are not allowed to use this Website.</p>
                    
                    <h2>Intellectual Property Rights</h2>
                    
                    <p>Other than the content you own, under these Terms, Banger and/or its licensors own all the intellectual property rights and materials contained in this Website.</p>
                    
                    <p>You are granted limited license only for purposes of viewing the material contained on this Website.</p>
                    
                    <h2>Restrictions</h2>
                    
                    <p>You are specifically restricted from all of the following:</p>
                    
                    <ul>
                        <li>publishing any Website material in any other media;</li>
                        <li>selling, sublicensing and/or otherwise commercializing any Website material;</li>
                        <li>publicly performing and/or showing any Website material;</li>
                        <li>using this Website in any way that is or may be damaging to this Website;</li>
                        <li>using this Website in any way that impacts user access to this Website;</li>
                        <li>using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
                        <li>engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
                        <li>using this Website to engage in any advertising or marketing.</li>
                    </ul>
                    
                    <p>Certain areas of this Website are restricted from being access by you and Banger may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>
                    
                    <h2>Your Content</h2>
                    
                    <p>In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Banger a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>
                    
                    <p>Your Content must be your own and must not be invading any third-party’s rights. Banger reserves the right to remove any of Your Content from this Website at any time without notice.</p>
                    
                    <h2>Your Privacy</h2>
                    
                    <p>Please read Privacy Policy.</p>
                    
                    <h2>No warranties</h2>
                    
                    <p>This Website is provided "as is," with all faults, and Banger express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you.</p>
                    
                    <h2>Limitation of liability</h2>
                    
                    <p>In no event shall Banger, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Banger, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>
                    
                    <h2>Indemnification</h2>
                    
                    <p>You hereby indemnify to the fullest extent Banger from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>
                    
                    <h2>Severability</h2>
                    
                    <p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.</p>
                    
                    <h2>Variation of Terms</h2>
                    
                    <p>Banger is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>
                    
                    <h2>Assignment</h2>
                    
                    <p>The Banger is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>
                    
                    <h2>Entire Agreement</h2>
                        
                    <p>These Terms constitute the entire agreement between Banger and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>
                    
                    <h2>Governing Law & Jurisdiction</h2>
                    
                    <p>These Terms will be governed by and interpreted in accordance with the laws of the State of lk, and you submit to the non-exclusive jurisdiction of the state and federal courts located in lk for the resolution of any disputes.</p>
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