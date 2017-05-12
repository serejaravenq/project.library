<?php

/***** filter data *******/
/*for integer*/

function clearInt($data){
    return abs((int)$data);
}


/*for string*/
function clearStr($data){
    return trim(strip_tags($data));
}

/***** filter data END*******/	
?>