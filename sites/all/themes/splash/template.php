<?php

function splash_preprocess_node(&$variables) {
  $node = $variables['node'];
  // Display post information only on certain node types.
  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    if ($node->type == "article") {
      if (!empty($node->field_blog_categories)) {
        $categories = splash_format_comma_field('field_blog_categories', $node);
        $variables['blog_categories'] = $categories;
      }
    }
  }
}


function splash_format_comma_field($field_category, $node, $limit = NULL) {
  $category_arr = array();
  $field = field_get_items('node', $node, $field_category);
  if (!empty($field)) {
    foreach ($field as $item) {
      $term = taxonomy_term_load($item['tid']);
      if ($term) {
        if (module_exists('i18n_taxonomy')) {
          $term_name = i18n_taxonomy_term_name($term, $node->language);
        } else {
          $term_name = $term->name;
        }
        $category_arr[] = l($term_name, 'taxonomy/term/' . $item['tid']);
      }
      if ($limit) {
        if (count($category_arr) == $limit) {
          $category = implode(', ', $category_arr);
          return $category;
        }
      }
    }
  }
  $category = implode(', ', $category_arr);
  return $category;
}

/**
 * Implement hook_form_comment_form_alter().
 */
function splash_form_comment_form_alter(&$form, &$form_state, $form_id) {
  $form['actions']['submit']['#value'] = t('POST COMMENT');
}

function splash_breadcrumb($variables) {
  // Convenience variable:
  $breadcrumb = $variables['breadcrumb'];
  $breadcrumb[] = drupal_get_title();
  // If we have any breadcrumbs:
  if (!empty($breadcrumb) && (count($breadcrumb) > 1)) {
    // Convert 'em to a string:
    $breadcrumbs = implode(' <span class="divider">/</span> ', $breadcrumb);
    // Build a heading--here at least, we're following the D7 convention of
    // accompanying menus with invisible headings to aid in text-only navigation:
    $heading = t('You are here');
    // Pattern for output:
    $output_pattern = '<h2 class="element-invisible">%s</h2><ul class="breadcrumb">%s</ul>';
    // Return the markup:
    return sprintf($output_pattern, $heading, $breadcrumbs);
  }
}

/**
 * Implement hook_form_search_block_form_alter().
 */
function splash_form_search_block_form_alter(&$form) {
  $form['search_block_form']['#attributes']['placeholder'] = t('Start Typing...');
  $form['actions']['#attributes']['class'][] = 'element-invisible';
}
