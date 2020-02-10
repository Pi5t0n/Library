<?php

/*$myJSON = "[{"book_ID":"1","title":"LA RUTA INFINITA","isbn":"9788491393979","author":"JOSE CALVO POYATO","editorial":"HARPERCOLLINS","category":"HISTORY","lenguage":null,"created_At":null,"borrowed":"0","location_ID":"2","image_name":"larutaInfinita.png"},{"book_ID":"2","title":"SIDI","isbn":"9788420435473","author":"ARTURO PEREZ-REVERTE","editorial":"ALFAGUARA","category":"HISTORY","lenguage":null,"created_At":null,"borrowed":"0","location_ID":"7","image_name":"sidi.png"},{"book_ID":"3","title":"LOS PILARES DE LA TIERRA ","isbn":"9788401328510","author":"KEN FOLLETT","editorial":"PLAZA & JANES EDITORES","category":"HISTORY","lenguage":null,"created_At":null,"borrowed":"0","location_ID":"8","image_name":"lospilares.png"},{"book_ID":"4","title":"Algo","isbn":"q3452345234","author":"\u00c0aa","editorial":"","category":"","lenguage":"","created_At":"2020-01-08","borrowed":"0","location_ID":"9","image_name":"lospilares.png"},{"book_ID":"5","title":"\u00f1aaaa","isbn":"23452345\u00ba","author":"Ca\u00f1\u00e0","editorial":"","category":"","lenguage":"","created_At":"2020-01-08","borrowed":"0","location_ID":"5","image_name":"sidi.png"}]";*/


//$myarray=array('pepe','juan','pablo');
$age = array(array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"),array("Susan"=>"90", "Paco"=>"78", "Adrian"=>"55"));
$myarray_JSON=json_encode($age);
    echo $myarray_JSON;
?>