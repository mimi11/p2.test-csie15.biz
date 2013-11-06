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

        <!--currently line 17 is generating an error code in w3c validation - it's encoding the php cod below as a script attribute
        and attribute value must not be empty an assigned value-->
	    <?php if(isset($client_files_head)) echo $client_files_head; ?>

    </head>

  <body>
    <div class= "doc">
        <div id="wrapper">
            <div id="header"><!--div Header starts here-->
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
                     <a href='/users/login'title="Are you already a member? Login here">Log in</a>
                    <?php endif; ?>

              </div><!-- End of Navigation div here -->

                <br>


        <?php if(isset($content)) echo $content; ?>

         <div id="Landing_page">

         </div>


        <!-- if -->
        <?php if(isset($client_files_body)) echo $client_files_body; ?>

            <!-- Footer div begins here -->

            <div id="footer" class="gtfooter" >
                <ul>
                    <li>&bull; Last updated on: November 5,2013 </li><nobr></nobr><li>&copy; 2013 AfterChatter.com All rights reserved.</li>&nbsp;
                    <li class="bottomnav"> <a id="home" title="Go to Home" class="Home page" href="/">Home </a>|
                        <a id="home" title="Your Profile" class="ctus" href="/users/login"> Login </a>
                </ul>

            </div><!--End of Footer div-->
        </div><!--End of Wrapper div-->
     </div><!--End of doc div-->
 </body>
</html>
