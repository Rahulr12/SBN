<?
include ("classes/initial.php");
include ("classes/config.inc.php");
include ("classes/Database.class.php");
include ("classes/functions.php");
include ("classes/Session.class.php");
$sitesession = new Session();
$sitesession->Session();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:description" content="Create your SBN Account for Free!">
    <meta name="description" content="Create your SBN Account for Free!">
    <title>Edit your profile : SBN</title>
    <? include("includes/style.php"); ?>
  </head>
  <!-- fiddle try -->
  <!-- jsfiddle apikey : AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk -->
  <!-- Vivek apikey : AIzaSyBnzedToDdeq9Ax0F2DyjmUsxyG0GdeLF0 -->
  <!-- Hardik apikey : AIzaSyBy43cdR8Qwzawh762nRG3SozbNBP5R5HI -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnzedToDdeq9Ax0F2DyjmUsxyG0GdeLF0&libraries=places&callback=initAutocomplete"
        async defer></script>

<script type="text/javascript">
var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}//initAutocompleteEnds

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}//fillInAddressEnds

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {

  autocomplete = new google.maps.places.Autocomplete(
    document.getElementById('autocomplete'), {types: ['geocode']});

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
        autocomplete.setBounds(circle.getBounds());
    });
  }
}//geolocateEnds
</script>

  <body>
    <? include("includes/header.php"); ?>
    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p">
              
              <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Profile Info</a>
                  </li>
                  <li class="nav-item">
                    <!-- <a class="nav-link" href="#">Link</a> -->
                  </li>
                  <li class="nav-item">
                    <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" align="left"><label>First Name</label></th>
                      <th scope="col">
                        <input type="text" name="fistName" id="fistName" class="form-control" placeholder="Enter your first name" value="" required>
                      </th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>Last Name</label></th>
                      <th scope="col"><input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter your last name" value="" required></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>Mobile</label></th>
                      <th scope="col"><input type="text" name="mobileNumber" id="mobileNumber" class="form-control" placeholder="Enter your moblie number" minlength="10" maxlength="10" value="" required></th>
                      <th scope="col"><label for="verified">Verified</label></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>Email</label></th>
                      <th scope="col"><input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email address" value="" required></th>
                      <th scope="col"><label for="forVerification">Click to Verify</label></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>Location</label></th>
                      <th scope="col"><input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Location" onFocus="geolocate()" required></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>State</label></th>
                      <th scope="col"><input name="administrative_area_level_1" id="administrative_area_level_1" class="form-control" placeholder="State" disabled="true"></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>City</label></th>
                      <th scope="col"><input name="locality" id="locality" class="form-control" placeholder="City" disabled="true"></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>Country</label></th>
                      <th scope="col"><input name="country" id="country" class="form-control" placeholder="Country" disabled="true"></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col">Profile Pic</th>
                      <th scope="col"><input type="file" name="profilePicture" id="profilePicture" style="width: 350px"></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                    </tr>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col">Occupation</th>
                      <th scope="col"> <select name="occupation" id="occupation" style="width: 350px">
                                          <option value=""></option>
                                          <option value="BusinessOwner">Business Owner</option>
                                          <option value="Employee">Employee</option>
                                          <option value="Freelancer">Freelancer</option>
                                          <option value="Other">Other</option>
                      </select> </th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                    </tr>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col"><label>Headline</label></th>
                      <th scope="col"><input type="text" name="headline" id="headline" class="form-control" placeholder="Enter your title" value="" required></th>
                      <th scope="col"></th>
                    </tr>
                    <tr>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                      <th scope="col" style="border-bottom: 1px solid  #a1b5c0;"></th>
                    </tr>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  </table>

                <a href="#" class="btn btn-primary">Submit</a>
              </div>
              </div>

          <div class="media-body pd-y-30 pd-lg-x-50 pd-xl-x-60 align-items-center d-none d-lg-flex pos-relative">
            <div class="mx-lg-wd-500 mx-xl-wd-550">
              <img src="assets/img/img16.png" class="img-fluid" alt="">
            </div>
           
          </div><!-- media-body -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <? include("includes/footer.php"); ?>
    <? include("includes/footer-js.php"); ?>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>        
        $(document).ready(function() {
            $("#sbnform").validate({
                rules: {
                    Mobile: {
                    required: true,
                    number: true
                    }
                }
            });
        });      
    </script>    
  </body>
</html>
