<h2> LOGIN </h2>
<form method='POST' action='/users/p_login'>

    Email<br>
    <input type='text' name='email'>
    <br><br>

    Password<br>
    <input type='password' name='password'>
    <br><br>

    <?php if($error == 'password_error'): ?>
        <div class='error'style="color: #090; line-height: 1.2">
            Login failed. Please double check your password.
        </div>
        <br>
    <?php endif; ?>

    <?php if($error == 'email_error'): ?>
    <div class='error' style="color: #090; line-height: 1.2">
        Login failed. Please double check your email.
    </div>
    <br>
    <?php endif; ?>
    <input type='submit' value='Log in'>

</form>
<div id="footer"  >

    <ul>

        <li>&bull; Last updated on: November 2,2013</li>

        <li>&copy; 2013 AfterChatter.com All rights reserved.</li>
        <li <a id="home" title="Go to Home" class="Home page" href="/">Home </a> | <a id="Profile" title="Your Chatters" href="/users/profile"> Your Profile </a></li>

    </ul>


</div> <!--close footer-->
