<?php
class practice_controller {
	
	public function test1() {
		//echo APP_PATH;
		require(APP_PATH. "/libraries/Image.php");
		$imageObj = new Image('http://placekitten.com/1000/1000');
		
		$imageObj->resize(500,500);
		
		$imageObj->display();
	}
	public function test2(){
 		# static way of accessing class by using keystrokes double” “
 		echo Time::now();
		 //Time has all different functionalities, display nice format, give a timestamp,
	 //it doesn’t matter what are the functionality i just want to use the functionalities
 
 	}
    public function db_test(){

        $mysqli = new mysqli("localhost", "root", "root", "p2_test-cscie15_biz");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }





        echo $mysqli->host_info . "\n";


        # Our SQL command
        $q = "INSERT INTO users SET
    first_name = 'Fish',
    last_name = 'Bone',
    email = 'FishBobe@whitehouse.gov'";

# Run the command
        echo DB::instance("p2_test-cscie15_biz")->query($q);







    }

}

?>
