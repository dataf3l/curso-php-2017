<?php
require("secrets.php");
#echo ($token);

$QS = "?key=$key&token=$token";

//GET /1/members/me/boards 
echo(file_get_contents("https://api.trello.com/1/members/me/boards".$QS));
die();
	//cards?key=myKey&token=myToken&name=newCardName&desc=newCarddescription&idList=myListId"
$board_id = "5a160fe804903cb7d4051fdd";
$list_id = "5a160ffe17a22a6b8ad3a598";

$url = "https://api.trello.com/1/members/me/boards?key=$key&token=$token";
$url2 = "https://api.trello.com/1/boards/$board_id/lists?key=$key&token=$token";
$url3 = "https://api.trello.com/1/cards?key=$key&token=$token";


$encoded_fields =  "name=hola".rand(1,200)."&desc=a1234&pos=top&idList=$list_id";

//echo(file_get_contents($url2));
//die();
# init curl
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url3);

curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
curl_setopt($ch, CURLOPT_HEADER, 1);
// make sure we see the sent header afterwards
curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_fields);
curl_setopt($ch, CURLOPT_POST, 1); // DO POST

# dont care about ssl
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

# download and close
$output = curl_exec($ch);

$parts = explode("\r\n\r\n",$output);
$result = json_decode($parts[1],true);

if($result == null){
	echo("sorry");
}else{
	if(isset($result["id"])){
		echo("OK!");
	
		/// print_r($result);
	}else{
	
		echo 'This is output = '.$output .'<br />';
		echo 'This is request = '.$request .'<br />';
		echo 'This is error = '.$error .'<br />';	

	}

	/*
	foreach($boards as $board){
		echo($board["name"]." = ".$board["id"]."<br/>\n");
	}
	 */
}

$request =  curl_getinfo($ch, CURLINFO_HEADER_OUT);
$error = curl_error($ch);
curl_close($ch);

// https://stackoverflow.com/questions/871431/raw-post-using-curl-in-php
 
