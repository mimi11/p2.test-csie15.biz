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
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {
    
    
    # set up the view
    
      $this->template->content =View::instance(‘v_users_profile’);
      
    # pass the data for the view
     $this->template->content->user_name = $user_name;
      
    
    echo $this ->$template;

        if($user_name == NULL) {
        
        $view = View::instance(‘v_users_profile’);
        $view->user_name =$user_name;


        echo $view;
    }
}
} # end of the class