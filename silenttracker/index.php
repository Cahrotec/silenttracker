<!DOCTYPE html>
<?php
include_once "./config/config.php";
 ?>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="./includes/css/main.css">
<link rel="stylesheet" href="./includes/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link href="https://fonts.googleapis.com/css?family=Hind+Madurai" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>


 <body>
   <!-- Top Nav Bar -->

       <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> -->


              <div class="navbar-header">
                  <a class="navbar-brand" rel="home" href="/silenttracker/index.php">
                      <img style="max-width:140px; margin-top: 0px;"
                           src="/silenttracker/images/logo.png">
                  </a>
              </div>

  <a class="navbar-brand" href="#">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Health <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Security</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Plans</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Traffic</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Track
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Track Group</a>
          <a class="dropdown-item" href="#">Track Person</a>
          <a class="dropdown-item" href="#">Track All</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<?php
$sql = "SELECT * FROM child WHERE health = '1'";
$q = $conn->query($sql);



 ?>
 <style>
        /* Set the size of the div element that contains the map */
       #map {
         height: 400px;  /* The height is 400 pixels */
         width: 100%;  /* The width is the width of the web page */
        }
     </style>

     <div class="container">
       <!-- <div class="fluid"> -->
         <div class="row">
           <div class="col-md-6">
     <h3>View Map</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 21.413211, lng: 39.893880};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 14, center: uluru, mapTypeId: 'satellite'});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
  var kmlLayer = new google.maps.KmlLayer();
  var src = '/silenttracker/plans/mena12345.kml';
var kmlLayer = new google.maps.KmlLayer(src, {
  suppressInfoWindows: true,
  preserveViewport: false,
  map: map
});

}
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGrk0IfJUMyppYFuuMdYcHVtbUlAn-Ohg
&callback=initMap">
    </script>
</div>

          <div class="col-md-6">
            <h2> Health Monitor </h2><br>

            <table class="table table-stribed">
              <thead>
                <tr>
                  <th scope="col">ID</th>

                  <th scope="col">Name</th>
                  <th scope="col">Location</th>
                </tr>
              </thead>
              <?php while($result = mysqli_fetch_assoc($q)) { ?>

              <tr>
                <td> <?= $result['id']; ?> </td>
                <td>  <?= $result['name']; ?> </td>
                <?php if ($result['nmid'] == 0) {
                  $sql2 = "SELECT * FROM mothers WHERE id = {$result['mid']}";
                }else {
                  $sql2 = "SELECT * FROM mothers WHERE id = {$result['nmid']}";
                }

                $q2 = $conn->query($sql2);
                $result2 = mysqli_fetch_assoc($q2);
                ?>

                <td> <a href="https://www.google.com/maps/search/?api=1&query=<?=$result2['lat'];?>,<?=$result2['lon'];?>" class="btn btn-sm btn-success" role="button">Map</a>
              </tr>
            <?php } ; ?>
            </table>
            <?php
            $sql = "SELECT * FROM mothers";
            $q = $conn->query($sql);
            while($result = mysqli_fetch_assoc($q)) {
              // TODO: plot crawd on map

            }?>

        </div>
      </div>
    </div>
  </div>


</body>

</html>
