<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<style>
  html {
    padding: 1%;
  }

  .hidden {
    display: none;
  }

</style>

<?php


if (isset($_POST['ans-1'])) {
  $sol1 = $_POST['ans-1'];
  $sol2 = $_POST['ans-2'];
  $answers1 = array();
  $answers2 = array();
  //echo $sol;
  for ($i = 1; $i < 8; $i++) {
    array_push($answers1, $_POST["ans$i"]);
  }

  for ($i = 8; $i < 15; $i++) {
    array_push($answers2, $_POST["ans$i"]);
  }
  
  $solutions1 = explode(" ", $sol1);
  $solutions2 = explode(" ", $sol2);

  $right1 = 0;
  $right2 = 0;
  for ($i = 0; $i < 7; $i++) {
    if ($answers1[$i] == $solutions1[$i]) {
      $right1++; 
    }

    if ($answers2[$i] == $solutions2[$i]) {
      $right2++; 
    }
  }

  setcookie("submited", 'true', time()+60*60*24*365, "/");
  $_COOKIE['submited'] = 'true';

  $date = getdate();
  $today = $date['mday']."/".$date['hours'].":".$date['minutes'].":".$date['seconds'];


  $csv_line = array();
  array_push($csv_line, $today, $_POST["musika"], $_POST["kodea"], $_POST["clasea"], $_POST["sexua"], $right1, $right2);
  for ($i = 0; $i < 7; $i++) {
    array_push($csv_line, $answers1[$i]);
  }
  for ($i = 0; $i < 7; $i++) {
    array_push($csv_line, $solutions1[$i]);
  }

  for ($i = 0; $i < 7; $i++) {
    array_push($csv_line, $answers2[$i]);
  }
  for ($i = 0; $i < 7; $i++) {
    array_push($csv_line, $solutions2[$i]);
  }
  $file = fopen("data.csv", "a");
  fputcsv($file, $csv_line);
  fclose($file);
}

?>
<?php if(!isset($_COOKIE['submited'])): ?>

<form action="/memoria/index.php" method="post" id="main-form">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Pertsona kodea:</label>
    <input type="text" name="kodea" class="form-control oinput" id="exampleInputEmail1" >
    <!--<div id="emailHelp" class="form-text">Izena Abizena</div>-->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Sexua:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexua" id="flexRadioDefault1" value="G" checked>
      <label class="form-check-label" for="sexua1">
        Gizon
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexua" id="flexRadioDefault2" value="E">
      <label class="form-check-label" for="sexua2">
        Emakume
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexua" id="flexRadioDefault2" value="N">
      <label class="form-check-label" for="sexua3">
        Ez binario 
      </label>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Musika ikasketak:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="musika" id="flexRadioDefault1" value="Bai" checked>
      <label class="form-check-label" for="musika1">
        Bai
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="musika" id="flexRadioDefault2" value="Ez">
      <label class="form-check-label" for="musika2">
        Ez
      </label>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label inputo">Clasea:</label>
    <input name="clasea" class="form-control" id="exampleInputEmail1">
    <div id="emailHelp" class="form-text">Adibidez: 1.A</div>
  </div>

  <p>Hau <mark>lehenengo</mark> atala da. Mezedez <mark>itxaron</mark> dena azaldu arte.</p>
  <div class="border shadow p-3 mb-5 bg-body rounded" style="display: flex; justify-content: center; margin-bottom: 1%;">
    <?php
    $silabes = array('di', 'lle', 'fe', 'cor', 'co', 'ma', 'se', 're', 'no', 'la', 'mo', 're', 'pro', 'yen', 'man', 'ti', 'mo', 'gu', 'to', 'vi', 'un', 'es', 'ri', 'vo', 'in', 'cog', 'tra', 'la', 'ne', 'pu', 'la', 'au', 'dia', 'gun', 'ra', 'tan', 'de', 'lim', 'dar', 'la', 'va', 'da');
    $text = "";
    for ($i = 0; $i < 7; $i++) {
      $text = $text . $silabes[rand(0, count($silabes)-1)] . " "; 
    }
    echo "<h3 style='padding: 1%;' class='hidden' id='question-text1'>$text</h3>";
    echo '
    <button type="button" style="margin: 1%" class="btn btn-primary" id="show-button1">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
  </svg>
  </button>
  </div>
  ';
  echo "<input type=hidden name='ans-1' value='$text' />";
  echo "<div class='input-group'>";
  for ($i = 1; $i < 8; $i++) {
    echo "<input type='text' name='ans$i' class='form-control oinput'>";
  }
  echo "</div>";

  echo "<br />";
  echo "<p> Hau <mark>bigarren</mark> atala da. Mezedez emandako instrukzioak jarraitu</p>";
  echo "<div class='border shadow p-3 mb-5 bg-body rounded' style='display: flex; justify-content: center; margin-bottom: 1%; margin-top: 1%;'>";
  $text = "";
  for ($i = 0; $i < 7; $i++) {
    $text = $text . $silabes[rand(0, count($silabes)-1)] . " "; 
  }
  echo "<h3 style='padding: 1%;' class='hidden' id='question-text2'>$text</h3>";
  echo '
  <button type="button" style="margin: 1%" class="btn btn-primary show-button" id="show-button2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
  <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
  <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
  <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
</svg>
</button>
</div>
';
  echo "<input type=hidden name='ans-2' value='$text' />";
  echo "<div class='input-group'>";
  for ($i = 8; $i < 15; $i++) {
    echo "<input type='text' name='ans$i' class='form-control oinput'>";
  }
  echo "</div>";

  ?>

  <div class="alert alert-danger hidden" id="warning" style="margin-top: 1%" role="alert">
    Mesedez leku guztiak bete.
  </div>

  <button type="button" style="margin-top: 1%" id="submit-button" class="btn btn-primary">Submit</button>
</form>


<script type="text/javascript" defer>
  const showButton1 = document.getElementById("show-button1");
  const showButton2 = document.getElementById("show-button2");
  const submitButton = document.getElementById("submit-button");
  const questionText1 = document.getElementById("question-text1");
  const questionText2 = document.getElementById("question-text2");

  const inputs = document.getElementsByClassName("oinput");
  const warning = document.getElementById("warning");
  const form = document.getElementById("main-form")


  function onSubmit() {
    var notFilled = false;
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value.length == 0) {
        notFilled = true;
      }  
    }

    if (notFilled) {
      warning.classList.remove("hidden"); 
    } else {
      form.submit();
    }
  }

  function onClick1() {
    questionText1.classList.remove("hidden");
    showButton1.classList.add("hidden");
    setTimeout(() => {
      questionText1.classList.add("hidden");
      showButton1.classList.remove("hidden");
      showButton1.classList.remove("btn-primary");
      showButton1.classList.add("btn-secondary");
      showButton1.removeEventListener("click", onClick1);
    }, 5000);
  }

  function onClick2() {
    questionText2.classList.remove("hidden");
    showButton2.classList.add("hidden");
    setTimeout(() => {
      questionText2.classList.add("hidden");
      showButton2.classList.remove("hidden");
      showButton2.classList.remove("btn-primary");
      showButton2.classList.add("btn-secondary");
      showButton2.removeEventListener("click", onClick2);
    }, 5000);
  }

  showButton1.addEventListener("click", onClick1)
  showButton2.addEventListener("click", onClick2)
  submitButton.addEventListener("click", onSubmit)

</script>


<?php else :?>
  <div class="alert alert-success" role="alert">
    Mila esker!
  </div>
<?php endif; ?>




