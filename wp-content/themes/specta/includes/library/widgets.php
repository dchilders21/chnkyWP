<?php
///----Blog widgets---

/// Latest Posts 
class Bunch_Latest_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Latest_Post', /* Name */esc_html__('Specta Latest Posts','specta'), array( 'description' => esc_html__('Show the latest posts', 'specta' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Recent Posts -->
        <div class="sidebar-widget popular-posts">
            <div class="sidebar-title"><h2><?php echo wp_kses_post( $instance['title'] ); ?> <span class="theme_color">.</span></h2></div>
            
			<?php $query_string = 'posts_per_page='.$instance['number'];
            if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
             
            
            $this->posts($query_string);
            ?>
            
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('LATEST POSTS', 'specta');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'specta'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'specta'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'specta'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'specta'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query( $query_string );
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
				<?php while( $query->have_posts() ): $query->the_post(); ?>
                    <article class="post">
                        <div class="text">
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title(); ?></a>
                        </div>
                        <div class="post-info"><?php echo get_the_date();?></div>
                    </article>
                <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}


//About Us
class Bunch_About_us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Abous_us', /* Name */esc_html__('Specta Abous Us','specta'), array( 'description' => esc_html__('Show the information about company', 'specta' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>


            <!-- Popular Posts -->
            <div class="sidebar-widget about-widget">
                <div class="sidebar-title"><h2><?php echo wp_kses_post( $instance['title'] ); ?> <span class="theme_color">.</span></h2></div>
                <div class="text"><?php echo wp_kses_post($instance['content']); ?></div>
            </div>

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Us';
		$content = ($instance) ? esc_attr($instance['content']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'specta'); ?></label>
            <input placeholder="<?php esc_attr_e('About Us', 'specta');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'specta'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>       
                
		<?php 
	}
	
}

///----footer widgets---

class Bunch_Footer_Logo extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Footer_Logo', /* Name */esc_html__('Specta Footer Logo','specta'), array( 'description' => esc_html__('Show Specta Footer Logo', 'specta' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            
            <!--Footer Column-->
            <div class="footer-widget logo-widget">
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $instance['logo_url'] ); ?>" alt="<?php esc_attr_e( 'Footer Style Two Logo', 'specta' ); ?>"/></a>
                </div>
            </div>

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['logo_url'] = strip_tags($new_instance['logo_url']);

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$logo_url = ($instance) ? esc_attr($instance['logo_url']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_url')); ?>"><?php esc_html_e('Footer Logo Url: ', 'specta'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_url')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_url')); ?>" type="text" value="<?php echo esc_attr($logo_url); ?>" />
        </p>        
                
		<?php 
	}
	
}


/// Services
class Bunch_Services extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Services', /* Name */esc_html__('Specta Services','specta'), array( 'description' => esc_html__('Show Services', 'specta' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>

        <div class="footer-widget links-widget">
            <div class="footer-title">
                <h2><?php echo wp_kses_post( $instance['title'] ); ?> <span class="theme_color">.</span></h2>
            </div>
            <ul class="footer-lists">
                <?php $query_string = 'posts_per_page='.$instance['number'];
                    if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
                    
                    $this->posts($query_string);
                ?>
            </ul>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('SERVICES', 'specta');
		$number = ( $instance ) ? esc_attr($instance['number']) : 5;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'specta'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'specta'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'specta'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'specta'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query( $query_string ); 
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
				<?php while( $query->have_posts() ): $query->the_post();
                    $services_meta = _WSH()->get_meta();
                    $ext_url = specta_set( $services_meta, 'ext_url' );
                ?>
                    <li><a href="<?php echo esc_url( $ext_url ); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Social Media
class Bunch_Social_Media extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Social_Media', /* Name */esc_html__('Specta Social Media','specta'), array( 'description' => esc_html__('Show Social Media & Copy Right Section', 'specta' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>


        <div class="footer-widget info-widget">
            <ul class="social-icon-one">
                <?php if( $instance['show'] ): ?>
                	<?php echo wp_kses_post(specta_get_social_icons()); ?>
                <?php endif; ?>
            </ul>
            <div class="text"><strong><?php echo wp_kses_post( $instance['title'] ); ?></strong> <br><?php echo wp_kses_post( $instance['content'] ); ?> </div>
        </div>

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
        
        $instance['show'] = $new_instance['show'];
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
        $show = ( $instance ) ? esc_attr($instance['show']) : '';
		$title = ($instance) ? esc_attr($instance['title']) : 'Specta Minimal Theme';
		$content = ($instance) ? esc_attr($instance['content']) : '&copy; 2018 All rights reserved';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'specta'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'specta'); ?></label>
            <input placeholder="<?php esc_attr_e('About Us', 'specta');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Copyright:', 'specta'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>       
                
		<?php 
	}
	
}