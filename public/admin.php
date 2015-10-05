<?php 

require_once("../includes/functions.php");
$layout_context = "Admin"; 
include("../includes/layouts/header.php");

?>
	<div id="main">
	<div id="navigation">
	&nbsp;
	</div>
	<div id="page">
	<h2>Admin Menu</h2>
	<p>Welcome to the admin area.</p>
	<ul>
	 <li><a href="manage_content.php">Manage Website Content</a></li>
	 <li><a href="manage_admin.php">Manage Admin User</a></li>
     <li><a href="new_page.php">New Page</a></li>
	 	 <li><a href="logout.php">Logout</a></li>
	</ul>
</div>
</div>


<?php include("../includes/layouts/footer.php"); ?>