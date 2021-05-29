<?php
/*
 * ### COMMENTI ###
 * 
 */
?>

<div class="row mt64">
    <div class="col-12">
        <h4><?php esc_html_e('Comments','italiawp2'); ?></h4>

        <?php
        $args = array(
            'status' => 'approve',
            'post_id' => get_the_ID(),
        );

        $comments_query = new WP_Comment_Query;
        $comments = $comments_query->query($args);

        if ($comments) {
            foreach ($comments as $comment) {
                $commenter = wp_get_current_commenter();
                $req = get_option('require_name_email');
                $aria_req = ( $req ? " aria-required='true'" : '' );
                $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"'; ?>
        
                <div class="callout callout-highlight pt16 pb16">
                    <div class="callout-title mb0"><?php echo $comment->comment_author; ?></div>
                    <p><?php echo $comment->comment_content; ?></p>
                </div>
        
            <?php }
        } else { ?>
        
                <div class="callout callout-highlight pt16 pb16">
                    <p><?php esc_html_e('No comment','italiawp2'); ?></p>
                </div>
        
    <?php } ?>
    </div>
    
    <div class="col-12">
        <div class="callout callout-highlight pt16 pb16">
            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';

            $fields = array(
                'author' =>
                '<div class="form-row">' .
                    '<div class="form-group col-12">' .
                        '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ($req ? ' size="30" required' : '') . '>' .
                        '<label ' . ( $req ? 'is-required' : '' ) . '" for="author">' . esc_html__('Name','italiawp2') . ($req ? '*' : '') . '</label>' .
                    '</div>' .
                '</div>',
                
                'email' =>
                '<div class="form-row">' .
                    '<div class="form-group col-12">' .
                        '<input class="form-control" id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ($req ? ' size="30" required' : '') . '>' .
                        '<label ' . ( $req ? 'is-required' : '' ) . '" for="email">' . esc_html__('Email','italiawp2') . ($req ? '*' : '') . '</label>' .
                    '</div>' .
                '</div>',
                
                'url' =>
                '<div class="form-row">' .
                    '<div class="form-group col-12">' .
                        '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" ' . $aria_req . ' size="30">' .
                        '<label for="url">'.__('Site','italiawp2').'</label>' .
                    '</div>' .
                '</div>',
                
                'cookies' =>
                '<div class="form-row">' .
                    '<p class="is-required">'.__('Saving a cookie with my data (name, email, website) for the next comment','italiawp2').'</p>' .
                '</div>' .
                '<div class="form-row">' .
                    '<div class="form-check">' .
                        '<input class="form-check-input" type="checkbox" value="yes" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" ' . $aria_req . $consent . ' required>' .
                        '<label class="form-check-label" for="wp-comment-cookies-consent">' . ($req ? '*' : '') . esc_html__('I give my consent','italiawp2') .'</label>' .
                    '</div>' .
                '</div>'
            );

            $args = array(
                'fields' => $fields,
                
                'comment_field' =>
                '<div class="form-row">' .
                    '<div class="form-group col-12">' .
                        '<textarea id="comment" name="comment" maxlength="65525" ' . $aria_req . ($req ? ' required' : '') . ' rows="3"></textarea>' .
                        '<label for="comment">' . esc_html__('Comment','italiawp2') . ($req ? '*' : '') . '</label>' .
                    '</div>' .
                '</div>',
                
                'title_reply' =>
                '<div class="form-row">' .
                    '<p>'.__('Leave a comment','italiawp2').'</p>' .
                '</div>',
                
                'submit_button' =>
                '<div class="form-row mt32">' .
                    '<div class="form-group col-12 text-center mb0">' .
                        '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-primary" value="%4$s" />' .
                    '</div>' .
                '</div>'
            );
            
            comment_form($args); ?>
        </div>
    </div>
    
</div>
