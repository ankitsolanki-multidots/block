<?php

function simpleBlock() {
    wp_register_script('simpleBlock', get_stylesheet_directory_uri() . '/build/simple.js', array('wp-blocks', 'wp-editor'));
    register_block_type("myblock/static-example", array(
      'editor_script' => 'simpleBlock'
    ));
  }
  
  add_action('init', 'simpleBlock');

  function bannerBlock() {
    wp_register_script('bannerBlockScript', get_stylesheet_directory_uri() . '/build/banner.js', array('wp-blocks', 'wp-editor'));
    register_block_type("ourblocktheme/banner", array(
      'editor_script' => 'bannerBlockScript'
    ));
  }

  add_action('init', 'bannerBlock');
  

  function customRichBox() {
    wp_register_script('customrichTextbox', get_stylesheet_directory_uri() . '/build/richtextbox.js', array('wp-blocks', 'wp-editor'));
    register_block_type("ourblocktheme/customrichtext", array(
      'editor_script' => 'customrichTextbox'
    ));
  }

  add_action('init', 'customRichBox');

 function block_dynamic_render_cb ($attributes) {

    $args = array(
      'posts_per_page' => $attributes['numberOfPosts'],
      'post_status' => 'publish',
      'order' => $attributes['order'],
      'orderby' => $attributes['orderBy'],
    );
    if(isset($attributes['categories'])) {
      $args['category__in'] = array_column($attributes['categories'], 'id');
    }
    $recent_posts = get_posts($args);

    $posts = '<ul ' . get_block_wrapper_attributes() . '>';
    foreach($recent_posts as $post) {
      $title = get_the_title($post);
      $title = $title ? $title : __('(No title)','latest-posts');
      $permalink = get_permalink( $post );
      $excerpt = get_the_excerpt( $post );

      $posts .= '<li>';

      if($attributes["displayFeaturedImage"] && has_post_thumbnail( $post )) {
        $posts .= get_the_post_thumbnail( $post, 'large' );
      }
      $posts .= '<h5><a href="' . esc_url($permalink) . '">' . $title . '</a></h5>';
      $posts .= '<time datetime="' . esc_attr( get_the_date('c', $post)) . '">' . esc_html( get_the_date('', $post)) . '</time>';

      if(!empty($excerpt)) {
        $posts .= '<p>' . $excerpt . '</p>';
      }

      $posts .= '</li>';
    }
    $posts .= '</ul>';

    return $posts;

  }

  function latestPost() {
    wp_register_script('latestPost', get_stylesheet_directory_uri() . '/build/latestpost.js', array('wp-blocks', 'wp-editor'));
    register_block_type("ourblocktheme/latestpost", array(
      'editor_script' => 'latestPost',
      'render_callback' => 'block_dynamic_render_cb',
    ));
  }

  add_action('init', 'latestPost');