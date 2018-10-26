<?php
namespace App\Sms;

class Counter {

	public function count($filename){

		$jsondata = file_get_contents($filename);
		$json = json_decode($jsondata, true);
		$required_income = $json['required_income'];

		do {			
			if ($required_income > 2.32){
				$sms[] = $json['sms_list'][3]['price'];
				$required_income = $required_income - $json['sms_list'][3]['income'];
			} elseif ($required_income > 1.37 && $required_income <= 2.32){
				$sms[] = $json['sms_list'][2]['price'];
				$required_income = $required_income - $json['sms_list'][2]['income'];
			} elseif ($required_income > 0.41 && $required_income <= 1.37){
				$sms[] = $json['sms_list'][1]['price'];
				$required_income = $required_income - $json['sms_list'][1]['income'];
			} elseif ($required_income <= 0.41){
				$sms[] = $json['sms_list'][0]['price'];
				$required_income = $required_income - $json['sms_list'][0]['income'];
			} 
		} while ($required_income > 0);
		if (isset($json['max_messages'])){
			if (count($sms) <= $json['max_messages']){
				echo json_encode($sms);
				return $sms;
			} else {
				$last = array_sum(array_slice($sms, -2, 2));
			 	if ($last > 3) {
			 		echo "Error";
			 	} else {
			 		$last = 3;
			 		$sms = array_slice($sms, 0, $json['max_messages']-1);
			 		$sms[] = $last;
			 		echo json_encode($sms);
					return $sms;
			 	}
			}
		} else {
			echo json_encode($sms);
			return $sms;	
		}
		
	}
}