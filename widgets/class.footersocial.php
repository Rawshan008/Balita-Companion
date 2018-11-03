<?php 

class SocialFooter extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'footersocial',
            __('Footer Social','balitac'),
            array('description'=>__('Balita Footer Social widgets','balitac'))
        );
    }

    public function form( $instance ) {
        $title = isset($instance['title']) ? $instance['title'] : __('Biodata','balitac');
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = isset($instance['twitter']) ? $instance['twitter'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';
        $vimeo = isset($instance['vimeo']) ? $instance['vimeo'] : '';
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
        $snapchat = isset($instance['snapchat']) ? $instance['snapchat'] : '';
        
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php _e('Widget Title','balitac');?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" value="<?php echo esc_attr($title);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('facebook'));?>"><?php _e('Facebook Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook'));?>" name="<?php echo esc_attr($this->get_field_name('facebook'));?>" value="<?php echo esc_attr($facebook);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('twitter'));?>"><?php _e('Twitter Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter'));?>" name="<?php echo esc_attr($this->get_field_name('twitter'));?>" value="<?php echo esc_attr($twitter);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('instagram'));?>"><?php _e('Instagram Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram'));?>" name="<?php echo esc_attr($this->get_field_name('instagram'));?>" value="<?php echo esc_attr($instagram);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('vimeo'));?>"><?php _e('Vimeo Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo'));?>" name="<?php echo esc_attr($this->get_field_name('vimeo'));?>" value="<?php echo esc_attr($vimeo);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('youtube'));?>"><?php _e('Youtube Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube'));?>" name="<?php echo esc_attr($this->get_field_name('youtube'));?>" value="<?php echo esc_attr($youtube);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('snapchat'));?>"><?php _e('Snapchat Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('snapchat'));?>" name="<?php echo esc_attr($this->get_field_name('snapchat'));?>" value="<?php echo esc_attr($snapchat);?>" type="text">
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
        
        ?>
            <ul class="list-unstyled footer-social">
                <?php if(!empty($instance['facebook'])) : ?>
                    <li><a href="<?php echo esc_attr($instance['facebook']);?>"><span class="fa fa-facebook"></span> Facebook</a></li>
                <?php endif; ?>
                <?php if(!empty($instance['twitter'])) : ?>
                    <li><a href="<?php echo esc_attr($instance['twitter']);?>"><span class="fa fa-twitter"></span> Twitter</a></li>
                <?php endif; ?>
                <?php if(!empty($instance['instagram'])) : ?>
                    <li><a href="<?php echo esc_attr($instance['instagram']);?>"><span class="fa fa-instagram"></span> Instagram</a></li>
                <?php endif; ?>
                <?php if(!empty($instance['vimeo'])) : ?>
                    <li><a href="<?php echo esc_attr($instance['vimeo']);?>"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                <?php endif; ?>
                <?php if(!empty($instance['youtube'])) : ?>
                    <li><a href="<?php echo esc_attr($instance['youtube']);?>"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                <?php endif; ?>
                <?php if(!empty($instance['snapchat'])) : ?>
                    <li><a href="<?php echo esc_attr($instance['snapchat']);?>"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                <?php endif; ?>
            </ul>
        <?php

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $old_instance = $new_instance;
            $instance['facebook'] = $new_instance['facebook'];
            $instance['twitter'] = $new_instance['twitter'];
            $instance['instagram'] = $new_instance['instagram'];
            $instance['vimeo'] = $new_instance['vimeo'];
            $instance['youtube'] = $new_instance['youtube'];
            $instance['snapchat'] = $new_instance['snapchat'];
        return $old_instance;
    }
 
}