<?

    // The function to make the date format(YYYY-MM-DD) to english form like DDth,MMMMMMM,YYYY

    function to_eng_date($date){
      // explode the date into array, $date_arr[0] = year, $date_arr[1] = month, $date_arr = day
       if (!strpos($date,"-")) return $date;
      $date_arr = explode("-",$date);
	  
	  
	 
	  
	  if ($date_arr[0]==""||$date_arr[1]==""||$date_arr[2]==""){
	  	return "";
	  }
	  
      switch ($date_arr[1]){
        case "1":
            $month_name = "Jan";
            break;
        case "2":
            $month_name = "Feb";
            break;
        case "3":
            $month_name = "Mar";
            break;
        case "4":
            $month_name = "Apr";
            break;
        case "5":
            $month_name = "May";
            break;
        case "6":
            $month_name = "Jun";
            break;
        case "7":
            $month_name = "Jul";
            break;
        case "8":
            $month_name = "Aug";
            break;
        case "9":
            $month_name = "Sep";
            break;
        case "10":
            $month_name = "Oct";
            break;
        case "11":
            $month_name = "Nov";
            break;
        case "12":
            $month_name = "Dec";
            break;
        default:
            $month_name = "ERROR";
      }

      if (substr($date_arr[2],0,1)=="0"){
        $date_arr[2] = substr($date_arr[2],1,1);
      }

      if ($date_arr[2]==1){
        $ex_name = "st";
      }elseif($date_arr[2]==2){
        $ex_name = "nd";
      }elseif($date_arr[2]==3){
        $ex_name = "rd";
      }else{
        $ex_name = "th";
      }

      return $date_arr[2].$month_name.substr($date_arr[0],2,2);
      
    }
    

    // The function to make the date format(YYYY-MM-DD) to english form like DDth,MMMMMMM,YYYY

    function to_chi_date($date){
      // explode the date into array, $date_arr[0] = year, $date_arr[1] = month, $date_arr = day
      if (!strpos($date,"-")) return $date;
      $date_arr = explode("-",$date);
	  
	  if ($date_arr[0]==""||$date_arr[1]==""||$date_arr[2]==""){
	  	return "";
	  }
	  
      switch ($date_arr[1]){
        case "1":
            $month_name = "1る";
            break;
        case "2":
            $month_name = "2る";
            break;
        case "3":
            $month_name = "3る";
            break;
        case "4":
            $month_name = "4る";
            break;
        case "5":
            $month_name = "5る";
            break;
        case "6":
            $month_name = "6る";
            break;
        case "7":
            $month_name = "7る";
            break;
        case "8":
            $month_name = "8る";
            break;
        case "9":
            $month_name = "9る";
            break;
        case "10":
            $month_name = "10る";
            break;
        case "11":
            $month_name = "11る";
            break;
        case "12":
            $month_name = "12る";
            break;
        default:
            $month_name = "杉�~";
      }

      if (substr($date_arr[2],0,1)=="0"){
        $date_arr[2] = substr($date_arr[2],1,1);
      }

      if ($date_arr[2]==1){
        $ex_name = "st";
      }elseif($date_arr[2]==2){
        $ex_name = "nd";
      }elseif($date_arr[2]==3){
        $ex_name = "rd";
      }else{
        $ex_name = "th";
      }

      return substr($date_arr[0],2,2)."�~".$month_name.$date_arr[2]."ら";
      
    }
?>