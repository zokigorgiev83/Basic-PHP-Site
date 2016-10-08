<?php
function get_item_html($id, $item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["name"] . "' />" 
        . "<p>View Details</p>"
        . "</a></li>";
    return $output;
}

function array_category($catalog, $category) {
    $output = array();
    
    foreach ($catalog as $value => $item) {
        if ($category == null || strtolower($category) == strtolower($item["category"])) {
            $name = $item["name"];
            $sort = ltrim($name, "The ");
            $output[$value] = $sort;            
        }
    }
    
    asort($output);
    return array_keys($output);
}