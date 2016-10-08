<?php 
include("includes/data.php");
include("includes/functions.php");

$pageTitle = "Full Catalog";
$section = null;

if (isset($_GET["cat"])) {
    if ($_GET["cat"] == "musicians") {
        $pageTitle = "Musicians";
        $section = "musicians";
    } else if ($_GET["cat"] == "groups") {
        $pageTitle = "Groups";
        $section = "groups";
    }
}

include("includes/header.php"); ?>

<section class="catalog page">
	
	<div class="container">
        
        <h1><?php 
        if ($section != null) {
            echo "<a href='catalog.php'>Full Catalog</a> &gt; ";
        }
        echo $pageTitle; ?></h1>
        
        <ul class="items">
            <?php
            $categories = array_category($catalog, $section);
            foreach ($categories as $value) {
                echo get_item_html($value, $catalog[$value]);
            }
            ?>
        </ul>
        
    </div>

</section>

<?php include("includes/footer.php"); ?>