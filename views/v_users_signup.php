<div id="signup">

</div><h2>Sign Up</h2>


<form method='POST' action='/users/p_signup'>

    First Name<br>
    <input type='text' name='first_name'>
    <br><br>

    Last Name<br>
    <input type='text' name='last_name'>
    <br><br>

    Email<br>
    <input type='text' name='email'>

    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>


    <?php if($error == 'duplicate_email_error'): ?>
        <div class='error'style="color: #090; line-height: 1.2">
            Sign up failed. E-Mail address already registered.
        </div>
        <br>
    <?php endif; ?>


    <?php if($error == 'blank_fields_error'): ?>
        <div class='error'style="color: #090; line-height: 1.2">
            Sign up failed. All fields must have a value
        </div>
        <br>

    <?php endif; ?>

        <input type='submit' value='Sign up'>

</form>


</div> <!-- signup div ends here-->
