<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>

html {
  padding: 1%;
}

</style>
<?php

$csv = array_map('str_getcsv', file('data.csv')); 
//print_r($csv);

echo "<table class='table table-bordered'>";
echo '
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Data</th>
      <th scope="col">Musika Ikasketak</th>
      <th scope="col">Izen abizena</th>
      <th scope="col">Klasea</th>
      <th scope="col">Sexua</th>
      <th scope="col">Ondo</th>
      <th scope="col">Ondo E</th>
      <th scope="col">Sil 1</th>
      <th scope="col">Sil 2</th>
      <th scope="col">Sil 3</th>
      <th scope="col">Sil 4</th>
      <th scope="col">Sil 5</th>
      <th scope="col">Sil 6</th>
      <th scope="col">Sil 7</th>
      <th scope="col">Ondo 1</th>
      <th scope="col">Ondo 2</th>
      <th scope="col">Ondo 3</th>
      <th scope="col">Ondo 4</th>
      <th scope="col">Ondo 5</th>
      <th scope="col">Ondo 6</th>
      <th scope="col">Ondo 7</th>
      <th scope="col">Sil 8</th>
      <th scope="col">Sil 9</th>
      <th scope="col">Sil 10</th>
      <th scope="col">Sil 11</th>
      <th scope="col">Sil 12</th>
      <th scope="col">Sil 13</th>
      <th scope="col">Sil 14</th>
      <th scope="col">Ondo 8</th>
      <th scope="col">Ondo 9</th>
      <th scope="col">Ondo 10</th>
      <th scope="col">Ondo 11</th>
      <th scope="col">Ondo 12</th>
      <th scope="col">Ondo 13</th>
      <th scope="col">Ondo 14</th>
    </tr>
  </thead>
';

echo "<tbody>";

$i = 0;
foreach ($csv as $line) {
  echo "<tr>";
  echo "<th scope='row'>$i</th>";
  foreach ($line as $item) {
     echo "<td>$item</td>";
  }
  echo "</tr>";
  $i++;
}

echo "</tbody>";
echo "</table>";

?>
