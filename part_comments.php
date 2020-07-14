<div class="comments-container">

<p class="comments-count">
  <i class="fas fa-comments"></i>
  <?php comments_number( 'Be the first to comment :)', 'One Response', '% responses' ); ?>
</p>

<?php comments_template(); ?>
<!-- templete name: better-comments.php-->
<br>
<br>
<br>
<?php
    //Declare Vars
$comment_send = 'send';
$comment_reply = 'Join the Discussion';
$comment_reply_to = 'Reply';
 
$comment_author = 'My Name';
$comment_email = 'email@example.com';
$comment_body = 'Leave a Comment';
$comment_url = 'www.MyWebsite.com';
$comment_cookies_1 = ' By commenting you accept the';
$comment_cookies_2 = ' Privacy Policy';
 
$comment_before = 'Registration isn\'t required.';
 
$comment_cancel = 'Cancel Reply';
    
$comments_args = array(
 //Define Fields
    'fields' => array(
        //Author field
        'author' => '<p class="comment-form-author"><br />
        
        <label for="author" class="form__label">Name:<span class="required">*</span></label>
        <input class="form__field" id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input>
        
        </p>',
        
        //Email Field
        'email' => '<p class="comment-form-email"><br />
        
        <label for="email" class="form__label">E:Mail:<span class="required">*</span></label>
        <input class="form__field" id="email" name="email" aria-required="false" placeholder="' . $comment_email .'"></input>
        
        </p>',
        
        //URL Field
        'url' => '<p class="comment-form-url"><br />
        
        <label for="url" class="form__label">Website: </label>
        <input class="form__field" id="url" name="url" aria-required="false" placeholder="' . $comment_url .'"></input>
        
        </p>',
        
        //Cookies
        'cookies' => '<input type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
    ),
    // Change the title of send button
//    'label_submit' => __( $comment_send, 'textdomain' ),
    // Change the title of the reply section
    'title_reply' => __( $comment_reply ),
    // Change the title of the reply section
    'title_reply_to' => __( $comment_reply_to ),
    //Cancel Reply Text
    'cancel_reply_link' => __( $comment_cancel ),
    // Redefine your own textarea (the comment body).
    'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></p>',
    //Message Before Comment
    'comment_notes_before' => __( $comment_before),
    // Remove "Text or HTML to be displayed after the set of comment fields".
    'comment_notes_after' => '',
    //Submit Button ID
    'id_submit' => __( 'comment-submit' ),
);
comment_form( $comments_args );
?></div>