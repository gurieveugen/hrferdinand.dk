<?php $comments = (array)$comments; ?>
<div class="comments">
       <?php if(!empty($comments)): ?>
        <div class="text_comments">
                <h3>KOMMENTARER</h3>
             <?php foreach ($comments as $comment): ?>   
                <div class="one_commnents">
                        <div class="name_user_comment">
                                <?php echo $comment->comment_author; ?>
                                <div class="time_of_birth">
                                        <?php echo strftime('%d/%m/%Y',strtotime($comment->comment_date)); ?>
                                </div>
                        </div>

                        <div class="this_text_comment">
                               <?php echo $comment->comment_content; ?>
                        </div>
                </div>
              <?php endforeach; ?>  
        </div>
        <?php endif; ?>
        <div class="add_comments">
                <h3><a class="click_function" href="#">SKRIV EN KOMMENTAR</a></h3>
                <div class="submit_block">
                 <form action="/wp-comments-post.php" method="post">
                        <div><span class="red_star">*</span> - indikerer nødvendig</div>
                        <div class="add_name">
                                <div>Navn<span class="red_star">*</span></div>  
                                <input type="text" name="author"/>
                        </div>
                        <div class="add_email">
                                <div>Email<span class="red_star">*</span></div>
                                <input type="text" name="email"/>
                        </div>
                        <div class="textarea">
                                Kommentar
                                <textarea name="comment"></textarea>
                        </div>
                        <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>" id="comment_post_ID" /> 
                        <div class="button_add">
                                <input type="submit" value="Tilmeld">
                        </div>
                </form>
               </div>     
        </div>
</div>