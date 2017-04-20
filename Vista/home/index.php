<?php
function Carga(){ 
	list($usec, $sec) = explode(" ", microtime()); 
	return ((float)$usec + (float)$sec); 
}
$tiempo_inicio = Carga(); 
$tiempo_final = Carga();
$tiempo = number_format($tiempo_final - $tiempo_inicio, 3); 
echo "<center><pre>Esta p&aacute;gina fue generada en {$tiempo} milisegundos</pre></center>"; 
?>
<div class="container">
	<div class="row">
	    <div class="col-md-2 col-md-offset-5">
	    	<h1>Bienvenido</h1>
	    </div>
	    <div class="col-md-4 col-md-offset-4">
	    	<h4>Si puedes ver este mensaje, significa que instalaste de forma correcta el framework.</h4>
	    </div>
	    <div class="col-md-4 col-md-offset-4">
			<a href="https://github.com/oneluiz/DevFY-Framework" class="btn btn-primary btn-block">Github</a>
	    </div>
	</div>
</div>