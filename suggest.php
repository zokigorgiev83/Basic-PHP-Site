<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim(filter_input(INPUT_POST,"name", FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
    $category = trim(filter_input(INPUT_POST,"category",FILTER_SANITIZE_STRING));
    $suggestion = trim(filter_input(INPUT_POST,"suggestion",FILTER_SANITIZE_STRING));
    $genre = trim(filter_input(INPUT_POST,"genre",FILTER_SANITIZE_STRING));
    $details = trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS));
    
    if ($name == "" || $email == "" || $category == "" || $suggestion == "") {
        $error_message = "Please, fill in the required fields: Name, Email, Category and Name of the Musician or the Group";
    }
    
    if (!isset($error_message) && $_POST["address"] != "") {
        $error_message = "Bad form input";
    }
    
    require("includes/phpmailer/class.phpmailer.php");
    
    $mail = new PHPMailer;
    
    if (!isset($error_message) && !$mail->ValidateAddress($email)) {
        $error_message = "Invalid Email Address";
    }
    
    if (!isset($error_message)) {
        $email_body = "";
        $email_body .= "Name " . $name . "\n";
        $email_body .= "Email " . $email . "\n";
        $email_body .= "Suggested Item\n";
        $email_body .= "Category " . $category . "\n";
        $email_body .= "Suggestion " . $suggestion . "\n";
        $email_body .= "Genre " . $genre . "\n";
        $email_body .= "Details " . $details . "\n";
        
        $mail->setFrom($email, $name);
        $mail->addAddress("zokigorgiev83@gmailcom", "Zoran Gorgiev");
        
        $mail->isHTML(false);
        
        $mail->Subject = "Suggestion from " . $name;
        $mail->Body    = $email_body;
        
        if($mail->send()) {
            header("location:suggest.php?status=thanks");
            exit;
        }
        $error_message = 'Message could not be sent.';
        $error_message .= ' Mailer Error: ' . $mail->ErrorInfo;
    }
    
}

$pageTitle = "Suggest a Musician or Group";
$section = "suggest";

include("includes/header.php"); 
?>

<section class="page">
	
	<div class="container">
        
        <h1>Suggest a Musician or Group</h1>
        
        <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
        	echo "<p>Thanks for the email! I&rsquo;ll check out your suggestion shortly!</p>";
        } else {
            if (isset($error_message)) {
                echo "<p class='message'>". $error_message . "</p>";
            } else {
                echo "<p>If you think there is something we&rsquo;re missing, let us know! Complete the form and send us an email.</p>";
            }
        ?>
        
        <form method="post" action="suggest.php">
            
            <table>
            <tr>
                <th><label for="name">Name (required)</label></th>
                <td><input type="text" id="name" name="name" value="<?php if (isset($name)) { echo $name; } ?>" /></td>
            </tr>
            <tr>
                <th><label for="email">Email (required)</label></th>
                <td><input type="text" id="email" name="email" value="<?php if (isset($email)) { echo $email; } ?>" /></td>
            </tr>
            <tr>
                <th><label for="category">Category (required)</label></th>
                <td><select id="category" name="category">
                    <option value="">SELECT ONE</option>
                    <option value="Musicians"<?php if (isset($category) && $category == "Musicians") { echo " selected"; } ?>>Musicians</option>
                    <option value="Groups"<?php if (isset($category) && $category == "Groups") { echo " selected"; } ?>>Groups</option>
                </select></td>
            </tr>
            <tr>
                <th><label for="suggestion">Name of the Musician or the Group (required)</label></th>
                <td><input type="text" id="suggestion" name="suggestion" value="<?php if (isset($suggestion)) { echo $suggestion; } ?>" /></td>
            </tr>
            <tr>
                <th>
                    <label for="genre">Genre</label>
                </th>
                <td>
                    <select name="genre" id="genre">
                        <option value="">SELECT ONE</option>
                        
                        <option value="Rock"<?php
                        if (isset($genre) && $genre=="Rock") {
                        	echo " selected";
                        } ?>>Rock</option>
                        
                        <option value="Metal"<?php
                        if (isset($genre) && $genre=="Metal") {
                        	echo " selected";
                        } ?>>Metal</option>
                        
                        <option value="Blues"<?php
                        if (isset($genre) && $genre=="Blues") {
                        	echo " selected";
                        } ?>>Blues</option>
                        
                        <option value="Jazz"<?php
                        if (isset($genre) && $genre=="Jazz") {
                        	echo " selected";
                        } ?>>Jazz</option>
                        
                        <option value="Classical"<?php
                        if (isset($genre) && $genre=="Classical") {
                        	echo " selected";
                        } ?>>Classical</option>
                        
                        <option value="Electronic"<?php
                        if (isset($genre) && $genre=="Electronic") {
                        echo " selected";
                        } ?>>Electronic</option>
                        
                        <option value="Hip Hop/Rap"<?php
                        if (isset($genre) && $genre=="Hip Hop/Rap") {
                        	echo " selected";
                        } ?>>Hip Hop/Rap</option>
                        
                        <option value="Pop"<?php
                        if (isset($genre) && $genre=="Pop") {
                        	echo " selected";
                        } ?>>Pop</option>
                        
                        <option value="R&B/Soul"<?php
                        if (isset($genre) && $genre=="R&B/Soul") {
                        	echo " selected";
                        } ?>>R&amp;B/Soul</option>
                        
                        <option value="Reggae"<?php
                        if (isset($genre) && $genre=="Reggae") {
                        	echo " selected";
                        } ?>>Reggae</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th><label for="name">Details</label></th>
                <td><textarea name="details" id="details"><?php if (isset($details)) { echo htmlspecialchars($_POST["details"]); } ?></textarea></td>
            </tr>
            <tr style="display:none">
                <th><label for="address">Address</label></th>
                <td><input type="text" id="address" name="address" />
                <p>Please, leave this field blank</p></td>
            </tr>
            </table>
            <input type="submit" value="Send" />
        </form>
        <?php } ?>
        
    </div>
    
</section>

<?php include("includes/footer.php"); ?>