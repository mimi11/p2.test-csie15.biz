<?php if ($user): ?>

    <!--<div class="avatar" style="background: url('<?=$user->avatar; ?>') center center no-repeat;"></div>-->

    <div class="avatar">
        <img src="/users/avatar" class="chix_avatar" alt="user_avatar">
    </div>

    <div id="profile_links"
        <br>
        <a href='/users/bio/''>View Bio Info Here</a> |  <a href='/posts/add'> Add a new Chatter Here</a>
        <br>
        <br>

        <p>All My Chatters: &nbsp;<a href='/users/profile/'> See Below</a></p>
        <br>
        <br>
    </div> <!--End of profile links div-->

<?php foreach ($posts as $post_profile): ?>
        <div id="profile"><!--start of div profile-->

            <article>

                <div id="users_id"
                <h1><?= $post_profile['first_name'] ?> <?= $post_profile['last_name'] ?>&nbsp</h1>
        </div><!--end of div users_id-->


        <div id="post">
            <h2>posted on:</h2>
        </div><!--end of div post-->


        <div id="post_info">
            <time datetime="<?= Time::display($post_profile['created'], 'Y-m-d G:i') ?>">
                <?= Time::display($post_profile['created']) ?>
                <br>
            </time>
        </div><!--end of div post_info-->


        <div= "post_content">
                     <br>
                     <p> <?= $post_profile['content'] ?></p>
                    <a href='/posts/Update/<?= $post_profile['post_id'] ?>'>Update</a> | <a
            href='/posts/delete/<?= $post_profile['post_id'] ?>'>Delete</a>
                    <br>
                </div><!--end of div post_content-->

        </article>
    </div> <!--end of div profile-->
    <?php endforeach; ?>


    <!-- Menu options for users who are not logged in -->

<?php endif; ?>
