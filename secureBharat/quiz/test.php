<?php                       //sucessfully ok
function check($key , $value){
//foreach($_POST as $key => $value){

    if($key=="name"){
        if(preg_match("/^[a-zA-Z ]{3,200}$/",$value)){return true;}
        else{return FALSE;}
    }
    if($key=="email"){
        if ((preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$value)) or empty($value)){
            return TRUE;
        }
        else {return FALSE;}
    }

    if($key=="password"){
        if(preg_match("/^[a-zA-Z0-9 !?,@#'.%&)(-]{3,200}$/",$value)){return TRUE;}
        else {return FALSE;}
    }


    /*
    if($key=="plan" or $key=="room_for_gender"){
        if(preg_match("/^[a-z 0-9]{1,20}$/",$value)){return TRUE;}
        else{return FALSE;}
    }
    if($key=="room_for_number" or $key == "fees_paid" or $key == "budget"){
        if(preg_match("/^[a-z 0-9]{0,5}$/",$value)){return TRUE;}
        else{return FALSE;}
    }
    if($key == "no_of_unbooked_rooms" or $key == "booking_status" or $key == "vacant_room_no" or $key == "status_booking" or $key == "total_room"){
        if(preg_match("/^[0-9]{0,3}$/",$value)){return TRUE;}
        else{return FALSE;}
    }
    if($key=="paid"){
        if(preg_match("/^[a-z]{2,3}$/",$value)){return TRUE;}
        else{return FALSE;}
    }
    if($key=="gender"){
        if($value=="m" or $value=="f"){return TRUE;}
        else {return FALSE;}
    }
    if($key=="desc" or $key=="rental_name" or $key=="address" or $key=="place"){
        if(preg_match("/^[a-zA-Z0-9 !?,@#'.%&:)(-]{0,500}$/",$value)){return TRUE;}
        else{return FALSE;;}
    }
    if($key=="coaching_name1" or $key=="coaching_name2" or $key=="coaching_name3"){
        if(preg_match("/^[a-zA-Z0-9 !?,@#'.%&:)(-]{0,500}$/",$value)){return TRUE;}
        else{return FALSE;;}
    }

    if($key=="id" or $key=="receipt_no"){
        if(preg_match("/^[0-9]{0,9}$/",$value)){return TRUE;}
        else{return FALSE;}
    }



    if($key=="distance_from_coaching1" or $key=="distance_from_coaching2" or $key=="distance_from_coaching3" or $key=="room_width" or $key=="room_height"){
        if(preg_match("/^[0-9.]{0,10}$/",$value)){return TRUE;}
        else {return FALSE;}}

    if($key=="amount"){
        if(preg_match("/^[0-9.]{1,6}$/",$value)){return TRUE;}
        else {return FALSE;}}

    if($key=="mobile"){
        if(preg_match("/^[0-9]{10,11}$/",$value)){return TRUE;}
        else {return FALSE;}}

    if($key=="id" or $key=="rating"){
        if(preg_match("/^[0-9]{0,10}$/",$value)){return TRUE;}
        else {return FALSE;}}

    if($key=="register"){
        return TRUE;
    }

    */

    if($key=="submit"){
        if($value=="submit"){return TRUE;}
        else {return FALSE;}}
}

function safe($value)
{
    $safe = strip_tags(trim($value));
    return $safe;
}

?>
