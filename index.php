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

$show_button =     '
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="pointer-events: none;" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
  </svg>
';


$frases = array(array(
	array("ar mang amente re lent plea mar","Prefijos en orden de aparición."), //test
	array("encia emos super idor traer viv ex","Prefijos en orden de aparición"),
	array("sala ante lun ático pón izaje a","Sufijos en orden de aparición."),
	array("re imiento cog o a amiento aloj","Lexemas en orden de aparición"),
	array("igual des dad itario able vulner in","Lexemas en orden de aparición"),
	array("in ible mov perd able toc im","Sufijos en orden de aparición."),
	array("in ced itar felic retro idad er","Prefijos en orden de aparición."),
	array("ar mang amente re lent plea mar","Lexemas en orden de aparición."),
	array("ante cabell anti pon des ciclón ada","Prefijos en orden de aparición."),
	array("sub gust ino ado dis oso mar","Sufijos en orden de aparición."),
	
),array(
	array("partir ío com ás uza im gent", "Prefijos en orden de aparición."), //test
	array("er inter ío retro uza gent ced", "Prefijos en orden de aparición."),
	array("ista inter re comun idad activ real", "Sufijos en orden de aparición."),
	array("ecer tard a re grand en ar", "Lexemas en orden de aparición."),
	array("ar able nombr in re ada carg", "Lexemas en orden de aparición."),
	array("de ación invit dis ado ilustr gust", "Sufijos en orden de aparición"),
	array("partir ío com ás uza im gent", "Prefijos en orden de aparición."),
	array("hum udo des ión barb areda un", "Lexemas en orden de aparición."),
	array("re sobre encia viv super iste volv", "Prefijos en orden de aparición."),
	array("vis re ionar to ión tele pre", "Sufijos en orden de aparición.")
));

$soluciones = array(
array(
	"super ex",
	"super ex",
	"ático izaje",
	"cog aloj",
	"igual vulner",
	"ible able",
	"in retro",
	"mang lent mar",
	"ante anti des",
	"ino ado oso",
), array(
	"inter retro",
	"inter retro",
	"ista idad",
	"tard grand",
	"nombr carg",
	"ación ado",
	"com im",
	"hum barb un",
	"re sobre super",
	"ionar to ión"
));

if (isset($_POST['soluciones-0-0'])) {
  $csv_line = array(
	 $_POST["codigo"],
	 $_POST["sexo"],
	 $_POST["fecha-nacimiento"],
	 $_POST["estudios"],
	 $_POST["modalidad"],
	 $_POST["tocas"],
	 $_POST["horas-semanales"],
	 $_POST["modalidad-instrumento"],
	 $_POST["regladas"],
	 $_POST["no-regladas"],
	 $_POST["estudiar-edad"],
	 $_POST["edad-dejar"],
	 $_POST["time"]
  );

  for ($j = 0; $j < 2; $j++) {
	  for ($i = 1; $i < 10; $i++) {
		  array_push($csv_line, $_POST["respuesta-$j-$i"]);
	  }
	  for ($i = 1; $i < 10; $i++) {
		  array_push($csv_line, $_POST["soluciones-$j-$i"]);
	  }
  }

  setcookie("submited", 'true', time()+60*60*24*365, "/");
  $_COOKIE['submited'] = 'true';

  $date = getdate();
  $today = $date['mday']."/".$date['hours'].":".$date['minutes'].":".$date['seconds'];

  array_push($csv_line, $today);
  $file = fopen("data.csv", "a");
  fputcsv($file, $csv_line);
  fclose($file);
}

?>
<?php if(!isset($_COOKIE['submited'])): ?>
<title> Test memoria </title>
<h1 style="width: 100%; text-align: center"> Test memoria </h1>
<div class="border shadow p-3 mb-5 bg-body rounded" style="">

Consentimiento informado
Este estudio está realizado por Ainara Alonso, Aitor Pflügl y Tristán Romera, alumnos del
IES Botikazar, que están siendo tutorizados por Emilio Visaires ,responsable del
departamento de matemáticas del centro.
El objetivo del mismo es la recogida de información para participar en un concurso de la
SEIO (Sociedad de Estadística e Investigación Operativa), que busca un acercamiento a
la estadística como herramienta fundamental en la investigación entre los estudiantes de
ESO, bachillerato y ciclos formativos. La prueba que se realizará consiste en un test de
memoria de trabajo. No existen riesgos ni contraindicaciones asociadas a esta evaluación.
La participación en este trabajo es voluntaria. La información recogida será confidencial y
no se usará para ningún otro propósito fuera del estricto objetivo de la investigación.
Queremos resaltar que se va a realizar un tratamiento colectivo de los datos recogidos y
por eso las respuestas individuales irán asociadas a un identificador. En cualquier caso no
se publicarán datos personales de los participantes.
<br></br>
He leído la información
<br></br>
<b>Acepto participar</b>
</div>
<hr></hr>


