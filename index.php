<?php
include('dump.php');
session_start();
//ddo($_SESSION);
$dataFlight = $_SESSION['response'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Flight-API TESTING</title>
</head>
<body>
<div class="container">
<h1>Search Flight - Using API REST</h1>
<h2>Example of flights for testing</h2>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name of the airport</th>
      <th scope="col">iata</th>
      <th scope="col">icao</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Lyon</td>
      <td>LYN</td>
      <td>LFLY</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Birmingham</td>
      <td>BHX</td>
      <td>EGBB</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Casablanca</td>
      <td>CAS</td>
      <td>GMMC</td>
    </tr>
  </tbody>
</table>
<form class="row g-3 mt-3" method="POST" action="api-connexion.php" >
  <div class="col-md-6">
    <label for="iata" class="form-label">IATA</label>
    <input type="text" class="form-control" id="iata" name="iata">
  </div>
  <div class="col-md-6">
    <label for="icao" class="form-label">ICAO</label>
    <input type="text" class="form-control" id="icao" name="icao">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">SEARCH</button>
  </div>
</form>
<table class="table caption-top mt-5">
  <caption>INFORMATIONS ABOUT THE FLIGHT</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Airport Name</th>
      <th scope="col">Location</th>
      <th scope="col">Country</th>
      <th scope="col">Postal code</th>
      <th scope="col">Website</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?= $dataFlight->id; ?></th>
      <td><?= $dataFlight->name; ?></td>
      <td><?= $dataFlight->location; ?></td>
      <td><?= $dataFlight->country; ?></td>
      <td><?php echo (($dataFlight->postal_code) ?: 'No postcode'); ?></td>
      <td><?php echo (($dataFlight->website) ?: 'No website'); ?></td>
    </tr>
  </tbody>
</table>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>