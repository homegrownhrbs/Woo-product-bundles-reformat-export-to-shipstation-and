# Woo-product-bundles-reformat-export-to-shipstation-and

Purpose:
This code snippet is designed to reformat the product bundle data in WooCommerce before it's sent to ShipStation. The goal is to add a line break after each individual product's SKU for better readability.

Code:
php
Copy code
/**
 * Attach our custom function to the 'shipstation_bundle_data' filter.
 * NOTE: 'shipstation_bundle_data' is a placeholder and should be replaced 
 * with the actual filter provided by the ShipStation plugin or WooCommerce 
 * if it's different.
 */
add_filter('shipstation_bundle_data', 'modify_bundle_data_for_shipstation');

/**
 * Modify the bundle data string by adding a line break after each product's SKU.
 *
 * @param string $bundle_data Original product bundle data string.
 * @return string Modified product bundle data string.
 */
function modify_bundle_data_for_shipstation($bundle_data) {
    // Use regex to find the pattern "SKU - [any combination of characters/numbers]-[more characters/numbers],"
    $formatted_data = preg_replace('/(SKU - [^,]+),/', '$1,<br />', $bundle_data);
    
    return $formatted_data;
}
How it Works:
The add_filter function hooks our custom function modify_bundle_data_for_shipstation to a filter named shipstation_bundle_data. This means that when the WooCommerce or ShipStation plugin processes the product bundle data and passes it through this filter, our function will be executed to modify the data.

Inside our custom function, we use a regular expression to search for a specific pattern in the provided $bundle_data string. This pattern looks for "SKU - [any sequence of characters excluding a comma],".

Once this pattern is found, the regular expression replaces the trailing comma with a comma followed by an HTML line break (<br />).

Example:
Input:

yaml
Copy code
Echinacea Root Tincture: Size - 2oz, Qty - 1, SKU - 2076-2oz, Garlic Tincture: Size - 2oz, Qty - 1, SKU - 2175-2oz,
Output:

yaml
Copy code
Echinacea Root Tincture: Size - 2oz, Qty - 1, SKU - 2076-2oz,<br /> Garlic Tincture: Size - 2oz, Qty - 1, SKU - 2175-2oz,<br />
Notes:

The filter name shipstation_bundle_data is a placeholder. we need to replace it with the actual filter name used by the ShipStation plugin or WooCommerce if it's different.
