<h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>


<?php if($user): ?>

    <?=Router::redirect('/users/profile')?>



    <!-- Menu options for users who are not logged in -->
<?php else: ?>


    <pre>
     This is a special project for CSCIE-15. The special + features are:
     1. Update Post
     2. Delete Post


 </pre>




<?php endif; ?>
