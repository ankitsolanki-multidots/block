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