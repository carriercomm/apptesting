<? 
function build_cycle_monthly($price_cycle){
	$price_per_day=$price_cycle/cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));
	
	if(date("d")<25){
					
					
					$first_date_prorate_of=date("Y-m-d");
					$first_date_prorate_to=date("Y-m-".cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y")));
					$first_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"))-date("d"))*$price_per_day;
					$signupdate_less26="NO";
					$datenext_renew=date("Y-m-d");
					if(date("m")<=11){
						$datenext_renew=date("Y")."-".(1+date("m"))."-01";
					}
					else{
						$datenext_renew=1+date("Y")."-01-01";
					}
					$second_date_prorate_of="0000-00-00";
					$second_date_prorate_to="0000-00-00";
					$second_prorate_quantity="0.00";
	}
	
	if(date("d")>=25){
					$second_prorate_quantity=$price_cicle;
					$first_date_prorate_of=date("Y-m-d");
					$first_date_prorate_to=date("Y-m-".cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y")));
					$signupdate_less26="YES";
					$first_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"))-date("d"))*$price_per_day;
					
					if(date("m")<=11){
						$datenext_renew=date("Y")."-".(1+date("m"))."-01";
						if(date("m")==11){
							$second_date_prorate_of=date("Y")."-".(1+date("m"))."-01";
							$second_date_prorate_to=date("Y")."-".(1+date("m"))."-".cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));
							$second_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,"12",date("Y")))*$price_per_day;
							$datenext_renew=1+date("Y")."-01-01";
							
						}else {
							$second_date_prorate_of=date("Y")."-".(1+date("m"))."-01";
							$second_date_prorate_to=date("Y")."-".(1+date("m"))."-".cal_days_in_month(CAL_GREGORIAN,(1+date("m")),date("Y"));
							$datenext_renew=date("Y")."-".(date("m")+2)."-01";
							$second_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,(date("m")+1),date("Y")))*$price_per_day;
							}
					}
					else{
						$second_date_prorate_of=1+date("Y")."-01"."-01";
						$second_date_prorate_to=1+date("Y")."-01-".cal_days_in_month(CAL_GREGORIAN,("01"),1+date("Y"));
						$second_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,"01",1+date("Y")))*$price_per_day;
						$datenext_renew=1+date("Y")."-02-01";
					}
	}
					
return array("first_date_prorate_of" => $first_date_prorate_of, "first_date_prorate_to"=> $first_date_prorate_to,"first_prorate_quantity" => $first_prorate_quantity,"second_date_prorate_of" => $second_date_prorate_of,"second_date_prorate_to"=> $second_date_prorate_to,"second_prorate_quantity"=>$second_prorate_quantity ,"datenext_renew"=> $datenext_renew,'signupdate_less26' => $signupdate_less26);
}

