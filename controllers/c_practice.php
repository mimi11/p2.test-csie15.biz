<?php
class practice_controller extensds base_controller{
public function test(1){

echo “Test 1”;

// the reason that require is here, is just because the way the router is working
//we may have other functions that may not need this path.

require(‘APPP_PATH.’/libraries/image.php);
//APP_PATH is a constant that exists - and we will talk about it when we talk about cascading file system.
echo APP_PATH. “<br>”;
echo DOC_ROOT. “<br>”;

$imageObj = new Image(‘http://placekitten.com/1000/1000’);

//single way to access single properties when using arrow
$imageObj->resize(200, 200);
$imageoObj->display();
// we instantiated the class
//use properties setup in declaring the variable from methods
//use methods
//when seeing the controllers -> you should understand that its pointing to methods 
//already defined in these other classes

}

public function test2(){
 # static way of accessing class by using keystrokes double” “
 echo Time::now();
 //Time has all different functionalities, display nice format, give a timestamp,
 //it doesn’t matter what are the functionality i just want to use the functionalities
 
 }

}