<form action="/index.php" method="post" id="main-form">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Codigo de identificación:</label>
    <input type="text" name="codigo" class="form-control oinput" id="exampleInputEmail1" >
    <!--<div id="emailHelp" class="form-text">Izena Abizena</div>-->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Sexo:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="G" checked>
      <label class="form-check-label" for="sexua1">
        Hombre
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="E">
      <label class="form-check-label" for="sexua2">
        Mujer
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="N">
      <label class="form-check-label" for="sexua3">
        No binario 
      </label>
    </div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label inputo">Fecha de nacimiento:</label>
    <input name="fecha-nacimiento" class="form-control oinput" id="exampleInputEmail1">
    <div id="emailHelp" class="form-text">Por ejemplo: 05/12/2005. <b>Por favor utilice el mismo formato, dia/mes/año</b></div>
  </div>
  
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Estudio actualmente:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estudio" id="flexRadioDefault1" value="BH" checked>
      <label class="form-check-label" for="musika1">
        Bachilller
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estudio" id="flexRadioDefault2" value="FP">
      <label class="form-check-label" for="musika2">
        Formación profesional (FP)
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="estudio" id="flexRadioDefault2" value="ESO">
      <label class="form-check-label" for="musika2">
        Educacion secundario obligatoria (ESO)
      </label>
    </div>
  </div>
  
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Modalidad:</label>
    <div class="form-check">
      <input class="form-check-input oinput" type="radio" name="modalidad" value="L" checked>
      <label class="form-check-label">
        Letras
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modalidad" value="A">
      <label class="form-check-label">
        Ciencias
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modalidad" value="C">
      <label class="form-check-label">
        Artes
      </label>
    </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Curso:</label>
	<input type="number" class="form-control oinput"></input>
  </div>
  <div>
	<label class="form-label">Nota media:</label>
	<input type="number" class="form-control oinput"></input>
	<div id="emailHelp" class="form-text">Nota media de todos los trimestes que hayas hecho este curso. <b>Solo una decimal</b></div>

  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Tocas algun instrumento musical:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="tocas" id="flexRadioDefault1" value="S" checked>
      <label class="form-check-label">
        Si
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="tocas" id="flexRadioDefault2" value="N">
      <label class="form-check-label">
        No
      </label>
    </div>
  </div>
	<div class="alert alert-primary" role="alert">
		Las proximas preguntas solo tienes que contestarlas si has contestado si en la anterior.
	</div>

  <div>
	<label class="form-label">Cuantas horas a la semana tocas instrumentos musicales:</label>
	<input type="number" class="form-control" name="horas-semanales"></input>
	<div id="emailHelp" class="form-text">Por favor introduce <b>solo un numero entero</b>. </div>
  </div>


  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Indica la modalidad del instrumento musical que tocas. En caso de que toques mas de uno indica el que mas toques:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modalidad-instrumento" id="flexRadioDefault1" value="C" checked>
      <label class="form-check-label">
        Cuerda
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modalidad-instrumento" id="flexRadioDefault2" value="V">
      <label class="form-check-label">
        Viento
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modalidad-instrumento" value="P">
      <label class="form-check-label">
        Percusion
      </label>
    </div>  
    <div class="form-check">
      <input class="form-check-input" type="radio" name="modalidad-instrumento" value="T">
      <label class="form-check-label">
        Tecla
      </label>
    </div>  
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Has estudiado enseñanzas regladas de música (Conservatorio):</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="regladas" value="S" checked>
      <label class="form-check-label">
        Si
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="regladas" value="N">
      <label class="form-check-label">
        No
      </label>
    </div>
  </div>

  <div>
	<label class="form-label">Cuantos años:</label>
	<input type="number" class="form-control" name="regladas-años"></input>
	<div id="emailHelp" class="form-text">Por favor introduce <b>solo un numero entero</b>. </div>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Has realizado enseñanzas no reglados de música:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="no-regladas" value="S" checked>
      <label class="form-check-label">
        Si
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="no-regladas" value="N">
      <label class="form-check-label">
        No
      </label>
    </div>
  </div>
  <div>
	<label class="form-label">Cuantos años:</label>
	<input type="number" class="form-control" name="no-regladas-años"></input>
	<div id="emailHelp" class="form-text">Por favor introduce <b>solo un numero entero</b>. </div>

  </div>
  
   <div>
	<label class="form-label">A que edad comenzaste a estudiar música:</label>
	<input type="number" class="form-control" name="estudiar-edad"></input>
	<div id="emailHelp" class="form-text">Por favor introduce <b>solo un numero entero</b>. </div>

  </div>
    <label for="exampleInputPassword1" class="form-label">Has realizado enseñanzas no reglados de música:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="no-regladas" value="S" checked>
      <label class="form-check-label">
        Si
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="no-regladas" value="N">
      <label class="form-check-label">
        No
      </label>
    </div>
  </div>  
   <div>
	<label class="form-label">A que edad dejaste de estudiar música:</label>
	<input type="number" class="form-control" name="edad-dejar"></input>
	<div id="emailHelp" class="form-text">Por favor introduce <b>solo un numero entero</b>. </div>

  </div>   
  <p>Este es la <mark>primera</mark> parte. Por favor <mark>esperen</mark> hasta que expliquemos todo.</p>
  



  <?php
  echo "<input type='hidden' value='' name='time' id='time'></input>";

  for ($i = 0; $i < count($frases); $i++) {
	  for ($j = 0; $j < count($frases[$i]); $j++) {

		  echo "<div class='border shadow p-3 mb-5 bg-body rounded' style='text-align: center; display: flex; flex-direction: column; justify-content: center; margin-bottom: 1%;'>";
  		  echo "<div><button type='button' class='btn btn-primary tiempo' id='" . ($i * count($frases[$i]) + $j) . "' disabled>Enviar</button></div>";

		
		  echo "<div><button type='button' style='margin: 1%' id='" . ($i * count($frases[$i]) + $j) . "'  class='btn btn-primary show-button'>" . $show_button . "</button></div>";
		  echo "<h5 class='question hidden'>" . $frases[$i][$j][1] . "</h5>";

		  echo "<div class='question-text hidden'>";

		  echo "<h3 style='padding: 1%;' class=''>". $frases[$i][$j][0] . "</h3>";
		  echo "<input name='soluciones-$i-$j' type='hidden' value='" . $soluciones[$i][$j] . "'></input>";
		  echo "</div>";
		  echo "<input type='text' class='form-control answer-input' disabled></input>";
		  echo "<input type='hidden' class='answer' name='respuesta-$i-$j'></input>";
		  echo "</div>";
	  }
	  if ($i == 0) {
		  echo '<div class="alert alert-primary" id="warning" style="margin-top: 1%" role="alert">';
		  echo "<p>Ahora empieza la segunda parate del test. Por favor siga las instrucciones.</p>";
		  echo "</div>";
	  }
  }
  
  
  ?>
  <button type="button" style="margin-bottom: 1%; margin-top: 1%;" id="submit-button" class="btn btn-primary">Submit</button>
  <div class="alert alert-danger hidden" id="warning" style="margin-top: 1%" role="alert">
	Por favor rellene todas las casillas obligatorias.
  </div>
