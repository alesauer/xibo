<?php

class Tests
{

		function ping($host, $timeout = 1)
		{
		   $check=exec(" ping -c1 $host -q | grep '100% packet loss' | wc -l");

		   if($check==1)
  			{
  				$check="Down";
  			}else{
  				$check="Up";
  			}
        	return $check;       
		}

        function check_tcp_ports($host,$port)
        {

	       // ini_set('display_errors', 0 );
	       // error_reporting(0);
        	$dir="var/www/html/xibo";
        	$check = exec("/$dir/check_tcp -H $host -p $port -t1 | grep CRITICAL | wc -l");	
        	//$check = exec("./check_tcp -H $host -p $port -t1");
			
			//Caso especial Maq PI SE Corredor - Vertical que é Windows. Nao tem ssh
			if($host=='172.16.61.15' and $port == '22')	
				{
					$check="Não tem";						
				}
        	
			
				if($check==1)
  			{
  				$check="Down";
  			}else{
  				$check="Up";
  			}
        	
        	return $check;       

        
        }//end check_tcp_ports


        function check_icmp($host, $timeout){
           
        }
}//end class

class Generate_Xibo_Status{

	function get_status(){
		include_once("classes.php");
		
		$obj= new HostsXibo;
		$resultado = $obj->get_hosts();

		$check = new Tests;

        exec("rm -rf hosts.cfg");

		while($linha=mysqli_fetch_array($resultado))
		{
			
			$ClientAddress = $linha['ClientAddress'];
			$display = $linha['display'];
			$MacAddress = $linha['MacAddress'];
			$vnc = trim($check->check_tcp_ports($ClientAddress,6000));

  			$ssh = trim($check->check_tcp_ports($ClientAddress,22));
  			$ping = trim($check->ping($ClientAddress,10));

  			//echo "$display;$ClientAddress;$MacAddress;$vnc;$ssh;$ping\n";
  			exec("echo '$display;$ClientAddress;$MacAddress;$vnc;$ssh;$ping' >> hosts.cfg");
  		
		}		
	}
}

$generate = new Generate_Xibo_Status;
$generate->get_status();



?>