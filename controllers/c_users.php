<?php
class users_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "users_controller construct called<br><br>";
    } 

    public function index() {
        echo "This is the index page";
    }

    public function signup() {

            # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up";

            # Render template
            echo $this->template;

    }

        public function p_signup() {

            # Dump out the results of POST to see what the form submitted
            echo '<pre>';
            print_r($_POST);
            echo '</pre>';

            # Insert this user into the database
            $user_id = DB::instance("p2_test-cscie15_biz")->insert('users', $_POST);


            # More data we want stored with the user
            $_POST['created']  = Time::now();
            $_POST['modified'] = Time::now();


            # For now, just confirm they've signed up -
            # You should eventually make a proper View for this
            echo 'You\'re signed up'." ".$user_id;

        }



    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {
    
    
    # set up the view



        $this->template->content = View::instance('v_users_profile');

    /* $title is another variable used in _v_template to set the <title> of the page
    $this->template->title = "Profile";*/

    # Pass information to the view fragment     (pass the data for the view)
    $this->template->content->user_name = $user_name;

    # Render View
    echo $this->template;

        if($user_name == NULL) {

        $view = View::instance('v_users_profile');
        $view->user_name =$user_name;

    }
}
} # end of the class
