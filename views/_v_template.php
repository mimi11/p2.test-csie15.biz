<!DOCTYPE html>
<html>
    <head>
    	<title><?php if(isset($title)) echo $title; ?></title>

	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


	    <!-- Controller Specific JS/CSS -->
        <link rel="stylesheet" href="/css/app.css" type ="text/css"/>

	    <!-- tracking scripts
	    you may have java script has to be there before the java code execute
	    it comes down to a performance thing - so js script let all the content load
	    first, then let the java script -->


	   <!-- ?php if(isset($client_files_head)) echo $client_files_head; ?>-->


    </head>

     <body>
         <div id = "wrapper">
              <div id = "header"><!--div Header starts here-->

                  <h1><?=APP_NAME?></h1>
                    <div id="intro"><!--div Intro starts here-->
                    <h5>Welcome to <?= APP_NAME ?><?php if ($user) echo ', ' . $user->first_name; ?></h5>
                    </div><!--end of div intro"-->

              </div><!--End of div Header"-->

              <div id='navigation'><!--div Navigation starts here-->

                    <a href='/'>Home</a>

           <!-- Menu for users who are logged in -->
                  <?php if($user): ?>

                    <a href='/users/logout'>Logout</a>
                    <a href='/users/profile'>My Profile</a>
                    <a href='/posts/users'> Members</a>
                    <a href='/posts'> Followed Chatters</a>


          <!-- Menu options for users who are not logged in -->
                    <?php else: ?>

                     <a href='/users/signup'>Sign up</a>
                     <a href='/users/login' title="Are you already a member? Login here">Log in</a>
                    <?php endif; ?>

            </div><!-- End of Navigation div here -->

            <br>

            <div id="main"><!--Home Landing page view starts here-->

               <p><?php if(isset($content)) echo $content;?></p>


        

            </div> <!--end of main div-->

        </div><!--end of wrapper-->

       <div id= "footer">
                <ul>
                    <li>&bull;Special Features: Update and Delete Post</li> <li>&copy; 2013 AfterChatter.com All rights reserved.</li>
                </ul>
           <a title ="Go to Home"  href="/">Home </a>|
           <a title="Your Profile"  href="/users/login"> Login </a>

        </div><!--End of Footer div-->
 </body>
</html>
