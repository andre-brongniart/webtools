<head>
	<link rel="stylesheet" type="text/css" href="style.css" media=screen>
<center>
		<br>
		<br>
</center>
</head>
<body>
	<div class="column-center">
		<div style="text-align:center; font-family: Arial, Helvetica, sans-serif;">
		<p><h3>DNS, WHOIS and Ping for any domain or IP address</h3></p>
				<br/>
			<hr>
			<form name="input" method="get">
				<div style="text-align: left; font-family: Arial, Helvetica, sans-serif; margin-left: 35%;">	
					<input type="radio" name="group1" value="alltools" checked> All Webtools<br>
					<input type="radio" name="group1" value="dns"> DNS & PTR lookup<br>
					<input type="radio" name="group1" value="whois"> WHOIS<br>
					<input type="radio" name="group1" value="ping"> Ping<br>
				</div>
				<br>
				<input type="text" style="width: 300px; font-family: Arial, Helvetica, sans-serif; placeholder="Domain or IP" name="fieldin">
				<input type="submit" value="Submit">
			</form>
		</div>
<?php	
	$radioselect = $_GET['group1'];
		
		switch($radioselect) {
	
			case "alltools": 

				if ($hostin = $_GET['fieldin']) {

				$dnsoutput = shell_exec(escapeshellcmd("host -a '$hostin'"));

				echo "<pre><h1>DNS:</h1><br>
	
				$dnsoutput<br></pre>";	
	
				$whoisoutput = shell_exec(escapeshellcmd("whois '$hostin'"));

				echo "<pre><h1>WHOIS:</h1><br>
			
				$whoisoutput</pre>";
			
				
				$pingoutput = shell_exec(escapeshellcmd("ping -c 4 '$hostin'"));

				echo "<pre><h1>Ping:</h1><br>

				$pingoutput<br></pre>";

				}		
		
				break;
		
			case "dns":

				if ($hostin = $_GET['fieldin']) {
 
			        $dnsoutput = shell_exec(escapeshellcmd("host -a '$hostin'"));
  
                                echo "<pre><h1>DNS:</h1><br/>
 
                                $dnsoutput<br/></pre>";
 
                                }
                                break;
			
			case "whois":
					
				if ($hostin = $_GET['fieldin']) {
	
				$whoisoutput = shell_exec(escapeshellcmd("whois '$hostin'"));

                                echo "<pre><h1>WHOIS:</h1><br>

                                $whoisoutput</pre>";

				}				

                                break;
			

			case "ping":

				if ($hostin = $_GET['fieldin']) {

                                $pingoutput = shell_exec(escapeshellcmd("ping -c 4 '$hostin'"));

                                echo "<pre><h1>Ping:</h1><br>

                                $pingoutput<br></pre>";


                                }

                                break;
}

?>		

	</div>

</body>
