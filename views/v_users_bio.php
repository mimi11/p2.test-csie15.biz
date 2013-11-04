<h1>Your Info</h1>

<!--<p><img src="http://duplexchick.com/files/2011/07/web-dc-avatar1-300x300.jpg"</p>-->
<p>First Name: <?=$user->first_name?> </p>
<p>Last Name: <?=$user->last_name?> </p>
<p>Email: <?=$user->email?> </p>
<p>Update your profile picture here:</p>



<form action="/users/bio_update" method="post"
      enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"><br>
    <input type="submit" name="submit" value="Submit">
</form>

    </form>
</div> <!-- bio div ends here-->

