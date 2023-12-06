<?php

// Adds widget: Social
class Social_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'social_widget',
            esc_html__('Social', 'affiliate'),
            array('description' => esc_html__('Social Widget', 'affiliate'), ) // Args
        );
        add_action('admin_footer', array($this, 'media_fields'));
        add_action('customize_controls_print_footer_scripts', array($this, 'media_fields'));
    }

    private $widget_fields = array(
        array(
            'label' => 'Title',
            'id' => 'title_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Link',
            'id' => 'link_url',
            'type' => 'url',
        ),
        array(
            'label' => 'Icon',
            'id' => 'icon_media',
            'type' => 'media',
        ),
    );

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        $media = wp_get_attachment_image_src($instance['icon_media'], 'full', true);
        
        echo '<a href="' . $instance['link_url'] . '" class="social" target="_blank">';
        echo '<img src="' . $media[0] . '" alt="' . $instance['title_text'] . '">';
        echo '</a>';
        
        echo $args['after_widget'];
    }

    public function media_fields()
    {
        ?><script>
                    jQuery(document).ready(function ($) {
                        if (typeof wp.media !== 'undefined') {
                            var _custom_media = true,
                                _orig_send_attachment = wp.media.editor.send.attachment;
                            $(document).on('click', '.custommedia', function (e) {
                                var send_attachment_bkp = wp.media.editor.send.attachment;
                                var button = $(this);
                                var id = button.attr('id');
                                _custom_media = true;
                                wp.media.editor.send.attachment = function (props, attachment) {
                                    if (_custom_media) {
                                        $('input#' + id).val(attachment.id);
                                        $('span#preview' + id).css('background-image', 'url(' + attachment.url + ')');
                                        $('input#' + id).trigger('change');
                                    } else {
                                        return _orig_send_attachment.apply(this, [props, attachment]);
                                    };
                                }
                                wp.media.editor.open(button);
                                return false;
                            });
                            $('.add_media').on('click', function () {
                                _custom_media = false;
                            });
                            $(document).on('click', '.remove-media', function () {
                                var parent = $(this).parents('p');
                                parent.find('input[type="media"]').val('').trigger('change');
                                parent.find('span').css('background-image', 'url()');
                            });
                        }
                    });
                </script><?php
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'affiliate');
            switch ($widget_field['type']) {
                case 'media':
                    $media_url = '';
                    if ($widget_value) {
                        $media_url = wp_get_attachment_url($widget_value);
                    }
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'affiliate') . ':</label> ';
                    $output .= '<input style="display:none;" class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . $widget_value . '">';
                    $output .= '<span id="preview' . esc_attr($this->get_field_id($widget_field['id'])) . '" style="margin-right:10px;border:2px solid #eee;display:block;width: 100px;height:100px;background-image:url(' . $media_url . ');background-size:contain;background-repeat:no-repeat;"></span>';
                    $output .= '<button id="' . $this->get_field_id($widget_field['id']) . '" class="button select-media custommedia">Add Media</button>';
                    $output .= '<input style="width: 19%;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="Clear" />';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'affiliate') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_social_widget()
{
    register_widget('Social_Widget');
}
add_action('widgets_init', 'register_social_widget');


