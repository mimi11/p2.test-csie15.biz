   <form method='POST' action='/posts/p_update'>

    <label for='content'> Update Post:</label><br>
    <textarea name='content' id='content'><?=$post['content']?></textarea>
    <br><br>
    <input type='Submit' value='update'>
    <input type ='hidden' value ="<?=$post['post_id']?>">


</form>
