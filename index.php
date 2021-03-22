<?php
//$data = "https://github.com/senna-application-software/gigaming/blob/main/backend-titanic-test.json";
$data = "backend-titanic-test.json";
$obj  = json_decode(file_get_contents($data), true);
$out  = $arr = $result = array();	

//associative order, according to the value
asort($obj);

//group by age and show their name
foreach($obj as $val){
	$result[$val['age']][] = $val['name'];
}

//name alphabetical order
sort($result);

//find array with the same length
for($i=0;$i<count($result);$i++){
	
	//collect every array length into new array
	$arr[] = count($result[$i]);
	
	//group with maximum amount
	foreach($arr as $key=>$val){
		$out[$val][$key] = $result[$key];		
	}	
}

//order by name and age alphabeticaly
krsort($out);
echo(json_encode($out, JSON_PRETTY_PRINT));