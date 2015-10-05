<?php 
require_once("../includes/session.php");
require_once("../includes/db_connection.php");
require_once("../includes/functions.php");
$layout_context = "Public"; 
include("../includes/layouts/header.php");
?>
<?php find_selected_page(); ?>

	<div id="main">
	<div id="navigation">
    <?php echo public_navigation($current_subject, $current_page); ?>
	</div>
	<div id="page">
	<?php if ($current_subject) { ?>
	<h2>Manage Subject</h2>
	   Menu Name:<?php echo 
    htmlentities($current_subject["menu_name"]); ?><br/>
	
	   <?php } elseif ($current_page) { ?>
	   <h2>View Page</h2>
	   <?php echo htmlentities($current_page["content"]); ?>

	<?php } else { ?>
	  <h2>Welcome to Widget Corp</h2>
	<?php } ?>
 </div>
</div>

<?php include("../includes/layouts/footer.php");?>