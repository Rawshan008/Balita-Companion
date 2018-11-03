<?php 

class PopularPost extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'popularpost',
            __('Popular Post','balitac'),
            array('description'=>__('This is show balita populer post in widgets','balitac'))
        );
    }

    public function form( $instance ) {
        $title = isset($instance['title']) ? $instance['title'] : __('Populer Post','balitac');
        $count = isset($instance['count']) ? $instance['count'] : 2;
        
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php _e('Widget Title','balitac');?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" value="<?php echo esc_attr($title);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('count'));?>"><?php _e('Posts Per Page','balitac');?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('count'));?>" name="<?php echo esc_attr($this->get_field_name('count'));?>" value="<?php echo esc_attr($count);?>" type="number">
            </p>
        <?php 
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if(isset($instance['title']) && $instance['title'] !=''){
            echo $args['before_title'];
                echo apply_filters('widgets_title', $instance['title']);
            echo $args['after_title'];
        }
        $populer_post = new WP_Query(array(
            'posts_per_page' => $instance['count'],
            'orderby' => 'comment_count'
        ));
        ?>
            <div class="post-entry-sidebar">
            <ul>
        <?php
        while($populer_post->have_posts()) :
            $populer_post->the_post();
            ?>
                <li>
                    <a href="<?php the_permalink();?>">
                    <?php if(has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url();?>" alt="Image placeholder" class="mr-4">
                    <?php endif; ?>
                        <div class="text">
                        <h4><?php the_title(); ?></h4>
                        <div class="post-meta">
                            <span class="mr-2"><?php echo get_the_date();?> </span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number();?></span>
                        </div>
                        </div>
                    </a>
                </li>
            <?php  
        endwhile;
        wp_reset_postdata();
        ?>
            </div>
            </ul>
        <?php

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $old_instance = $new_instance;
            $instance['count'] = $new_instance['count'];
        return $old_instance;
    }

    

    
}