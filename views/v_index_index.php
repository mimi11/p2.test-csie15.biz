<h1>Welcome to <?= APP_NAME ?><?php if ($user) echo ', ' . $user->first_name; ?></h1>


<?php if ($user): ?>





    <!-- Menu options for users who are not logged in -->
<?php else: ?>

    <div id="intro">

        <p>

            <br>The hangout place for busy professionals.
            <br>Never miss out again on that latest news from missing your children school event, or parent meeting,
            <br>or that work after-party u couldn't go to, and or the fund-raiser event that u mother-in-law organized
            and made u promised to attend. AfterChatter will keep plugged in!
            <br>Just follow the users from these communities to get the Executive brief-up!

        </p>
    </div><!--end of intro div-->

    <br>

    <pre>
     This is a special project for CSCIE-15. The special + features are:
     1. Edit Post
     2. Delete Post

     </pre>




<?php endif; ?>
