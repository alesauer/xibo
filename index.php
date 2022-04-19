
<!doctype html>
<html lang='pt-BR'>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='icon' href='/docs/4.0/assets/img/favicons/favicon.ico'>

    <title>Xibo ALMG</title>

    <link rel='canonical' href='https://getbootstrap.com/docs/4.0/examples/starter-template/'>

    <!-- Bootstrap core CSS -->
    <link href='https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Custom styles for this template -->
    <link href='https://getbootstrap.com/docs/4.0/examples/starter-template/starter-template.css' rel='stylesheet'>
  </head>

  <body>

    <nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
      <a class='navbar-brand' href='#'>Xibo ALMG</a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
      </button>

      <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
        <ul class='navbar-nav mr-auto'>
          <li class='nav-item active'>
            <a class='nav-link' href='#'>Home <span class='sr-only'>(current)</span></a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='#'>Grid</a>
          </li>
         
        </ul>
        

      </div>
    </nav>

    <main role='main' class='container'>

      <div class='starter-template'>
        <h1>Xibo Hosts</h1>
        <p class='lead'>Utilize essa interface para informações das estações XIBO</p>
	<p class='lead'>Último UPDADE:<b><?php $data_imgs = file('data.cfg'); echo $data_imgs[0]; ?></b></p>
      </div>

      <div>

  <table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Host</th>
      <th scope='col'>IP</th>
      <th scope='col'>PING</th>
      <th scope='col'>VNC</th>
      <th scope='col'>SSH</th>
      <th scope='col'>Screen</th>
    </tr>
  </thead>
  
  <tbody>



<?php
include("classes.php");
$obj= new HostsXibo;
$resultado = $obj->get_hosts();



$arq = file("hosts.cfg");
$tam = count($arq);

for($i=1;$i<$tam;$i++){
$divide = explode(';',$arq[$i]);


$display = rtrim(ltrim($divide[0]));
$ClientAddress = rtrim(ltrim($divide[1]));
$MacAddress = rtrim(ltrim($divide[2]));
$vnc = rtrim(ltrim($divide[3]));
$ssh = rtrim(ltrim($divide[4]));
$ping = rtrim(ltrim($divide[5]));


if($vnc == "Up"){$vncStatus="bg-success";}else{$vncStatus="bg-danger";}
if($ssh == "Up"){$sshStatus="bg-success";}else{$sshStatus="bg-danger";}
if($ping == "Up"){$pingStatus="bg-success";}else{$pingStatus="bg-danger";}


 

echo "
    <tr>
      <th scope='row'>$i</th>
      <td>$display</td>
      <td>$ClientAddress</td>
      <td><span class='badge $pingStatus rounded-pill'>$ping</span></td>
      <td><span class='badge $vncStatus rounded-pill'>$vnc</span></td>
      <td><span class='badge $sshStatus rounded-pill'>$ssh</span></td>
      ";

      if($ping == "Up"){
      echo "<td><a href='imgs/$ClientAddress.png'><img src='imgs/$ClientAddress.png' width='100' height='100' class='img-fluid'></a></td>";
    }
    else{
     echo "<td><img src='img.png' width='100' height='100' class='img-fluid'></td>"; 
     //echo "<td><a href='img.png' onclick='window.open('img.png','targetWindow', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1090px, height=550px, top=25px left=120px'); return false;'>click here</a></td>";
    }


   echo "</tr>";
}



/*
$i=1;
while($linha=mysqli_fetch_array($resultado))
{
  $display = $linha['display'];
  $ClientAddress = $linha['ClientAddress'];

//  $check = new Tests;
//  $vnc = $check->check_tcp_ports($ClientAddress,6000);


echo "

    <tr>
      <th scope='row'>$i</th>
      <td>$display</td>
      <td>$ClientAddress</td>
      <td><span class='badge bg-success rounded-pill'>OK</span></td>
      <td><span class='badge bg-success rounded-pill'>OK</span></td>
      <td><span class='badge bg-danger rounded-pill'>Fail</span></td>
      <td><img src='img.png' width='100' height='100' class='img-fluid'></td>
    </tr>
   ";
   $i++;
}
*/

?>



  </tbody>
</table>
      </div>  


    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
    <script>window.jQuery || document.write('<script src='../../assets/js/vendor/jquery-slim.min.js'><\/script>')</script>
    <script src='https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js'></script>
    <script src='https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js'></script>
  </body>
</html>
