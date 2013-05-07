<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<center>
<br/>
<br/>
</head>
<p><h3>Check DNS for any domain or IP address:</h3></p>
<br/>
<br/>
<form name="input" style="glowing-border" method="get">
<input type="text" placeholder="Domain or IP" name="fieldin">
<input type="submit" value="Submit">
</form>
</center>

<div style="padding-left: 600px;">
<?php   

        if ($hostin = $_GET['fieldin']) {


        $dnsoutput = shell_exec("host -a '$hostin'");

                echo "<pre><h1>DNS:</h1><br/>

                        $dnsoutput<br/></pre>"; 

        $whoisoutput = shell_exec("whois '$hostin'");

                echo "<pre><h1>Whois:</h1><br/>

                        $whoisoutput</pre>";
        }
?>

</div>

        else { }

