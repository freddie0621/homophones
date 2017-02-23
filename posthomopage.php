<?php
header('Content-Type: text/html; charset=utf-8');

$json_file = file_get_contents('homo.json');
	// convert the string to a json object
//$JPEG      = json_decode($json_file, true);
$TABLE      = json_decode($json_file, true);

$fp = fopen(date("Y-m-d").'homo.json', 'w');
fwrite($fp, json_encode($TABLE));
fclose($fp);
$resulthomo1 = array();
$resulthomo2 = array();

//print_r($TABLE);
//$searchword1=" ces ";
//$searchword2=' ses ';

$searchword1=" ".$_POST['homo1']." ";
$searchword2=" ".$_POST['homo2']." ";


foreach($TABLE as $k=>$w) {
	//echo $w["phrase"];
	if(preg_match_all("/$searchword1/i", $w["phrase"])==1) {
		if (strpos($w["phrase"],$searchword1) <15) {
				//echo $w["phrase"];
				//$resulthomo1[]=$w["phrase"];
				$resulthomo1[]=str_replace($searchword1, " ____ ", $w["phrase"]);
				//echo str_replace($searchword1, " ____ ", $w["phrase"]);
				//echo '<br>';
			}
		
		
	}
}
//print_r($resulthomo1);
///////////////////////////////////////////////////////////////
//echo '<br><br><br><br><br><br><br>';




foreach($TABLE as $k=>$w) {
	//echo $w["phrase"];
	if(preg_match_all("/$searchword2/i", $w["phrase"])==1) {
		if (strpos($w["phrase"],$searchword2) >25) {
				//echo $w["phrase"];
				//$resulthomo2[]=$w["phrase"];
				$resulthomo2[]=str_replace($searchword2, " ____ ", $w["phrase"]);
				//echo str_replace($searchword2, " ____ ", $w["phrase"]);
				//echo '<br>';
			}
		
		
	}
}


//$resulthomo_2 = array_map(function($value) { return str_replace('leurs', '___', $value); }, $resulthomo2);
//print_r($resulthomo2);


$data = array('foo', 'ggbarggg', 'baz');
$data = array_map(function($value) { return str_replace('bar', 'xxx', $value); }, $data);
//print_r($data);
$resulthomo1_alea5=(array_rand(array_flip($resulthomo1), 5));
//echo '<br>';
$resulthomo2_alea5=(array_rand(array_flip($resulthomo2), 5));

//echo '<br>';
//print_r($resulthomo1_alea5);
//print_r($resulthomo2_alea5);
echo '<br>';

echo 'exercice 01'.': Complète avec'.$searchword1.'/'.$searchword2.'<br>';
$toto=array_merge($resulthomo1_alea5,$resulthomo2_alea5);
shuffle($toto);
foreach($toto as $k=>$w){
	echo ($k+1).' '.$w.'<br>';
}
echo '//////////////////////'.'<br>';

echo 'exercice 02'.': Complète avec'.$searchword1.'/'.$searchword2.'<br>';
$toto=array_merge($resulthomo1_alea5,$resulthomo2_alea5);
shuffle($toto);
foreach($toto as $k=>$w){
	echo ($k+1).' '.$w.'<br>';
}
echo '//////////////////////'.'<br>';
echo 'exercice 03'.': Complète avec'.$searchword1.'/'.$searchword2.'<br>';
$toto=array_merge($resulthomo1_alea5,$resulthomo2_alea5);
shuffle($toto);
foreach($toto as $k=>$w){
	echo ($k+1).' '.$w.'<br>';
}
echo '//////////////////////'.'<br>';
echo 'exercice 04'.': Complète avec'.$searchword1.'/'.$searchword2.'<br>';
$toto=array_merge($resulthomo1_alea5,$resulthomo2_alea5);
shuffle($toto);
foreach($toto as $k=>$w){
	echo ($k+1).' '.$w.'<br>';
}
echo '//////////////////////'.'<br>';
echo 'exercice 05'.': Complète avec'.$searchword1.'/'.$searchword2.'<br>';
$toto=array_merge($resulthomo1_alea5,$resulthomo2_alea5);
shuffle($toto);
foreach($toto as $k=>$w){
	echo ($k+1).' '.$w.'<br>';
}
function jsonRemoveUnicodeSequences($struct) {
   return preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($struct));
}
?>