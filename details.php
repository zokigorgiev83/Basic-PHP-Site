<?php 
include("includes/data.php");
include("includes/functions.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($catalog[$id])) {
        $item = $catalog[$id];
    }
}

if (!isset($item)) {
    header("location:catalog.php");
    exit;
}

$pageTitle = $item["name"];
$section = null;

include("includes/header.php"); ?>

<section class="page">
    
    <div class="container">
        
        <div class="breadcrumbs">
            <a href="catalog.php">Full Catalog</a>
            &gt; <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>">
            <?php echo $item["category"]; ?></a>
            &gt; <?php echo $item["name"]; ?>
        </div>
        
        <div class="media-picture">
    
        <span>
            <img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["name"]; ?>" />
        </span>
            
        </div>
        
        <div class="media-details">
        
            <h1 class="header"><?php echo $item["name"]; ?></h1>
            <table> 
                <tr>
                    <th>Category</th>
                    <td><?php echo $item["category"]; ?></td>
                </tr>
                <tr>
                    <th>Genre</th>
                    <td><?php echo $item["genre"]; ?></td>
                </tr>
                <?php if (strtolower($item["category"]) == "musicians") { ?>
                <tr>
                    <th>Instrument</th>
                    <td><?php echo $item["instrument"]; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <th>Year</th>
                    <td><?php echo $item["year"]; ?></td>
                </tr>
                <tr>
                    <th>Albums</th>
                    <td><?php echo implode(", ", $item["albums"]); ?></td>
                </tr>
            </table>
        
        </div>
    
    </div>

</section>

<?php include("includes/footer.php");?>