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
		<p><h3>Webtools checks for hosts via domain or IP address</h3></p>
				<br/>
			<hr>
			<form name="input" method="get">
				<div style="text-align: left; font-family: Arial, Helvetica, sans-serif; margin-left: 35%;">	
					<input type="radio" name="group1" value="dns" checked> DNS<br>
					<input type="radio" name="group1" value="whois"> WHOIS<br>
					<input type="radio" name="group1" value="ping"> Ping<br>
					<input type="radio" name="group1" value="rbl"> RBL Email Blacklist Check: only for IP addresses<br>
                                        <input type="radio" name="group1" value="portscanwell"> Well Known Ports Scan: 1 to 1023<br>
                                	<input type="radio" name="group1" value="portscanreg"> Registered Ports Scan: 1024 to 65535 - output within 2 minute<br>
					<input type="radio" name="group1" value="allports"> All Ports Scan: 1 to 65535 - output within 2 minutes<br>
					<input type="radio" name="group1" value="alltools"> One Click Webtools - output within 2 minutes<br>
                                 <br>
				</div>
			<hr><br>
                                 <input type="text" style="width: 300px; font-family: Arial, Helvetica, sans-serif; placeholder="Domain or IP" name="fieldin">
                        	 <input type="submit" value="Submit">
			</form>
			<br>



		</div>
<?php	
	$radioselect = htmlspecialchars($_GET['group1']);
		
		switch($radioselect) {
	
			case "alltools": 

				if ($hostin = htmlspecialchars($_GET['fieldin'])) {

				$dnsoutput = shell_exec(escapeshellcmd("host -a '$hostin'"));

				echo "<pre><h1>DNS:</h1><br>
	
				$dnsoutput<br></pre>";	
	
				$whoisoutput = shell_exec(escapeshellcmd("whois '$hostin'"));

				echo "<pre><h1>WHOIS:</h1><br>
			
				$whoisoutput</pre>";
			
				$pingoutput = shell_exec(escapeshellcmd("ping -c 4 '$hostin'"));

				echo "<pre><h1>Ping:</h1><br>

				$pingoutput<br></pre>";

				$alloutput = shell_exec(escapeshellcmd("nmap -PN -p1-65535 '$hostin'"));

                                echo "<pre><h1>All Open Ports:</h1><br>

                                $alloutput<br></pre>";
	
				}		
				
				else echo 'Enter a domain or IP address';

				break;
		
			case "dns":

				if ($hostin = htmlspecialchars($_GET['fieldin'])) {
 
			        $dnsoutput = shell_exec(escapeshellcmd("host -a '$hostin'"));
  
                                echo "<pre><h1>DNS:</h1><br/>
 
                                $dnsoutput<br/></pre>";
 
                                }

				else echo 'Enter a domain or IP address';
 
                                break;
			
			case "whois":
					
				if ($hostin = htmlspecialchars($_GET['fieldin'])) {
	
				$whoisoutput = shell_exec(escapeshellcmd("whois '$hostin'"));

                                echo "<pre><h1>WHOIS:</h1><br>

                                $whoisoutput</pre>";

				}				
				
				else echo 'Enter a domain or IP address';				
				
                                break;

			case "ping":

				if ($hostin = htmlspecialchars($_GET['fieldin'])) {

                                $pingoutput = shell_exec(escapeshellcmd("ping -c 4 '$hostin'"));

                                echo "<pre><h1>Ping:</h1><br>

                                $pingoutput<br></pre>";


                                }
				
				else echo 'Enter a domain or IP address';

                                break;


                        case "rbl":

                                if ($hostin = htmlspecialchars($_GET['fieldin'])) {

                                $rbloutput = shell_exec(escapeshellcmd("rblcheck -c -t 
											-s psbl.surriel.com 
											-s dnsbl.njabl.org 
                     									-s zen.spamhaus.org 
               									  	-s bl.spamcop.net  
                     									-s spam.dnsbl.sorbs.net 
                     									-s combined.rbl.msrbl.net 
                     									-s dnsbl.sorbs.net 
                     									-s b.barracudacentral.org 
                     									-s dnsbl.ahbl.org 
                     									-s dnsbl-1.uceprotect.net '$hostin'"));

                                echo "<pre><h1>RBL Blacklists:</h1><br>

                                $rbloutput<br></pre>";


                                }

                                else echo 'Enter a domain or IP address';

                                break; 

			case "portscanwell":

				if ($hostin = htmlspecialchars($_GET['fieldin'])) {

                                $welloutput = shell_exec(escapeshellcmd("nmap -PN -p1-1023 '$hostin'"));
				
                                echo "<pre><h1>Well Known Ports Open:</h1><br>
				
				$welloutput<br></pre>";

                                }

                                else echo 'Enter a domain or IP address';

                                break;

                       case "portscanreg":

                                if ($hostin = htmlspecialchars($_GET['fieldin'])) {

                                $regoutput = shell_exec(escapeshellcmd("nmap -PN -p1024-65535 '$hostin'"));

                                echo "<pre><h1>All Open Ports:</h1><br>
		
				$regoutput<br></pre>";


                                }

                                else echo 'Enter a domain or IP address';

                                break;



			case "allports":

                                if ($hostin = htmlspecialchars($_GET['fieldin'])) {

                                $alloutput = shell_exec(escapeshellcmd("nmap -PN -p1-65535 '$hostin'"));

                                echo "<pre><h1>All Open Ports:</h1><br>

                                $alloutput<br></pre>";
                               

                                }

                                else echo 'Enter a domain or IP address';

                                break;


}

?>		

	</div>

</body>

