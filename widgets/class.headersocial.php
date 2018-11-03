<?php 

class HeaderlFooter extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'headersocial',
            __('Header Social','balitac'),
            array('description'=>__('Balita Header Social widgets','balitac'))
        );
    }

    public function form( $instance ) {
        $title = isset($instance['title']) ? $instance['title'] : __('Header Social','balitac');
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
                <?php if(!empty($instance['facebook'])) : ?>
                    <a href="<?php echo esc_attr($instance['facebook']);?>"><span class="fa fa-facebook"></span></a>
                <?php endif; ?>
                <?php if(!empty($instance['twitter'])) : ?>
                    <a href="<?php echo esc_attr($instance['twitter']);?>"><span class="fa fa-twitter"></span></a>
                <?php endif; ?>
                <?php if(!empty($instance['instagram'])) : ?>
                    <a href="<?php echo esc_attr($instance['instagram']);?>"><span class="fa fa-instagram"></span></a>
                <?php endif; ?>
                <?php if(!empty($instance['vimeo'])) : ?>
                    <a href="<?php echo esc_attr($instance['vimeo']);?>"><span class="fa fa-vimeo"></span></a>
                <?php endif; ?>
                <?php if(!empty($instance['youtube'])) : ?>
                    <a href="<?php echo esc_attr($instance['youtube']);?>"><span class="fa fa-youtube-play"></span></a>
                <?php endif; ?>
                <?php if(!empty($instance['snapchat'])) : ?>
                    <a href="<?php echo esc_attr($instance['snapchat']);?>"><span class="fa fa-snapchat"></span></a>
                <?php endif; ?>
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