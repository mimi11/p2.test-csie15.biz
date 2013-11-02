<h1>Welcome  <?=$user->first_name?> <?=$user->last_name?> </h1>
<img src="http://ecx.images-amazon.com/images/I/512TRQ74cnL._SL75_.jpg" alt="Book Cover"/>

   <!-- <div id="Profile"

    <li class="userProfile">
        <ul>
            <li class="fname"> <h3>First Name: <?=$user->first_name?></h3></li>
            <li class="Lname"><h3>Last Name:<?=$user->last_name?>

        </ul>
    </li>

-->
<br>

<a href='/posts/add'>Add a new chatter!</a>";

<br>
<br>


<p><a href='/users/profile/<?=$post_profile['post_id']?>'>Edit Profile</a></p>


<?php foreach($posts as $post_profile): ?>

    <article>

        <div class="profile_chatter">
            <div id="users_id"
            <h1><?=$post_profile['first_name']?> <?=$post_profile['last_name']?>&nbsp</h1>
        </div>

        <div id="post"> <h2>posted on:</h2>

        </div>

        <div id="post_info">
            <time datetime="<?=Time::display($post_profile['created'],'Y-m-d G:i')?>">
                <?=Time::display($post_profile['created'])?>
            </time>

        </div>

        <div= "post_content">
        <p><br><?=$post_profile['content']?></p>
        <a href='/posts/Update/<?=$post_profile['post_id']?>'>Update</a>
        <a href='/posts/delete/<?=$post_profile['post_id']?>'>Delete</a>
        <br>
        </div>
       </div> <!--end of class profile chattr-->
    </article>
    <br>
    <br>

<?php endforeach; ?>


