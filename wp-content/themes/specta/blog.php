<!--News Block-->
<div class="news-block-three">
    <div class="inner-box">
        <?php if( has_post_thumbnail() ):?>
        <div class="image">
            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
                <?php the_post_thumbnail( 'spectax1170x564', array( 'class' => 'img-responsive' ) ); ?>
            </a>
            <div class="post-date"><?php echo get_the_date(); ?></div>
        </div>
        <?php endif;?>
        <div class="lower-content <?php if(! has_post_thumbnail() == true ) echo 'pt-0'?>">
            <ul class="post-meta">
                <li><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>"><span class="icon flaticon-user-1"></span><?php the_author(); ?></a></li>
                <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments');?>"><span class="icon flaticon-shapes"></span><?php comments_number( wp_kses_post(__('0 Comments' , 'specta')), wp_kses_post(__('1 Comment' , 'specta')), wp_kses_post(__('% Comments' , 'specta'))); ?></a></li>
                <li><span class="icon flaticon-tags"></span><?php the_category();?></a></li>
            </ul>
            <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a></h3>
            <div class="text"><?php echo wp_trim_words( get_the_content(), 45 ); ?></div>
        </div>
    </div>
</div>