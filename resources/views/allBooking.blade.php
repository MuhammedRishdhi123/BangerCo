<!DOCTYPE html>
<html lang="en">

<head>

     <title>Banger & Co.</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="csrf-token" content="{{ csrf_token() }}">
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

     <section class="" style="background-image:url('../images/all-booking.jpg');background-repeat:no-repeat;background-size:cover;">
          <div class="container">
               <div class="text-center">
                    <h1>My Bookings</h1>


               </div>
          </div>
     </section>




     <!-- CONTACT -->
     <section>
          <div class="container">
               <div class="row">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item navtab">
                              <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true">Ongoing</a>
                         </li>
                         <li class="nav-item navtab">
                              <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false">Upcoming</a>
                         </li>
                         <li class="nav-item navtab">
                              <a class="nav-link " id="messages-tab" data-toggle="tab" href="#messages" role="tab"
                                   aria-controls="messages" aria-selected="false">Completed</a>
                         </li>

                    </ul>
                    <br>
                    @if (session()->has('success'))
                    <div class="alert alert-info">
                         {{ session('success') }}
                    </div>
                    @endif
                    @if (session()->has('invalid'))
                    <div class="alert alert-info">
                         {{ session('invalid') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                         <ul class="list-unstyled">
                              @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                              @endforeach
                         </ul>
                    </div>
                    @endif
                    <div class="tab-content">
                         <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <h2>Ongoing Bookings</h2>
                              <table class="table table-hover mb-100" >
                                   <thead class="table-header">
                                        <tr>
                                             <th scope="col"> Booking ID</th>
                                             <th scope="col">Vehicle Info</th>
                                             <th scope="col">Pickup</th>
                                             <th scope="col">Droppoff</th>
                                             <th scope="col">Pickup date</th>
                                             <th scope="col">Droppoff date</th>
                                             <th scope="col">Additional Equipments</th>
                                             <th scope="col">Date</th>
                                             <th scope="col">Status</th>
                                             <th scope="col"></th>
                                             
                                        </tr>
                                   </thead>
                                   @isset($bookings)
                                   <tbody>
                                        @foreach($bookings as $booking)
                                        @if($booking->status=='p')
                                        <?php $vehicleInfo=App\Vehicle::find($booking->BookingDetail['vehicle_id']) ?>
                                        <tr>
                                             <td>{{$booking->id}}</td>
                                             <td>{{$vehicleInfo->model}}<br><b>Plate No :</b>{{$vehicleInfo->plateNo}}
                                             </td>
                                             <td>{{$booking->BookingDetail['pickupLoc']}}</td>
                                             <td>{{$booking->BookingDetail['dropoffLoc']}}</td>
                                             <td>{{$booking->BookingDetail['pickupDate']}}</td>
                                             <td>{{$booking->BookingDetail['dropoffDate']}}</td>
                                             <td>
                                                  <?php $count=1;?>
                                                  @foreach($booking->bookingAdditionalEquip as $ae)

                                                  {{$count}}. {{App\AdditionalEquip::find($ae->additionalEquip_id)->itemName}}
                                                  <?php $count++; ?>
                                                  <br>

                                                  @endforeach
                                             </td>
                                             <td>{{$booking->bookingDate}}</td>
                                             <td> @if($booking->status=='p')
                                                  In-progress
                                                  @endif</td>
                                             <td>
                                                  @if($booking->BookingDetail['extend']==0)
                                                  <button type="button" class="btn btn-info"
                                                       onclick="extend({{$booking->id}})" id="extend{{$booking->id}}" name="extend">Extend</button>
                                                  @elseif($booking->BookingDetail['extend']>0)
                                                  <button type="button" class="btn btn-info"
                                                       onclick="extend({{$booking->id}})" name="extend" disabled>Extended</button>
                                                  @endif

                                             </td>
                                             
                                        </tr>
                                        @endif
                                        @endforeach
                                   </tbody>
                                   @endisset
                              </table>
                             
                         </div>

                         <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <h2>Upcoming Bookings</h2>
                              <table class="table table-hover mb-100" id="editable1">
                                   <thead class="table-header">
                                        <tr>
                                             <th scope="col">Booking ID</th>
                                             <th scope="col">Vehicle Info</th>
                                             <th scope="col">Pickup</th>
                                             <th scope="col">Droppoff</th>
                                             <th scope="col">Pickup date</th>
                                             <th scope="col">Droppoff date</th>
                                             <th scope="col">Additional Equipments</th>
                                             <th scope="col">Date</th>
                                             <th scope="col">Status</th>
                                             <th scope="col"></th>
                                        </tr>
                                   </thead>
                                   @isset($bookings)
                                   <tbody>
                                        @foreach($bookings as $booking)
                                        @if($booking->status=='a' || $booking->status=='i')
                                        <?php $vehicleInfo=App\Vehicle::find($booking->BookingDetail['vehicle_id']) ?>
                                        <tr>
                                             <td>{{$booking->id}}</td>
                                             <td>{{$vehicleInfo->model}}<br><b>Plate No :</b>{{$vehicleInfo->plateNo}}
                                             </td>
                                             <td>{{$booking->BookingDetail['pickupLoc']}}</td>
                                             <td>{{$booking->BookingDetail['dropoffLoc']}}</td>
                                             <td>{{$booking->BookingDetail['pickupDate']}}</td>
                                             <td>{{$booking->BookingDetail['dropoffDate']}}</td>
                                             <td>
                                                  <?php $count=1;?>
                                                  @foreach($booking->bookingAdditionalEquip as $ae)

                                                  {{$count}}. {{App\AdditionalEquip::find($ae->additionalEquip_id)->itemName}}
                                                  <?php $count++; ?>
                                                  <br>

                                                  @endforeach
                                             </td>
                                             <td>{{$booking->bookingDate}}</td>
                                             <td> @if($booking->status=='i')
                                                  Pending
                                                  @elseif($booking->status=='a')
                                                  Accepted

                                                  @endif</td>
                                             <td><button type="button" class="btn btn-info"
                                                       onclick="update({{$booking->id}})" name="update">Update</button>
                                             </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                   </tbody>
                                   @endisset
                              </table>

                         </div>

                         <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                              <h2>Completed Bookings</h2>
                              <table class="table table-hover mb-100">
                                   <thead class="table-header">
                                        <tr>
                                             <th scope="col">Booking ID</th>
                                             <th scope="col">Vehicle Info</th>
                                             <th scope="col">Pickup</th>
                                             <th scope="col">Droppoff</th>
                                             <th scope="col">Pickup date</th>
                                             <th scope="col">Droppoff date</th>
                                             <th scope="col">Additional Equipments</th>
                                             <th scope="col">Date</th>
                                             <th scope="col">Status</th>
                                        </tr>
                                   </thead>
                                   @isset($bookings)
                                   <tbody>
                                        @foreach($bookings as $booking)
                                        @if($booking->status=='c' || $booking->status=='f')
                                        <?php $vehicleInfo=App\Vehicle::find($booking->BookingDetail['vehicle_id']) ?>
                                        <tr>
                                             <td>{{$booking->id}}</td>
                                             <td>{{$vehicleInfo->model}}<br><b>Plate No :</b>{{$vehicleInfo->plateNo}}
                                             </td>
                                             <td>{{$booking->BookingDetail['pickupLoc']}}</td>
                                             <td>{{$booking->BookingDetail['dropoffLoc']}}</td>
                                             <td>{{$booking->BookingDetail['pickupDate']}}</td>
                                             <td>{{$booking->BookingDetail['dropoffDate']}}</td>
                                             <td>
                                                  <?php $count=1;?>
                                                  @foreach($booking->bookingAdditionalEquip as $ae)
          
                                                  {{$count}}. {{App\AdditionalEquip::find($ae->additionalEquip_id)->itemName}}
                                                  <?php $count++; ?>
                                                  <br>
          
                                                  @endforeach
                                             </td>
                                             <td>{{$booking->bookingDate}}</td>
                                             <td>
                                                  @if($booking->status=='c')
                                                  Cancelled
                                                  @elseif($booking->status=='f')
                                                  Completed
                                                  @endif</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                   </tbody>
                                   @endisset
                              </table>

                         </div>
                    </div>
               </div>
          </div>
         
     </section>

     <div id="booking" class="modal">

          <!-- Modal content -->
          <div class="modal-content booking">
               <div class="form-head">
                    <h3 class='head'>Update booking</h3>
               </div>
               <span class="close" title="Cancel">&times;</span>

               <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
               </div>
               <div class="row">

                    <div class="col-md-12">

                         <form action="/bookingUpdate" method="POST">
                              {{ csrf_field() }}

                              <input type="hidden" name="bookingId" id="bookingId">
                              <div class="form-group col-md-6">
                                   <label for="location">Pickup location</label>
                                   <input type="text" class="form-control" name="picklocation" id="picklocation"
                                        placeholder="Colombo" required>
                              </div>

                              <div class="form-group col-md-6">
                                   <label for="location">Dropoff location</label>
                                   <input type="text" class="form-control" name="droplocation" id="droplocation"
                                        placeholder="Colombo" required>
                              </div>

                              <div class="form-group col-md-12">
                                   <label for="input">Additional Equipments</label>

                                   <select multiple name="additionalEquip[]" id="additionalEquips" class="form-control">
                                   </select>
                              </div>

                              <input class="btn btn-primary" type="submit" id="formadd" value="Update"
                                   style="margin-top:15px;margin-right:25px;">
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
     <script src="js/jquery.tabledit.min.js"></script>
     <script>

          $(document).ready(function () {
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });


          });

          var modal = document.getElementById("booking");
          var span = document.getElementsByClassName("close")[0];

          function update(bookingId) {
               modal.style.display = "block";
               $("#bookingId").attr('value', bookingId);

               $.ajax({
                    type: 'GET',
                    url: "/getAdditionalEquips",
                    data: {},
                    cache: false,
                    contentType: 'json',

                    success: (data) => {

                         if ($.isEmptyObject(data.error)) {
                              if (data.additionalEquips.length > 0) {
                                   var options = "<option value='' disabled>Choose any addons</option>";

                                   for (var i = 0; i < data.additionalEquips.length; i++) {

                                        options += "<option value='" + data.additionalEquips[i].id + "'>" + data.additionalEquips[i].itemName + "</options>";
                                   }
                              }
                              else {
                                   options += "<option value='' disabled>No addons are available</options>";
                              }

                              $('#additionalEquips').html(options);

                         } else {
                              alert(data.error);
                         }

                    }
               });

          }

          span.onclick = function () {
               modal.style.display = "none";
          }

          window.onclick = function (event) {
               if (event.target == modal) {
                    modal.style.display = "none";
               }
          }

          function extend(bookingId)
          {
               $.ajax({
                    type: 'GET',
                    url: "/extendBooking",
                    data: {bookingId:bookingId},
                    cache: false,
                    contentType: 'json',

                    success: (data) => {

                         if (data.result) {
                             alert(data.result);
                             $('#extend'+bookingId).text('Extended').prop('disabled',true).fadeIn();
                         }
                         else{
                              alert(data.error);
                         }

                    }
               });
          }


     </script>

</body>

</html>