<?php 
add_filter( 'block_categories', 'test_block_categories', 10, 2);

function test_block_categories($categories, $post) {
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'test-blocks',
        'title' => __( 'Test', 'test-blocks' ),
        'icon'  => 'page',
      ),
    )
  );
}

add_action('acf/init', 'test_blocks');

function test_blocks() {
  
  // Register a Block Test Slider.
  acf_register_block_type(array(
    'name'              => 'block-test-slider',
    'title'             => __('Block Test Slider'),
    'render_template'   => 'template-parts/blocks/block-test-slider.php',
    'category'          => 'test-blocks'
  ));

}