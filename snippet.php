/**
 * Attach our custom function to the 'shipstation_bundle_data' filter.
 * NOTE: 'shipstation_bundle_data' is a placeholder and should be replaced 
 * with the actual filter provided by the ShipStation plugin or WooCommerce 
 * if it's different.
 * Modify the bundle data string by adding a line break after each product's SKU.
 *
 * @param string $bundle_data Original product bundle data string.
 * @return string Modified product bundle data string.
 */
add_filter('shipstation_bundle_data', 'modify_bundle_data_for_shipstation');

function modify_bundle_data_for_shipstation($bundle_data) {
    // Use regex to find the pattern "SKU - [any combination of characters/numbers]-[more characters/numbers],"
    $formatted_data = preg_replace('/(SKU - [^,]+),/', '$1,<br />', $bundle_data);
    
    return $formatted_data;
}
