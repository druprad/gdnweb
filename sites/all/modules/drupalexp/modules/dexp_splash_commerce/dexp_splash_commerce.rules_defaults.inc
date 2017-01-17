<?php
/**
 * @file
 * dexp_splash_commerce.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function dexp_splash_commerce_default_rules_configuration() {
  $items = array();
  $items['rules_discount'] = entity_import('rules_config', '{ "rules_discount" : {
      "LABEL" : "Discount",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "REQUIRES" : [ "commerce_line_item", "commerce_product_reference" ],
      "ON" : { "commerce_product_calculate_sell_price" : [] },
      "DO" : [
        { "commerce_line_item_unit_price_multiply" : {
            "commerce_line_item" : [ "commerce_line_item" ],
            "amount" : "0.9",
            "component_name" : "discount",
            "round_mode" : "1"
          }
        }
      ]
    }
  }');
  return $items;
}
