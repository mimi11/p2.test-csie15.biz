<?php foreach($posts as $post): ?>

    <article>

      <div class="user_id">
            <h1><?=$post['first_name']?> <?=$post['last_name']?>&nbsp</h1>
        </div>

       <div id="post"> <h2>posted on:</h2>

       </div>

        <br>

       <div id="post_info">
        <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
            <?=Time::display($post['created'])?>
        </time>

       </div>
        <br>

       <div= "post_content">
        <p><br><?=$post['content']?></p>
        <a href='/posts/Update/<?=$post['post_id']?>'>Update</a>
       </div>
    </article>



<?php endforeach; ?>
