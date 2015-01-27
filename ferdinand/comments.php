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
                 <!--<form action="/wp-comments-post.php" method="post">
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
                </form>-->
                <style type="text/css">
                .si-captcha {
                    margin: 0px !important;
                }
                input#captcha_code {
                width: 171px !important;
                }
                .required {
                    color: #ff0000;
                }
                .comment-form-author label{
                    display: block;
                }
                .comment-form-author input{
                    display: block;
                    padding: 8px 0;
                    text-indent: 2%;
                    width: 100%;
                    margin: 5px 0 0 0;
                }
                .comment-form-email label{
                    display: block;
                }
                .comment-form-email input{
                    display: block;
                    padding: 8px 0;
                    text-indent: 2%;
                    width: 100%;
                    margin: 5px 0 0 0;
                }
                .form-submit input{
                    background-color: #AAAAAA !important;
                    border: 0 none;
                    border-radius: 4px 4px 4px 4px;
                    clear: both;
                    color: #FFFFFF;
                    cursor: pointer;
                    display: inline-block;
                    font-size: 15px;
                    font-weight: bold;
                    height: 32px;
                    line-height: 32px;
                    margin: 0 5px 10px 0;
                    padding: 0 22px;
                    text-align: center;
                    text-decoration: none;
                    vertical-align: top;
                    white-space: nowrap;
                    width: auto;
                }
                .form-submit input:hover{
                  background-color: #777777;
                }
                .captcha_container {
                    position: absolute;
                    margin-top: 252px;
                }
                .form-submit{
                  margin:25px 0 0 0;
                }
                #si_refresh_com {
                    position: absolute;
                }
                .captchaImgRefresh {
                    margin-left: 180px !important;
                }
                #captcha_code {
                    margin-top: 30px;
                }
                </style>
                <?php 
                $args = array(
                        $fields => apply_filters(array(
                          'author' =>
                            '<div class="add_name"><div>Navn<span class="red_star">*</span></div><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                            '" size="30"' . $aria_req . ' /></div>',
                          'email' =>
                            '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
                            ( $req ? '<span class="required">*</span>' : '' ) .
                            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                            '" size="30"' . $aria_req . ' /></p>',
                            'url' => false,
                        )),
                        'label_submit' => 'Tilmeld',
                        'comment_field' => '<div class="textarea">Kommentar<textarea name="comment"></textarea></div><br/>',
                        'comment_notes_after' => '<br/><br/><br/><br/><br/><br/>',
                        'comment_notes_before' => '<div><span class="red_star">*</span> - indikerer nødvendig</div><br/>',
                        'title_reply' => ''
                    );
                comment_form($args); ?>
               </div>     

        </div>
</div>