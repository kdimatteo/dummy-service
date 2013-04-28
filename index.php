<?php

class GridData{ 
	var $return;
	var $chars = "ABCDEFGHIJKLMNOPQRSTUVWXTZ";
	var $nums = "0123456789";

	function getRandomString($len){
		$randomstring = "";
		for ($i = 0; $i < $len; $i++) {
       		$rndVal = rand(0, count(str_split($this->chars)));
        	$randomstring .= substr($this->chars, $rndVal, 1);
  		}
  		return $randomstring;
	}

	function getRandomValue(){
		return rand(100, 999);
	}

	function get($id, $cols, $rows){
		$returnObj = array();
		for($i=1; $i<=$rows; $i++){
			$row = array();
			
			if(isset($id)){
				$row[0] = $id;
			} else {
				$row[0] = $this->getRandomString(3);
			}
			$row["isExpanded"] = 0;

			for($j=1; $j<$cols; $j++){
				$row[$j] = (string)$this->getRandomValue();
			}
			array_push($returnObj, $row);
		}
		return $returnObj;
	}
}

$o = new GridData();
if(isset($_GET["id"])){
	echo json_encode($o->get($_GET["id"], $_GET["cols"], $_GET["rows"]));
} else {
	echo json_encode($o->get(null, $_GET["cols"], $_GET["rows"]));
}

?>