function build_cycle_yearly($price_cycle){
	
		$price_per_day=$price_cycle/12/cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));
		
		if(date("d")<25){
					$first_date_prorate_of=date("Y-m-d");
					$first_date_prorate_to=date("Y-m-".cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y")));
					$first_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"))-(date("d"))+1)*$price_per_day;
					$signupdate_less26="NO";
					$datenext_renew=date("Y-m-d");
					if(date("m")<=11){
						$second_date_prorate_of=(date("Y")."-".(1+date("m"))."-01");
						if(date("m")==01){
							$second_date_prorate_to=date("Y")."-12-".(cal_days_in_month(CAL_GREGORIAN,"12",date("Y")));
						}else {
							//LE RESTO UN MES para que encaje en el día de pago
							$second_date_prorate_to=1+date("Y").'-'.(1-date("m")).'-'.(cal_days_in_month(CAL_GREGORIAN,(date("m")-1),1+date("Y")));	
						}
						$second_prorate_quantity=$price_cycle/12*11;
						$datenext_renew=(1+date("Y"))."-".(date("m"))."-01";
					}
					else{
						$second_date_prorate_of=""; // <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
						$second_date_prorate_to=""; // <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
						$second_prorate_quantity="";// <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
						$datenext_renew=2+date("Y")."-01-01"; // <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
					}
		}
		// Aqui va cuando es despues del 25
		if(date("d")>=25){
					$first_date_prorate_of=date("Y-m-d");
					$first_date_prorate_to=date("Y-m-".cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y")));
					$first_prorate_quantity=(cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"))-(date("d"))+1)*$price_per_day;
					$signupdate_less26="YES";
					$datenext_renew=date("Y-m-d");
					if(date("m")<=11){
						$second_date_prorate_of=(date("Y")."-".(1+date("m"))."-01");
						$second_date_prorate_to=1+date("Y").date("-m-").(cal_days_in_month(CAL_GREGORIAN,date("m"),1+date("Y")));	
						$second_prorate_quantity=$price_cycle;
						$datenext_renew=(1+date("Y"))."-".(date("m")+1)."-01";
					}
					else{
						$second_date_prorate_of=""; // <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
						$second_date_prorate_to=""; // <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
						$second_prorate_quantity="";// <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
						$datenext_renew=2+date("Y")."-01-01"; // <---------- AQUI FALTA DEFINIR CUANDO EL MES ES DICIEMBRE
					}
			}
		
		
return array("first_date_prorate_of" => $first_date_prorate_of, "first_date_prorate_to"=> $first_date_prorate_to,"first_prorate_quantity" => $first_prorate_quantity,"second_date_prorate_of" => $second_date_prorate_of,"second_date_prorate_to"=> $second_date_prorate_to,"second_prorate_quantity"=>$second_prorate_quantity ,"datenext_renew"=> $datenext_renew,'signupdate_less26' => $signupdate_less26);	
}

function build_cycle_domain($total_years,$price){
	
	switch($total_years){
			case "1":{
				// Revisamos que no sea HOY 29 de Feb en un año bisiesto
				if(checkdate(date("m"),date("d"),(1+date("Y")))){
					$datenext_renew=(1+date("Y")).date("-m").date("-d");
					$first_prorate_quantity=$price*$total_years;
				}else{
					$datenext_renew=(1+date("Y")).date("-m").(date("-d")-1);
					$first_prorate_quantity=$price*$total_years;
					}
				break;
				}
			case "2":{
				// Revisamos que no sea HOY 29 de Feb en un año bisiesto
				if(checkdate(date("m"),date("d"),(2+date("Y")))){
					$datenext_renew=(2+date("Y")).date("-m").date("-d");
					$first_prorate_quantity=$price*$total_years;
				}else{
					$datenext_renew=(2+date("Y")).date("-m").(date("-d")-1);
					$first_prorate_quantity=$price*$total_years;
					}
				break;
				}
			case "3":{
				// Revisamos que no sea HOY 29 de Feb en un año bisiesto
				if(checkdate(date("m"),date("d"),(3+date("Y")))){
					$datenext_renew=(3+date("Y")).date("-m").date("-d");
					$first_prorate_quantity=$price*$total_years;
				}else{
					$datenext_renew=(3+date("Y")).date("-m").(date("-d")-1);
					$first_prorate_quantity=$price*$total_years;
					}
				break;
				}
			case "4":{
				// Revisamos que no sea HOY 29 de Feb en un año bisiesto
				if(checkdate(date("m"),date("d"),(4+date("Y")))){
					$datenext_renew=(4+date("Y")).date("-m").date("-d");
					$first_prorate_quantity=$price*$total_years;
				}else{
					$datenext_renew=(4+date("Y")).date("-m").(date("-d")-1);
					$first_prorate_quantity=$price*$total_years;
					}
				break;
				}	
			case "5":{
				// Revisamos que no sea HOY 29 de Feb en un año bisiesto
				if(checkdate(date("m"),date("d"),(5+date("Y")))){
					$datenext_renew=(5+date("Y")).date("-m").date("-d");
					$first_prorate_quantity=$price*$total_years;
				}else{
					$datenext_renew=(5+date("Y")).date("-m").(date("-d")-1);
					$first_prorate_quantity=$price*$total_years;
					}
				break;
				}				
		}
	
	return array("datenext_renew"=> $datenext_renew,"first_prorate_quantity"=> $first_prorate_quantity);
	}
	
?>