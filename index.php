<?php
include('functions.php');

if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="assets/vendor/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Graduate&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">

</head>

<body>
<?php include('nav_user.php') ?>
  
  <h1>Home page</h1>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script type="text/javascript" src="assets/vendor/js/mdb.min.js"></script>

<?php 

$sql = "SELECT SUM(places_reservees) as nombre_inscrit, planning.lieu, planning.jour_event, places_necessaires, places_necessaires - SUM(places_reservees) AS place_disponible FROM planning LEFT JOIN response_parent ON response_parent.jour_event = planning.jour_event GROUP BY planning.jour_event DESC LIMIT 4";
$sth = $db->prepare($sql);
$sth->execute();
$nextEvent = $sth->fetchAll(PDO::FETCH_ASSOC);
$nextEventReverse = array_reverse($nextEvent);
var_dump($nextEventReverse);
?>
<div class="next">

  <ul>
    <li><?php echo $nextEventReverse[0]['jour_event'] ;?></li>
    <li><?php echo $nextEventReverse[0]['lieu'] ;?></li>
    <li><?php echo $nextEventReverse[0]['nombre_inscrit'] ;?></li>
  </ul>
</div>
<div class="next">

  <ul>
  <li><?php echo $nextEventReverse[1]['jour_event'] ;?></li>
    <li><?php echo $nextEventReverse[1]['lieu'] ;?></li>
    <li><?php echo $nextEventReverse[1]['nombre_inscrit'] ;?></li>
  </ul>
</div>
<div class="next">

  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>
<div class="next">

  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>


</body>

</html>

