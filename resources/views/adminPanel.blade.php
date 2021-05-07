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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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

     <section class="admin-background">
          <div class="container">
               <div class="text-center">
                    <h1>Dashboard</h1>

               </div>
          </div>
     </section>

     <section class="section-background">
          <div class="container">
               <div class="row">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                         <li class="nav-item navtab">
                              <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="home" aria-selected="true"><i class="fa fa-car"></i>Manage
                                   Vehicles</a>
                         </li>
                         <li class="nav-item navtab">
                              <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile" aria-selected="false"><i class="fa fa-users"></i>&nbsp Manage
                                   Users</a>
                         </li>
                         <li class="nav-item navtab">
                              <a class="nav-link " id="messages-tab" data-toggle="tab" href="#messages" role="tab"
                                   aria-controls="messages" aria-selected="false"><i class="fa fa-calendar"></i> Manage
                                   Bookings </a>
                         </li>
                         <li class="nav-item navtab">
                              <a class="nav-link " id="settings-tab" data-toggle="tab" href="#settings" role="tab"
                                   aria-controls="settings" aria-selected="false"><i class="fa fa-cogs"></i>&nbsp Manage
                                   Offers</a>
                         </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                         <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                              <div class="container">
                                   <div class="row">
                                        <div class="col-md-12 table-area">
                                             <table class="table table-hover" id="editable">
                                                  @csrf
                                                  <thead class="table-header">
                                                       <tr>
                                                            <th scope="col">No.</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Model</th>
                                                            <th scope="col">Brand</th>
                                                            <th scope="col">Color</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Plate No</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Minimum age</th>
                                                            <th scope="col">Rate($)</th>

                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @if(isset($vehicles))
                                                       @foreach($vehicles as $vehicle)
                                                       <tr class="vehicle-row">

                                                            <td scope="row">{{$vehicle->id}}</td>
                                                            <td class="w-25"><img
                                                                      src="vehicle/image/{{$vehicle->imageUrl}}" alt=""
                                                                      height="50" width="50"></td>
                                                            <td>{{$vehicle->model}}</td>
                                                            <td>{{$vehicle->brand}}</td>
                                                            <td>{{$vehicle->color}}</td>
                                                            <td>{{$vehicle->desc}}</td>
                                                            <td>{{$vehicle->plateNo}}</td>
                                                            <td>{{$vehicle->status}}</td>
                                                            <td>{{$vehicle->ageLimit}}</td>
                                                            <td>{{$vehicle->VehicleRate['rate']}}</td>

                                                       </tr>
                                                       @endforeach

                                                       @endif

                                                  </tbody>
                                             </table>

                                        </div>
                                        <button type="button" class="btn btn-primary btn-lg btn-block" id="addbtn">Add a
                                             vehicle</button>
                                        <button type="button" class="btn btn-info btn-small"
                                             id="checkprice">Check Competitor prices</button>
                                        <!-- The Modal -->
                                        <div id="addVehicleForm" class="modal">

                                             <!-- Modal content -->
                                             <div class="modal-content">
                                                  <span class="close">&times;</span>
                                                  <form id="addVehicle" enctype="multipart/form-data" method="POST">
                                                       <div class="alert alert-danger print-error-msg"
                                                            style="display:none">
                                                            <ul></ul>
                                                       </div>
                                                       {{ csrf_field() }}
                                                       <div class="form-row">
                                                            <div class="form-group">
                                                                 <label for="model">Model</label>
                                                                 <input type="text" class="form-control" id="model"
                                                                      name="model" placeholder="Model" required>
                                                            </div>
                                                            <div class="form-group">
                                                                 <label for="inputBrand">Brand</label>
                                                                 <select id="inputBrand" class="form-control"
                                                                      name="brand">
                                                                      <option selected>Choose...</option>
                                                                      <option value="benz">Benz</option>
                                                                      <option value="bmw">BMW</option>
                                                                      <option value="porshe">Porshe</option>
                                                                      <option value="ferarri">Ferarri</option>
                                                                      <option value="toyota">Toyota</option>
                                                                      <option value="honda">Honda</option>
                                                                      <option value="honda">Rolls Royce</option>
                                                                      <option value="honda">Bentley</option>
                                                                      <option value="honda">Tesla</option>
                                                                      <option value="hyundai">Hyundai</option>
                                                                      <option value="landrover">Land Rover</option>
                                                                 </select>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                 <label for="inputDesc">Description</label>
                                                                 <input type="text" class="form-control" id="inputDesc"
                                                                      name="desc"
                                                                      placeholder="Four wheel drive, Power steering"
                                                                      required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <label for="inputColor">Choose Color</label>
                                                                 <input type="color" id="inputColor" name="color"
                                                                      class="color-picker">
                                                            </div>

                                                            <div class="form-group">
                                                                 <label for="plate">Plate No</label>
                                                                 <input type="text" class="form-control" id="plate"
                                                                      name="plateNo" placeholder="Model" required>
                                                            </div>
                                                            <div class="form-group">
                                                                 <label for="plate">Status</label>
                                                                 &nbsp;&nbsp;
                                                                 <div class="btn-group btn-group-toggle"
                                                                      data-toggle="buttons">

                                                                      <label class="btn btn-secondary active">
                                                                           <input type="radio" name="status"
                                                                                id="option1" autocomplete="off"
                                                                                value="off"> Unavailable
                                                                      </label>
                                                                      <label class="btn btn-secondary">
                                                                           <input type="radio" name="status"
                                                                                id="option2" autocomplete="off"
                                                                                value="on"> Available
                                                                      </label>

                                                                 </div>
                                                            </div>
                                                            <div class="form-group">
                                                                 <div class="custom-file">

                                                                      <label class="custom-file-label"
                                                                           for="validatedCustomFile">Select vehicle
                                                                           image</label>
                                                                      <input type="file"
                                                                           class="custom-file-input form-control"
                                                                           name="image" id="validatedCustomFile"
                                                                           required>
                                                                      <div class="invalid-feedback"></div>
                                                                 </div>
                                                            </div>

                                                            <div class="form-group">
                                                                 <label for="age">Minimum age</label>
                                                                 <input type="number" class="form-control" id="age"
                                                                      name="ageLimit" placeholder="25" required>
                                                            </div>

                                                            <div class="form-group">
                                                                 <label for="price">Price per day</label>
                                                                 <input type="number" class="form-control" id="price"
                                                                      name="price" placeholder="$" required>
                                                            </div>

                                                            <input class="btn btn-primary" type="submit" id="formadd"
                                                                 value="Add">
                                                       </div>
                                                  </form>
                                             </div>

                                        </div>

                                             <!-- The Modal -->
                                             <div id="pricecompare" class="modal" >

                                                  <!-- Modal content -->
                                                  <div class="modal-content">
                                                       <span class="close2">&times;</span>
                                                      
                                                            <div class="alert alert-danger print-error-msg"
                                                                 style="display:none">
                                                                 <ul></ul>
                                                            </div>
                                                          <table class="prices table-responsive">
                                                               <thead>
                                                                    <tr>
                                                                         <th style="min-width:300px;">Vehicle Name</th>
                                                                         <th style="min-width:100px;">Monthly rate</th>
                                                                         <th style="min-width:100px;">Weekly rate</th>
                                                                         <th style="min-width:100px;">M-Per-KM</th>
                                                                    </tr>
                                                               </thead>
                                                               <tbody>
                                                               </tbody>
                                                          </table>
                                                     
                                                     
                                                  </div>
     
                                             </div>
                                        

                                   </div>
                              </div>
                         </div>

                         <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                              <div class="container">
                                   <div class="row">
                                        <div class="col-md-12 table-area">
                                             <table class="table table-hover" id="editable1">
                                                  @csrf
                                                  <thead class="table-header">
                                                       <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">DOB</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Mobile</th>

                                                            <th scope="col">Status</th>
                                                            <th scope="col">Documents</th>
                                                            <th scope="col"></th>


                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @if(isset($users))
                                                       @foreach($users as $user)
                                                       <tr class="vehicle-row">


                                                            <td class="w-25"><img
                                                                      src="user/profile/image/{{$user->imgLoc}}" alt=""
                                                                      height="50" width="50"></td>
                                                            <td>{{$user->id}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->dob}}</td>
                                                            <td>{{$user->address}}</td>
                                                            <td>{{$user->mobile}}</td>
                                                            <td>
                                                                 @if($user->status=="a")
                                                                 Active
                                                                 @elseif($user->status=="i")
                                                                 Inactive
                                                                 @elseif($user->status=='b')
                                                                 Blacklisted
                                                                 @endif
                                                            </td>
                                                            <td>
                                                                 <input type="hidden" id="{{$user->id}}doc1"
                                                                      value="{{$user->UserDocument['drivingLicense']}}">
                                                                 <input type="hidden" id="{{$user->id}}doc2"
                                                                      value="{{$user->UserDocument['identityProof']}}">
                                                                 <button class="open btn btn-primary"
                                                                      id="{{$user->id}}">View</button>
                                                            </td>

                                                       </tr>
                                                       @endforeach

                                                       @endif

                                                  </tbody>
                                             </table>

                                        </div>


                                   </div>

                              </div>

                              <div class="popup-overlay">
                                   <!--Creates the popup content-->
                                   <span class="close">&times;</span>
                                   <div class="popup-content">
                                        <div class="drivingLicense">
                                             <h2>Driving License</h2>
                                             <img src="" class="licenseImg" height="200" alt="">
                                        </div>
                                        <div class="identity">
                                             <h2>Proof Document</h2>
                                             <img src="" class="identityImg" height="200" alt="">
                                        </div>



                                   </div>
                              </div>



                         </div>

                         <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                              <div class="container">
                                   <div class="row">
                                        <div class="col-md-12 table-area">
                                             <table class="table table-hover" id="editable2">
                                                  @csrf
                                                  <thead class="table-header">
                                                       <tr>

                                                            <th scope="col">ID</th>
                                                            <th scope="col">Customer name</th>
                                                            <th scope="col">Vehicle Model</th>
                                                            <th scope="col">Pickup</th>
                                                            <th scope="col">Dropoff</th>
                                                            <th scope="col">Pickup date</th>

                                                            <th scope="col">Dropoff date</th>
                                                            <th scope="col">Additional Equipments</th>
                                                            <th scope="col">Status</th>


                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @if(isset($bookings))
                                                       @foreach($bookings as $booking)
                                                       <tr class="vehicle-row">



                                                            <td>{{$booking->id}}</td>
                                                            <td>{{App\User::find($booking->user_id)->name}}</td>
                                                            <td>{{App\Vehicle::find($booking->BookingDetail['vehicle_id'])->model}}
                                                            </td>
                                                            <td>{{$booking->BookingDetail['pickupLoc']}}</td>
                                                            <td>{{$booking->BookingDetail['dropoffLoc']}}</td>
                                                            <td>{{$booking->BookingDetail['pickupDate']}}</td>
                                                            <td>{{$booking->BookingDetail['dropoffDate']}}</td>
                                                            <td>
                                                                 <?php $count=1;?>
                                                                 @foreach($booking->bookingAdditionalEquip as $ae)

                                                                 {{$count}}.
                                                                 {{App\AdditionalEquip::find($ae->additionalEquip_id)->itemName}}
                                                                 <?php $count++?>
                                                                 <br>

                                                                 @endforeach

                                                            </td>
                                                            <td>
                                                                 @if($booking->status=='i')
                                                                 Pending
                                                                 @elseif($booking->status=='a')
                                                                 Accepted
                                                                 @elseif($booking->status=='c')
                                                                 Cancelled
                                                                 @elseif($booking->status=='p')
                                                                 In-progress
                                                                 @elseif($booking->status=='f')
                                                                 Completed
                                                                 @endif
                                                            </td>


                                                       </tr>
                                                       @endforeach

                                                       @endif

                                                  </tbody>
                                             </table>

                                        </div>


                                   </div>

                              </div>
                         </div>
                         <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                              <div class="container">
                                   <div class="row">
                                        <div class="col-md-12 table-area">
                                             <table class="table table-hover" id="editable3">
                                                  @csrf
                                                  <thead class="table-header">
                                                       <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Description</th>

                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @if(isset($offers))
                                                       @foreach($offers as $offer)
                                                       <tr class="vehicle-row">

                                                            <td scope="row">{{$offer->id}}</td>
                                                            <td class="w-25" scope="row"><img
                                                                      src="offer/image/{{$offer->imgLoc}}" alt=""
                                                                      height="50" width="50"></td>
                                                            <td scope="row">{{$offer->title}}</td>
                                                            <td scope="row">{{$offer->description}}</td>

                                                       </tr>
                                                       @endforeach

                                                       @endif

                                                  </tbody>
                                             </table>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-lg btn-block"
                                             id="offeraddbtn">Add offer</button>

                                        <!-- The Modal -->
                                        <div id="addOfferForm" class="modal">

                                             <!-- Modal content -->
                                             <div class="modal-content">
                                                  <span class="close1">&times;</span>
                                                  <form id="addOffer" enctype="multipart/form-data" method="POST">
                                                       <div class="alert alert-danger print-error-msg"
                                                            style="display:none">
                                                            <ul></ul>
                                                       </div>
                                                       {{ csrf_field() }}
                                                       <div class="form-row">
                                                            <div class="form-group">
                                                                 <label for="title">Title</label>
                                                                 <input type="text" class="form-control" id="title"
                                                                      name="title" placeholder="Title" required>
                                                            </div>

                                                            <br>
                                                            <div class="form-group">
                                                                 <label for="description">Description</label>
                                                                 <input type="text" class="form-control"
                                                                      id="description" name="description"
                                                                      placeholder="Offer details" required>
                                                            </div>


                                                            <div class="form-group">
                                                                 <div class="custom-file">

                                                                      <label class="custom-file-label"
                                                                           for="validatedCustomFile">Select offer
                                                                           image</label>
                                                                      <input type="file"
                                                                           class="custom-file-input form-control"
                                                                           name="image" id="validatedCustomFile"
                                                                           required>
                                                                      <div class="invalid-feedback"></div>
                                                                 </div>
                                                            </div>


                                                            <input class="btn btn-primary" type="submit"
                                                                 id="formaddoffer" value="Add">
                                                       </div>
                                                  </form>
                                             </div>

                                        </div>

                                   </div>
                              </div>
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
     <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

     <script>
          // Get the modal
          var modal = document.getElementById("addVehicleForm");
          var modal1 = document.getElementById("addOfferForm");
          var modal2 = document.getElementById("pricecompare");

          // Get the button that opens the modal
          var btn = document.getElementById("addbtn");
          var offeraddbtn = document.getElementById("offeraddbtn");
          var checkpricebtn = document.getElementById("checkprice");

          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];
          var span1 = document.getElementsByClassName("close1")[0];
          var span2 = document.getElementsByClassName("close2")[0];

          // When the user clicks the button, open the modal 
          btn.onclick = function () {

               modal.style.visibility = "visible";
               modal.style.display = "block";
          }

          offeraddbtn.onclick = function () {
               modal1.style.visibility = "visible";
               modal1.style.display = "block";
          }
          checkpricebtn.onclick = function () {
               modal2.style.visibility = "visible";
               modal2.style.display = "block";
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });


               $.ajax({
                    type: 'GET',
                    url: "/scrape",
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                         var i;
                         for(i=0;i<data.length;i++){
                              if(typeof data[i].name != 'undefined'){
                                   $('.prices tbody').append('<tr>'+'<td>'+data[i].name+'</td>'+'<td>'+data[i].monthly+'</td>'+'<td>'+data[i].weekly+'</td>'+'<td>'+data[i].millage+'</td>'+'</tr>');
                              }
                         }
                        
                    }
               });


          //      var table = $('.prices').DataTable({
          //      ajax: "/scrape",
          //      searching: false,
          //      paging:false,
          //      dataSrc: "data.json",
          //      columns: [
          //           {data: 'name', name: 'name'},
          //           {data: 'monthly', name: 'monthly'},
          //           {data: 'weekly', name: 'weekly'},
          //           {data: 'millage', name: 'millage'},
                    
          //      ]
          // });

          
          }

          // When the user clicks on <span> (x), close the modal
          span.onclick = function () {
               modal.style.visibility = "hidden";
               modal.style.display = "none";

          }

          span1.onclick = function () {
               modal1.style.visibility = "hidden";
               modal1.style.display = "none";
          }

          span2.onclick = function () {
               modal2.style.visibility = "hidden";
               modal2.style.display = "none";
          }

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function (event) {
               if (event.target == modal) {
                    modal.style.visibility = "hidden";
                    modal.style.display = "none";
               } else if (event.target == modal1) {
                    modal1.style.visibility = "hidden";
                    modal1.style.display = "none";
               } else if (event.target == modal2) {
                    modal2.style.visibility = "hidden";
                    modal2.style.display = "none";
               }

          }

          //Adding vehicle function
          $("#addVehicle").on('submit', function (event) {
               event.preventDefault();
               // var formData = new FormData(this);
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });

               var formData = new FormData(document.getElementById('addVehicle'));
               $.ajax({
                    type: 'POST',
                    url: "/addVehicle",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {

                         if ($.isEmptyObject(data.error)) {
                              document.getElementById('addVehicle').reset();
                              document.getElementsByClassName("close")[0].click();
                              alert(data);
                         } else {
                              printErrorMsg(data.error);
                         }

                    }
               });

          });


          //Adding offer function
          $("#addOffer").on('submit', function (event) {
               event.preventDefault();
               // var formData = new FormData(this);
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });

               var formData = new FormData(document.getElementById('addOffer'));
               $.ajax({
                    type: 'POST',
                    url: "/addOffer",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {

                         if ($.isEmptyObject(data.error)) {
                              document.getElementById('addOffer').reset();
                              document.getElementsByClassName("close1")[0].click();
                              alert(data);
                         } else {
                              printErrorMsg(data.error);
                         }

                    }
               });

          });


          function printErrorMsg(msg) {
               $(".print-error-msg").find("ul").html('');
               $(".print-error-msg").css('display', 'block');
               $.each(msg, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
               });
          }


          $(document).ready(function () {
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               });
               //Vehicle table
               $('#editable').Tabledit({
                    url: '{{route("vehicleAction")}}',
                    dataType: "json",
                    type: 'POST',
                    columns: {
                         identifier: [0, 'id'],
                         editable: [[2, 'model'], [3, 'brand'], [4, 'color'], [5, 'desc'], [6, 'plateNo'], [7, 'status', '{"on":"on","off":"off"}'], [8, 'ageLimit'], [9, 'rate']]
                    },
                    restoreButton: false,
                    onSuccess: function (data, textStatus, jqXHR) {
                         if (data.action == 'delete') {
                              $('#' + data.id).remove();
                         }
                    }

               });


               //Users table
               $('#editable1').Tabledit({
                    url: '{{route("userAction")}}',
                    dataType: "json",
                    type: 'POST',
                    columns: {
                         identifier: [1, 'id'],
                         editable: [[7, 'status', '{"a":"Active","i":"Inactive"}']]
                    },
                    restoreButton: false,
                    onSuccess: function (data, textStatus, jqXHR) {
                         if (data.action == 'delete') {
                              $('#' + data.id).remove();
                         }
                    }

               });

               // Bookings table

               $('#editable2').Tabledit({
                    url: '{{route("bookingAction")}}',
                    dataType: "json",
                    type: 'POST',
                    columns: {
                         identifier: [0, 'id'],
                         editable: [[8, 'status', '{"a":"Accept","p":"Progressing","c":"Reject","f":"Completed"}']]
                    },
                    restoreButton: false,
                    onSuccess: function (data, textStatus, jqXHR) {
                         if (data.action == 'delete') {
                              $('#' + data.id).remove();
                         }
                         else if (data == 'FRAUD') {
                              alert('User has got fraudalent claims !');
                         }
                    }

               });

               //Offers table
               $('#editable3').Tabledit({
                    url: '{{route("offerAction")}}',
                    dataType: "json",
                    type: 'POST',
                    columns: {
                         identifier: [0, 'id'],
                         editable: [[2, 'title'], [3, 'description']]
                    },
                    restoreButton: false,
                    onSuccess: function (data, textStatus, jqXHR) {
                         if (data.action == 'delete') {
                              $('#' + data.id).remove();
                         }
                    }

               });

               $(document).keydown(function (event) {
                    if (event.keyCode == 27) {
                         modal.style.display = "none";
                         modal.style.visibility = "hidden";
                         modal1.style.display = "none";
                         modal1.style.visibility = "hidden";
                    }
               });

          });



          //Display of user documents


          $(".open").on("click", function (e) {
               $userid = e.target.id;
               $('.licenseImg').attr('src', "user/profile/document/" + $("#" + $userid + "doc1").val());
               $('.identityImg').attr('src', "user/profile/document/" + $("#" + $userid + "doc2").val());
               $(".popup-overlay, .popup-content").addClass("active").fadeIn("slow");
          });

          //removes the "active" class to .popup and .popup-content when the "Close" button is clicked 
          $(".close, .popup-overlay").on("click", function () {
               $(".popup-overlay, .popup-content").removeClass("active").fadeOut("slow");
          });

     </script>

</body>

</html>