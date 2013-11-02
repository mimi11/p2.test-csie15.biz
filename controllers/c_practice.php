<?php
class practice_controller
{

    public function test1()
    {
        //echo APP_PATH;
        require(APP_PATH . "/libraries/Image.php");
        $imageObj = new Image('http://placekitten.com/1000/1000');

        $imageObj->resize(500, 500);

        $imageObj->display();
    }

    public function test2()
    {
        # static way of accessing class by using keystrokes double” “
        echo Time::now();
        //Time has all different functionalities, display nice format, give a timestamp,
        //it doesn’t matter what are the functionality i just want to use the functionalities

    }

    public function db_test()
    {

        $mysqli = new mysqli("localhost", "root", "root", "p2_test-cscie15_biz");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }


        echo $mysqli->host_info . "\n";


        # Our SQL command
        // $q = "INSERT INTO users SET
        //first_name = 'Fish',
        //last_name = 'Bone',
        //email = '@whitehouse.gov'";

# Run the command
        //  echo DB::instance("p2_test-cscie15_biz")->query($q);


        $data = Array(
            'first_name' => 'Sam',
            'last_name' => 'Seaborn',
            'email' => 'seaborn@whitehouse.gov');


        //  Insert requires 2 params
        //1) The table to insert to
        // 2) An array of data to enter where key = field name and value = field data

        // The insert method returns the id of the row that was created

        $user_id = DB::instance("p2_test-cscie15_biz")->insert('users', $data);

        echo 'Inserted a new row; resulting id:' . $user_id;


        $_POST['first_name'] = 'ALbert';
        $POST = DB::instance(DB_NAME)->sanitize($_POST);
        $q = 'Select email from users
            where first_name = "' . $_POST['first_name'] . ' " ';
        echo $q;
        echo DB::instance("p2_test-cscie15_biz")->query($q);

        /*       $_POST = DB::instance("p2_test-cscie15_biz")->sanitize($_POST);

               $q = "SELECT token
           FROM users
           WHERE email = '".$_POST['email']."'
           AND password = '".$_POST['password']."'";

               $token = DB::instance("p2_test-cscie15_biz")->select_field($q);
               echo 'Inserted a new row; resulting id:'.$user_id;*/

    }

}


