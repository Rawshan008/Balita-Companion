<?php 

class Biodata extends WP_Widget{
    public function __construct(){
        parent:: __construct(
            'Biodata',
            __('Biodata','balitac'),
            array('description'=>__('Balita Biodata widgets','balitac'))
        );
    }

    public function form( $instance ) {
        $title = isset($instance['title']) ? $instance['title'] : __('Biodata','balitac');
        $image = isset($instance['image']) ? $instance['image'] : '';
        $name = isset($instance['name']) ? $instance['name'] : '';
        $desc = isset($instance['desc']) ? $instance['desc'] : '';
        $btn_link = isset($instance['btn_link']) ? $instance['btn_link'] : '';
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = isset($instance['twitter']) ? $instance['twitter'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
        
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title'));?>"><?php _e('Widget Title','balitac');?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title'));?>" name="<?php echo esc_attr($this->get_field_name('title'));?>" value="<?php echo esc_attr($title);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('image')); ?>"><?php _e('Image:','demowidget'); ?></label>
                <br/>
                <p class="imgpreview"></p>
                <input class="imgph" type="hidden" id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>"  value="<?php echo esc_attr($instance['image']);?>"  />
                <input type="button" class="button btn-primary widgetuploader" value="<?php _e('Add Image','demowidget'); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('name'));?>"><?php _e('Name','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('name'));?>" name="<?php echo esc_attr($this->get_field_name('name'));?>" value="<?php echo esc_attr($name);?>" type="text">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('desc'));?>"><?php _e('Description','balita'); ?></label>
                <textarea class="widefat" name="<?php echo esc_attr($this->get_field_name('desc'));?>" id="<?php echo esc_attr($this->get_field_id('desc'));?>" cols="30" rows="10"><?php echo esc_html($desc);?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('btn_link'));?>"><?php _e('Button Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link'));?>" name="<?php echo esc_attr($this->get_field_name('btn_link'));?>" value="<?php echo esc_attr($btn_link);?>" type="text">
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
                <label for="<?php echo esc_attr($this->get_field_id('youtube'));?>"><?php _e('Youtube Link','balita'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube'));?>" name="<?php echo esc_attr($this->get_field_name('youtube'));?>" value="<?php echo esc_attr($youtube);?>" type="text">
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

        $bio_image = wp_get_attachment_image_src($instance['image'], 'thumbnail');
        
        ?>
            <div class="bio text-center">
                <img src="<?php echo esc_url($bio_image[0]);?>" alt="Image Placeholder" class="img-fluid">
                <div class="bio-body">
                    <h2><?php echo esc_html($instance['name']);?></h2>
                    <p><?php echo esc_html($instance['desc']); ?></p>
                    <p><a href="<?php echo esc_url($instance['btn_link']);?>" class="btn btn-primary btn-sm"><?php _e('Read my bio','balitac');?></a></p>

                    <p class="social">
                    <?php if(!empty($instance['facebook'])) : ?>
                        <a href="<?php echo esc_url($instance['facebook']);?>" class="p-2"><span class="fa fa-facebook"></span></a>
                    <?php endif; ?>
                    <?php if(!empty($instance['twitter'])) : ?>
                        <a href="<?php echo esc_url($instance['twitter']);?>" class="p-2"><span class="fa fa-twitter"></span></a>
                    <?php endif; ?>
                    <?php if(!empty($instance['instagram'])) : ?>
                        <a href="<?php echo esc_url($instance['instagram']);?>" class="p-2"><span class="fa fa-instagram"></span></a>
                    <?php endif; ?>
                    <?php if(!empty($instance['youtube'])) : ?>
                        <a href="<?php echo esc_url($instance['youtube']);?>" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    <?php endif; ?>
                    </p>

                </div>
            </div>
        <?php

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $old_instance = $new_instance;
            $instance['image'] = $new_instance['image'];
            $instance['name'] = $new_instance['name'];
            $instance['desc'] = $new_instance['desc'];
            $instance['btn_link'] = $new_instance['btn_link'];
            $instance['btn_link'] = $new_instance['btn_link'];
            $instance['facebook'] = $new_instance['facebook'];
            $instance['twitter'] = $new_instance['twitter'];
            $instance['instagram'] = $new_instance['instagram'];
            $instance['youtube'] = $new_instance['youtube'];
        return $old_instance;
    }
 
}