<form method='POST' action='/posts/p_update'>

    <label for='content'> Update Post:</label><br>
    <textarea name='content' id='content'><?=$post['content']?></textarea>
    <br><br>
    <input type='Submit' value='update'>
    <input type ='hidden' name='post_id' value ="<?=$post['post_id']?>">


</form>

<div id="footer"  >

    <ul>

        <li>&bull; Last updated on: November 2,2013</li>

        <li>&copy; 2013 AfterChatter.com All rights reserved.</li>
        <li <a id="home" title="Go to Home" class="Home page" href="/"> Home </a> | <a id="Profile" title="Your Chatters" href="/users/profile"> Your Profile </a></li>

    </ul>


</div> <!--close footer-->
