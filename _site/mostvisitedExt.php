<?php

$file = 'mostvisitedExt.txt';


$homepage = file_get_contents('https://ijtanmostvisitedpapers.appspot.com/query?id=ahhzfmlqdGFubW9zdHZpc2l0ZWRwYXBlcnNyFQsSCEFwaVF1ZXJ5GICAgICAgIAKDA');



$arr = str_split($homepage);

$counter = 0;

for ($i=2;$i<sizeof($arr);$i++){

	if ($arr[$i]=='/' and $arr[$i-1]=='"' and $arr[$i+1]!='"' and $counter != 10){

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

	if ($arr[$i]=='-' and $arr[$i-7]=='"' and $arr[$i-9]==',' and $arr[$i-10]=='"' and $counter != 10){

    	while ($arr[$i+2]!= ',' or $arr[$i+1]!= '"'){

       		$arrTitle[$i] = $arr[$i+2];

            $i++;

		}
		$counter++;

    }	

}



$allText = implode("",$arrTitle);
$allLinks = implode("",$arrLink);

$allTextExploded = explode(" - ",$allText);
$allLinksExploded = explode('"',$allLinks);

//connect to database to add all authors to the file
mysql_connect("localhost", "iaset_mostvisit", "iasetINC14") or die(mysql_error()); 

mysql_select_db("iaset_mostVisited") or die(mysql_error()); 

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[0] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[1] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[2] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[3] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[4] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[5] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[6] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[7] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[8] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

$result = mysql_query("SELECT * FROM mostVisited");

while($row = mysql_fetch_array($result)) {

	if ($row['journal'] == 'IJTAN'){
		if($allLinksExploded[9] == $row['link']){
			$authorInfo =  $authorInfo . $row['link'] . '"' . $row['authors'] . '"';
		}
	}
}

mysql_close();

// Open the file to get existing content
$current = file_get_contents($file);


$totaltext = $allText.$authorInfo;
file_put_contents($file, $totaltext);

?>