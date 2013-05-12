<head>
	<link rel="stylesheet" type="text/css" href="style.css" media=screen>
<center>
		<br>
		<br>
</center>
</head>
<body>
	<div class="column-center">
		<div class="maintxt" style="text-align: center;">
		<p><h3>DNS, PTR, WHOIS and Ping for any domain or IP address</h3></p>
		</div>			
	<br>
			<hr>
			<form name="input" method="get" style="text-align: left; margin-left: 35%;">
					<input type="radio" name="group1" value="alltools" checked> All Webtools<br>
					<input type="radio" name="group1" value="dns"> DNS & PTR<br>
					<input type="radio" name="group1" value="whois"> WHOIS<br>
					<input type="radio" name="group1" value="ping"> Ping<br>
			<br>	
				<input type="text" style="margin-left: -25%; width: 300px;" placeholder="Domain or IP" name="fieldin">
				<input type="submit" value="Submit">
			</form>
			<hr>
<?php	
	$radioselect = $_GET['group1'];
		
		switch($radioselect) {
	
			case "alltools": 

				if ($hostin = $_GET['fieldin']) {

				$dnsoutput = shell_exec(escapeshellcmd("host -a '$hostin'"));

				echo "<h3>DNS & PTR&#58;</h3></ br>

				<pre>$dnsoutput</pre>";	
	
				$whoisoutput = shell_exec(escapeshellcmd("whois '$hostin'"));

				echo "<h3>WHOIS&#58;</h3></ br>
			
				<pre>$whoisoutput</pre>";
				
				$pingoutput = shell_exec(escapeshellcmd("ping -c 4 '$hostin'"));

				echo "<h3>Ping&#58;</h3></ br>

				<pre>$pingoutput</pre>";

				}		
					
				else {

                                echo 'You did not submit a valid domain or IP address';

                                        }
		
				break;
		
			case "dns":

				if ($hostin = $_GET['fieldin']) {
 
			        $dnsoutput = shell_exec(escapeshellcmd("host -a '$hostin'"));
  
                                echo "<h3>DNS &amp; PTR&#58;</h3></ br/>
 
                                <pre>$dnsoutput</pre>";
 
                                }
                       
				else {

                                echo 'You did not submit a valid domain or IP address';

                                        }

			        break;
			
			case "whois":
					
				if ($hostin = $_GET['fieldin']) {
	
				$whoisoutput = shell_exec(escapeshellcmd("whois '$hostin'"));

                                echo "<h3>WHOIS&#58;</h3></ br>

                                <pre>$whoisoutput</pre>";

				}				
				
				else {

                                echo 'You did not submit a valid domain or IP address';

                                        }


                                break;
			

			case "ping":

				if ($hostin = $_GET['fieldin']) {

                                $pingoutput = shell_exec(escapeshellcmd("ping -c 4 '$hostin'"));

                                echo "<h3>Ping&#58;</h3></ br>
 
				<pre>$pingoutput</pre>";

				
                                }

                                else {
					
				echo 'You did not submit a valid domain or IP address';
					 
					}
				break;
}

?>		
	</div>

</body>

