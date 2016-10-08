<?php 
	include("includes/data.php");
	include("includes/functions.php");
	
	$pageTitle = "The Most Important Musicians";
	$section = null;
	
	include("includes/header.php"); 
?>
	
	<section class="catalog">
		
		<div class="container">
			
			<h2>Who are your favorites?</h2>
			
			<ul class="items">
			
			<?php
				$random_list_items = array_rand($catalog, 8);
				
				foreach ($random_list_items as $value) {
					echo get_item_html($value, $catalog[$value]);
				}
            ?>
            
            </ul>
        
         </div>
	
	</section>

<?php include("includes/footer.php"); ?>