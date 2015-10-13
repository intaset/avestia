<?php

$file = 'mostvisited.txt';


$homepage = file_get_contents('https://avestia-1094.appspot.com/query?id=ag5zfmF2ZXN0aWEtMTA5NHIVCxIIQXBpUXVlcnkYgICAgICAgAoM');



$arr = str_split($homepage);

$counter = 0;

for ($i=2;$i<sizeof($arr);$i++){

	if ($arr[$i]=='/' and $arr[$i-1]=='"' and $arr[$i+1]!='"' and $counter != 3){

    	while ($arr[$i+1]!=','){

        	$arrLink[$i] = $arr[$i];

            if ($arr[$i] == 'l'){

            	$arrLink[$i] = $arrLink[$i].'"';

            }

            $i++;

		}
		$counter++;
    }	

}

$counter = 0;

for ($i=2;$i<sizeof($arr);$i++){

	if ($arr[$i]=='"' and $arr[$i-1]==' ' and $arr[$i-2]==',' and $arr[$i-3]=='"' and $arr[$i-4]=='l' and $counter != 3){

    	while ($arr[$i+1]!= ',' or $arr[$i]!= '"'){
			if($arr[$i+1]== '"'){
				$arrTitle[$i] = ' - ';
			}else{
				$arrTitle[$i] = $arr[$i+1];
			}

            $i++;

		}
		$counter++;

    }	

}

$allText = implode("",$arrTitle);
$allLinks = implode("",$arrLink);

//echo $allText;

$allTextExploded = explode(" - ",$allText);
/*echo "&&&&0000";
echo $allTextExploded[0];
echo "&&&&111";
echo $allTextExploded[1];
echo "&&&&2222";
echo $allTextExploded[2];
echo "&&&&3333";
echo $allTextExploded[3];
echo "&&&&4444";
echo $allTextExploded[4];
echo "&&&&5555";
echo $allTextExploded[5];
echo "&&&&6666";
echo $allTextExploded[6];
echo "&&&&7777";
echo $allTextExploded[7];
echo "&&&&FINITTO&&&&";
*/
$allLinksExploded = explode('"',$allLinks);

//connect to database to add all authors to the file
mysql_connect("localhost", "iaset_mostvisit", "iasetINC14") or die(mysql_error()); 

mysql_select_db("iaset_mostVisited") or die(mysql_error()); 

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == $allTextExploded[0]){
		if($allLinksExploded[0] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . ' - ' . $row['authors'] . ' - ';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == $allTextExploded[2]){
		if($allLinksExploded[1] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . ' - ' . $row['authors'] . ' - ';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == $allTextExploded[4]){
		if($allLinksExploded[2] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . ' - ' . $row['authors'] . ' - ';
		}
	}
}

mysql_close();

// Open the file to get existing content
$current = file_get_contents($file);


$totaltext = $allText.$authorInfo;
file_put_contents($file, $totaltext);

?>