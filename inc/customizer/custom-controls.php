<?php
/**
 * Custom Customizer Controls
 */

if (class_exists('WP_Customize_Control')) {
    class My_Theme_Repeater_Control extends WP_Customize_Control {
        public $type = 'repeater';

        public function render_content() {
            ?>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php endif; ?>

            <div class="my-theme-repeater-container">
                <div class="my-theme-repeater-items">
                    <!-- Items will be injected by JS -->
                </div>
                <button type="button" class="button my-theme-repeater-add"><?php _e('Add New Item', 'my-theme'); ?></button>
            </div>
            
            <input type="hidden" <?php $this->link(); ?> class="my-theme-repeater-value" value="<?php echo esc_attr($this->value()); ?>" />
            <?php
        }
    }
}
