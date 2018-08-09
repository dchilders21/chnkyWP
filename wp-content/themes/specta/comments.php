<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<?php $protocol = is_ssl() ? 'https://' : 'http://';?>

<?php if ( have_comments() ) : ?>
 <div class="comments-area">
    <div class="group-title pb-45">
        <h2>
        	<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'specta' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'specta'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
        
        <span class="theme_color">.</span></h2>
    </div>

    <?php
        wp_list_comments( array(
            'style'       => 'div',
            'short_ping'  => true,
            'avatar_size' => 74,
            'callback'=>'specta_bunch_list_comments'
        ) );
    ?>

    <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'specta' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'specta' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'specta' ) ); ?></div>
    </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>
    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'specta' ); ?></p>
    <?php endif; ?>
</div>
<?php endif;?> 

<!-- Heading -->
<?php if ( comments_open()) : ?>
    <div class="comment-form">
        <?php specta_bunch_comment_form(); ?>
    </div>
<?php endif; ?>
