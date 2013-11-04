<!DOCTYPE html>
<html>
    <head>
    	<title><?php if(isset($title)) echo $title; ?></title>

	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         <link rel="stylesheet" href="/css/app.css" type ="text/css">

	    <!-- Controller Specific JS/CSS -->

	    <!-- tracking scripts
	    you may have java script has to be there before the java code execute
	    it comes down to a performance thing - so js script let all the content load
	    first, then let the java script -->

        <!--currently line 17 is generating an error code in w3c validation - it's encoding the php cod below as a script attribute
        and attribute value must not be empty an assigned value-->
	    <?php if(isset($client_files_head)) echo $client_files_head; ?>
	
    </head>

  <body>
    <div id="header">
        <?=APP_NAME?>

    </div><!--end of Header"-->


    <div id='navigation'>

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
            <a href='/users/login'>Log in</a>

        <?php endif; ?>

    </div><!-- End of Navigation here -->

    <br>


    <?php if(isset($content)) echo $content; ?>


    <!-- if -->
	<?php if(isset($client_files_body)) echo $client_files_body; ?>

    <div id="footer"  >

        <ul>

            <li>&bull; Last updated on: November 2,2013</li>

            <li>&copy; 2013 AfterChatter.com All rights reserved.</li>
            <li <a id="Profile" title="Go to Home" class="Home page" href='/'>Home</a> | <a id="Profile" title="Your Chatters" href="/users/profile"> Your Profile </a></li>

        </ul>


    </div> <!--close footer-->

  </body>
</html>
