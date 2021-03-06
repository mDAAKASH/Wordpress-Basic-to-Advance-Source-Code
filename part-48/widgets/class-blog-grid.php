<?php

namespace ElementorAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class BlogGrid extends Widget_Base
{

    public function get_name()
    {
        return 'blog-grid';
    }

    public function get_title()
    {
        return __('Blog Grid', 'elementor-addons');
    }

    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['custom-addons'];
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'blog_content',
            [
                'label' => __('Blog Grid', 'elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'elementor-addons'),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => __('5', 'elementor-addons'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'post_order',
            [
                'label' => __('Order', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'ASC'  => __('ASC', 'elementor-addons'),
                    'DSC' => __('DSC', 'elementor-addons'),
                ],
                'default' => 'DSC'
            ]
        );

        $this->add_control(
            'admin_meta',
            [
                'label' => __('Admin Meta', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementor-addons'),
                'label_off' => __('Hide', 'elementor-addons'),
                'return_value' => '1',
                'default' => '1',
            ]
        );
        $this->add_control(
            'comments_meta',
            [
                'label' => __('Comments Meta', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementor-addons'),
                'label_off' => __('Hide', 'elementor-addons'),
                'return_value' => '2',
                'default' => '2',
            ]
        );
        $this->add_control(
            'show_readmore',
            [
                'label' => __('Readmore', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementor-addons'),
                'label_off' => __('Hide', 'elementor-addons'),
                'return_value' => '3',
                'default' => '3',
            ]
        );
        $this->add_control(
            'readmore_label',
            [
                'label' => __('Readmore Label', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Read More...',
            ]
        );
        $this->add_control(
            'post_excerpt',
            [
                'label' => __('Excerpt Limit', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '30',
            ]
        );
        $this->end_controls_section();

        //Style Tab
        $this->start_controls_section(
            'blog_style',
            [
                'label' => __('Style', 'elementor-addons'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'blog_title_style',
            [
                'label' => __('Title', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );


        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'elementor-addons'),
                'selector' => '{{WRAPPER}} .post_title',
            ]
        );

        $this->add_control(
            'blog_meta',
            [
                'label' => __('Meta Data', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'meta_color',
            [
                'label' => __('Color', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .recent-meta li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meta_typography',
                'label' => __('Typography', 'elementor-addons'),
                'selector' => '{{WRAPPER}} .recent-meta li',
            ]
        );

        $this->add_control(
            'blog_excerpt',
            [
                'label' => __('Excerpt', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'excerpt_color',
            [
                'label' => __('Color', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post_excerpt' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typography',
                'label' => __('Typography', 'elementor-addons'),
                'selector' => '{{WRAPPER}} .post_excerpt',
            ]
        );
        $this->add_control(
            'readmore_style',
            [
                'label' => __('Readmore Label', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'readmore_color',
            [
                'label' => __('Color', 'elementor-addons'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-readmore-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'readmore_typography',
                'label' => __('Typography', 'elementor-addons'),
                'selector' => '{{WRAPPER}} .blog-readmore-btn',
            ]
        );

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $posts_per_page = $settings['posts_per_page'];
        $order = $settings['post_order'];

        $query = new \WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'order' => "$order",
        ));
        echo '<div class="row">';
        if ($query->have_posts()) {
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-sm-4 col-xs-12">
                    <figure class="wow fadeInLeft animated portfolio-item animated" data-wow-duration="500ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 500ms; animation-delay: 0ms; animation-name: fadeInLeft;">
                        <div class="img-wrapper">
                            <img src="/images/portfolio/item-1.jpg" class="img-responsive" alt="this is a title">
                            <div class="overlay">
                                <div class="buttons">
                                    <a rel="gallery" class="fancybox" href="images/portfolio/item-1.jpg">Demo</a>
                                    <a target="_blank" href="single-portfolio.html">Details</a>
                                </div>
                            </div>
                        </div>
                        <figcaption>
                            <h4>
                                <a href="#">
                                    Dew Drop
                                </a>
                            </h4>
                            <p>
                                Redesigne UI Concept
                            </p>
                        </figcaption>
                    </figure>
                </div>

<?php endwhile;
        }
        echo '</div>';
    }
}
