<!DOCTYPE html>
<html lang="en">

<head>

     <title>Banger & Co.</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/jquery-ui.css" />
     

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
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">About<span class="caret"></span></a>

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
                         <li><img src="user/profile/image/{{ Auth::user()->imgLoc }}" class="rounded-circle" height="50"
                                   width="50"></li>
                         <li>{{ Auth::user()->name }} </li>
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="false" aria-expanded="false"><i
                                        class="fa fa-chevron-down"></i></i></a>
                              <ul class="dropdown-menu">

                                   <li class=""><a href="/userprofile">Profile</a></li>
                                   @if(Auth::user()->role['roleName']=='customer')
                                        <li class=""><a href="/allbooking">My bookings</a></li>
                                        <li class=""><a href="/aboutus">Favourites</a></li>
                                   @else
                                         <li class=""><a href="/adminPanel">Dashboard</a></li>
                                   @endif
                                   <li><a href="/team">Help</a></li>

                                   <li><a href="#"
                                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                   </li>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display:none;">
                                        {{ csrf_field() }}
                                   </form>
                              </ul>
                    </ul>
               </div>
               @endif

          </div>
     </section>
     @if ($errors->any())
          <div class="alert alert-success">
               <ul>
                    @foreach ($errors->all() as $error)
                         <li class="list-error">{{ $error}}</li>
                    @endforeach
               </ul>
          </div>
     @endif

     <section style="background-image: url('../images/fleet.jpg');background-repeat:no-repeat;background-size:cover;">
          <div class="container">
               <div class="text-center">
                    <h1 class="text-white">Fleet</h1>

                    <br>

                    <p class="lead text-white">Our luxury fleet for our customers.</p>
               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">
                    @if(isset($vehicles))
                    @foreach($vehicles as $vehicle)
                    <div class="col-md-4 col-sm-4">
                         <div class="courses-thumb courses-thumb-secondary">
                              <div class="courses-top">
                                   <div class="courses-image">
                                        <img src="vehicle/image/{{$vehicle->imageUrl}}" class="img-responsive" alt="">
                                   </div>
                                   <div class="courses-date">
                                        <span title="passegengers"><i class="fa fa-user"></i> 5</span>
                                        <span title="luggages"><i class="fa fa-briefcase"></i> 4</span>
                                        <span title="doors"><i class="fa fa-sign-out"></i> 4</span>
                                        <span title="transmission"><i class="fa fa-cog"></i> A</span>
                                   </div>
                              </div>

                              <div class="courses-detail">
                                   <h3><a href="fleet.html">{{$vehicle->model}} {{$vehicle->brand}}</a></h3>
                                   <p class="lead"><small>from</small>
                                        <strong>{{$vehicle->VehicleRate['rate']}}</strong> <small>per day</small></p>
                                   <p>{{$vehicle->desc}}</p>
                                   <span class="status">
                                        @if($vehicle->status=='on')
                                        Available
                                        @else
                                        Unavailable
                                        @endif
                                   </span>
                              </div>

                              <div class="courses-info">
                                   @if($vehicle->status=='on')
                                   <button type="button" data-toggle="modal" data-target="#myModal"
                                        id="{{$vehicle->id}}"
                                        class="section-btn btn btn-primary btn-block checkAvailbtn">View
                                        details</button>
                                   @endif
                              </div>
                         </div>
                    </div>
                    @endforeach
                    @endif

               </div>
          </div>
     </section>

     <!-- The Modal -->
     <div id="booking" class="modal">

          <!-- Modal content -->
          <div class="modal-content booking">
               <div class="form-head">
                    <h3 class='head'></h3>
               </div>
               <span class="close">&times;</span>

               <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
               </div>



               <div class="row">

                    <div class="col-md-6">
                         <img src="" alt="" class="img-responsive" id="v-img">
                    </div>
                    <div class="col-md-6">
                         <div class="features">
                              <h4>Features</h4>
                              <span><i class="fa fa-user"></i></span>
                              <span><i class="fa fa-briefcase"></i></span>
                              <span><i class="fa fa-cog"></i></span>
                              <span><i class="fa fa-sign-out"></i></span>
                         </div>
                         <div class="description">
                              
                         </div>
                         <form action="/checkAvailability" method="POST">
                              {{ csrf_field() }}

                              <input type="hidden" name="vehicleid" id="vehicleid">
                              <span class="dateinput"><b>Pickup date</b></span>
                                   
                              <input type="datetime-local" name="fromDate" id="fromDate" step="1" min="{{date('Y-m-d\Th:i:s',time())}}" autocomplete="off" style="background: transparent;">
                              <br><br>
                              <span class="dateinput"><b>Dropoff date</b></span>
                              
                              <input type="datetime-local" name="toDate" id="toDate" step="1" min="{{date('Y-m-d\Th:i:s',time())}}" autocomplete="off" style="background: transparent;">
                              

                    </div>
                    <input class="btn btn-primary" type="submit"  id="formadd" value="Check availability" style="margin-top:15px;margin-right:25px;">
                    </form>
               </div>


          </div>

     </div>

     </div>






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
                                             <input type="email" class="form-control" placeholder="Enter your email"
                                                  name="email" id="email" required>
                                             <input type="submit" class="form-control" name="submit" id="form-submit"
                                                  value="Send me">
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
     <script src="js/moment.js"></script>
     <script src="js/jquery-ui.js"></script>
     
     

     <script>

          var modal = document.getElementById('booking');

          // Get the button that opens the modal


          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

          // When the user clicks the button, open the modal 
          function viewMore(vehicle) {

               modal.style.display = "block";
               $('#v-img').attr('src', 'vehicle/image/' + vehicle.imageUrl);
               $('.description').text(vehicle.desc);
               $('#vehicleid').attr('value', vehicle.id);

          }

          // When the user clicks on <span> (x), close the modal
          span.onclick = function () {

               modal.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function (event) {
               if (event.target == modal) {

                    modal.style.display = "none";
               }
          }

          
          $('.checkAvailbtn').click(function (e) {
               var id = $(this).attr('id');
              
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });


               $.ajax({
                    type: 'GET',
                    url: "/getVehicle/" + id,
                    data: {},
                    cache: false,
                    contentType: 'json',

                    success: (data) => {

                         if ($.isEmptyObject(data.error)) {
                              viewMore(data);
                         } else {
                              alert(data.error);
                         }

                    },

                    error: (data) => {
                         if(data.status == 401){
                              alert('Please login to continue !');
                              location.href='/login';
                         }
                    }
               });

          });

          

     </script>



</body>

</html>