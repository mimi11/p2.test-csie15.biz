<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<!-- tracking scripts
	you may have java script has to be there before the java code execute
	it comes down to a performance thing - so js script let all the content load
	first, then let the java script -->
	
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
    <div id='menu'>

        <a href='/'>Home</a>

        <!-- Menu for users who are logged in -->
        <?php if($user): ?>

            <a href='/users/logout'>Logout</a>
            <a href='/users/profile'>Profile</a>

            <!-- Menu options for users who are not logged in -->
        <?php else: ?>

            <a href='/users/signup'>Sign up</a>
            <a href='/users/login'>Log in</a>

        <?php endif; ?>

    </div>

    <br>

    <?php if(isset($content)) echo $content; ?>

<!-- if -->
	<?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>
