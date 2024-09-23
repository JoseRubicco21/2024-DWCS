<?php declare(strict_types=1);
    
    // This has some black magic somehow works idk -- It doesn't work anymore.
    // I'm an slave to electric rocks doing beep-boop please help.
 

    function actuallyOKTripleCheck(array $numbers) : bool {
        $count = 0;
        $Triple = false;
        $anterior = "";
        foreach($numbers as $num) {
            if ($num == $anterior) $count++;
            else $count = 0;
            
            if($count == 2) {
                $Triple = true;
                break;
            } 
            $anterior = $num;
        }

        return $Triple;
    }



echo "<p>" . var_dump(actuallyOKTripleCheck(array(1,1,2,2,1))) ;
echo "<p>" . var_dump(actuallyOKTripleCheck(array(1,1,2,1,2,3))) ;
echo "<p>" . var_dump(actuallyOKTripleCheck(array(1,1,1,2,2,2,1)));

$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

function getCountries(array $array) : void {
    foreach($array as $country => &$item){
        echo "<p>The capital $country is $item </p>";
    }
}

getCountries($ceu);

?>