// Adds widget: Company information
class Company_Information_Widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'company_information_widget',
            esc_html__('Company information', 'affiliate'),
            array('description' => esc_html__('Company information', 'affiliate'), ) // Args
        );
        add_action('admin_footer', array($this, 'media_fields'));
        add_action('customize_controls_print_footer_scripts', array($this, 'media_fields'));
    }

    private $widget_fields = array(
        array(
            'label' => 'Logo',
            'id' => 'logo_media',
            'type' => 'media',
        ),
        array(
            'label' => 'Company name',
            'id' => 'companyname_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Address',
            'id' => 'address_text',
            'type' => 'text',
        ),
        array(
            'label' => 'Icon Address',
            'id' => 'iconaddress_media',
            'type' => 'media',
        ),
        array(
            'label' => 'Hotline',
            'id' => 'hotline_tel',
            'type' => 'tel',
        ),
        array(
            'label' => 'Icon Hotline',
            'id' => 'iconhotline_media',
            'type' => 'media',
        ),
        array(
            'label' => 'Email',
            'id' => 'email_email',
            'type' => 'email',
        ),
        array(
            'label' => 'Icon Email',
            'id' => 'iconemail_media',
            'type' => 'media',
        ),
    );

    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $logo_media = wp_get_attachment_image_src($instance['logo_media'], 'full', true);
        $icon_address = wp_get_attachment_image_src($instance['iconaddress_media'], 'full', false);
        $icon_hotline = wp_get_attachment_image_src($instance['iconhotline_media'], 'full', true);
        $icon_email = wp_get_attachment_image_src($instance['iconemail_media'], 'full', true);
        // Output generated fields
        print_r($icon_address);
        echo '<div class="footer-logo"><img src="' . $logo_media[0] . '" alt="' . $instance['title_text'] . '"></div>';
        echo '<h1 class="company-name">' . $instance['companyname_text'] . '</h1>';
        echo '<ul class="company-information">';
        echo '<li>';
        echo '<div class="icon"> <img src="" alt=""></div>';
        echo '<div class="content">' . $instance['address_text'] . '</div>';
        echo '</li>';

        echo '<li class="has-icon">';
        echo '<div class="icon"><img src="'. $icon_hotline[0] .'" alt=""></div>';
        echo '<a href="tel: ' . $instance['hotline_tel'] . '" class="content" target="_blank">Hotline. ' . $instance['hotline_tel'] . '</a>';
        echo '</li>';

        echo '<li class="has-icon">';
        echo '<div class="icon"><img src="' . $icon_email[0]  . '" alt=""> </div>';
        echo '<a href="mailto:' . $instance['email_email'] . '" class="content" target="_blank"> Email. ' . $instance['email_email'] . ' </a>';
        echo '</li>';
        echo '</ul>';
        echo $args['after_widget'];
    }

    public function media_fields()
    {
        ?><script>
                    jQuery(document).ready(function ($) {
                        if (typeof wp.media !== 'undefined') {
                            var _custom_media = true,
                                _orig_send_attachment = wp.media.editor.send.attachment;
                            $(document).on('click', '.custommedia', function (e) {
                                var send_attachment_bkp = wp.media.editor.send.attachment;
                                var button = $(this);
                                var id = button.attr('id');
                                _custom_media = true;
                                wp.media.editor.send.attachment = function (props, attachment) {
                                    if (_custom_media) {
                                        $('input#' + id).val(attachment.id);
                                        $('span#preview' + id).css('background-image', 'url(' + attachment.url + ')');
                                        $('input#' + id).trigger('change');
                                    } else {
                                        return _orig_send_attachment.apply(this, [props, attachment]);
                                    };
                                }
                                wp.media.editor.open(button);
                                return false;
                            });
                            $('.add_media').on('click', function () {
                                _custom_media = false;
                            });
                            $(document).on('click', '.remove-media', function () {
                                var parent = $(this).parents('p');
                                parent.find('input[type="media"]').val('').trigger('change');
                                parent.find('span').css('background-image', 'url()');
                            });
                        }
                    });
                </script><?php
    }

    public function field_generator($instance)
    {
        $output = '';
        foreach ($this->widget_fields as $widget_field) {
            $default = '';
            if (isset($widget_field['default'])) {
                $default = $widget_field['default'];
            }
            $widget_value = !empty($instance[$widget_field['id']]) ? $instance[$widget_field['id']] : esc_html__($default, 'affiliate');
            switch ($widget_field['type']) {
                case 'media':
                    $media_url = '';
                    if ($widget_value) {
                        $media_url = wp_get_attachment_url($widget_value);
                    }
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'affiliate') . ':</label> ';
                    $output .= '<input style="display:none;" class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . $widget_value . '">';
                    $output .= '<span id="preview' . esc_attr($this->get_field_id($widget_field['id'])) . '" style="margin-right:10px;border:2px solid #eee;display:block;width: 100px;height:100px;background-image:url(' . $media_url . ');background-size:contain;background-repeat:no-repeat;"></span>';
                    $output .= '<button id="' . $this->get_field_id($widget_field['id']) . '" class="button select-media custommedia">Add Media</button>';
                    $output .= '<input style="width: 19%;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="Clear" />';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="' . esc_attr($this->get_field_id($widget_field['id'])) . '">' . esc_attr($widget_field['label'], 'affiliate') . ':</label> ';
                    $output .= '<input class="widefat" id="' . esc_attr($this->get_field_id($widget_field['id'])) . '" name="' . esc_attr($this->get_field_name($widget_field['id'])) . '" type="' . $widget_field['type'] . '" value="' . esc_attr($widget_value) . '">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form($instance)
    {
        $this->field_generator($instance);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        foreach ($this->widget_fields as $widget_field) {
            switch ($widget_field['type']) {
                default:
                    $instance[$widget_field['id']] = (!empty($new_instance[$widget_field['id']])) ? strip_tags($new_instance[$widget_field['id']]) : '';
            }
        }
        return $instance;
    }
}

function register_company_information_widget()
{
    register_widget('Company_Information_Widget');
}
add_action('widgets_init', 'register_company_information_widget');