</form>


<script type="text/javascript" defer>
  const showButtons = document.getElementsByClassName("show-button");
  const texts = document.getElementsByClassName("question-text");
  const answers = document.getElementsByClassName("answer");
  const questions = document.getElementsByClassName("question")
  const finishs = document.getElementsByClassName("finish");
  var showButtonsClicked = Array(showButtons.length).fill(0);
  const inputs = document.getElementsByClassName("answer-input");
  const submitButton = document.getElementById("submit-button");
  const oinputs = document.getElementsByClassName("oinput");
  const warning = document.getElementById("warning");
  const form = document.getElementById("main-form")
  const times = document.getElementsByClassName("tiempo");
  var running = false;

  var time = 0;
  var time_sum = 0;
  var startTime = false;
  var time_arr = Array(times.length, 0);
  for (var i = 0; i < times.length; i++) {
	  times[i].addEventListener("click", stopTime);
  }
  setInterval(countTime, 1000);
  function countTime() {
      time++;
	  console.log(time);
  }
  
  function changeClicked(event) {
	  console.log(running);
	  if (running)
		return;
		
		
	  i = event.target.id;
	  showButtonsClicked[i]++;
	  inputs[i].disabled = true;
	  showButtons[i].disabled = true;
	  texts[i].classList.remove("hidden");
	  running = true;
      if (showButtonsClicked[i] == 1) {
		  time_arr[i] = time;
	  }
	  if (showButtonsClicked[i] >= 2) {
		  showButtons[i].removeEventListener("click", changeClicked)
	  }

	  setTimeout(() => {
		  if (showButtonsClicked[i] < 2) {
			showButtons[i].disabled = false;
		  } else {
			inputs[i].disabled = false;
			times[i].disabled = false;

			questions[i].classList.remove("hidden");
		  }
	  	  texts[i].classList.add("hidden");
		  running = false;
	  }, 5000)
	  
  }
  function stopTime(event) {
	  var i = event.target.id;
	  time_arr[i] = time - time_arr[i];
	  times[i].disabled = true;
	  time_sum += time_arr[i];
	  inputs[i].disabled = true;
	  answers[i].value = inputs[i].value;
  }
  var indexes = Array(inputs.length);
  for (var i = 0; i < showButtons.length; i++) {
	  indexes[i] = i;
	  showButtons[i].addEventListener("click", changeClicked)
  }

  function onSubmit() {
    var notFilled = false;
    for (var i = 0; i < oinputs.length; i++) {
      if (oinputs[i].value.length == 0) {
        notFilled = true;
      }  
    }
	console.log(notFilled);
    if (notFilled) {
      warning.classList.remove("hidden"); 
    } else {
	  document.getElementById("time").value = time_sum - time_arr[0];
      form.submit();
    }
  }

  submitButton.addEventListener("click", onSubmit)

</script>


<?php else :?>
  <div class="alert alert-success" role="alert">
    Mila esker!
  </div>
<?php endif; ?>




