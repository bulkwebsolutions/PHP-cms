<?php 
require_once("../includes/session.php"); 
require_once("../includes/db_connection.php"); 
require_once("../includes/functions.php"); 
require_once("../includes/validation_functions.php");
include("../includes/layouts/header.php"); 
?>

<?php find_selected_page(); ?>



  <?php 


		   if(isset($_POST['submit'])) {

		    $required_fields = array("menu_name", "position", "visible", "content");
			validate_presences($required_fields);
			
			$fields_with_max_lengths = array("menu_name" => 30);
			validate_max_lengths($fields_with_max_lengths);
			
			if(empty($errors)) {
			   // Perform Create
			   // Make sure you add the subject_id!
			$subject_id = $current_subject["id"];
			$menu_name = mysql_prep($_POST["menu_name"]);
			$position = (int) $_POST["position"];
			$visible = (int) $_POST["visible"];
			// be sure to escape the content
			$content = mysql_prep($_POST["content"]);
			
			$query  = "INSERT INTO pages (";
			$query .= " subject_id, menu_name, position, visible, content";
			$query .= ") VALUES (";
			$query .= " {$subject_id}, '{$menu_name}', {$position}, {$visible}, '{$content}'";
			$query .= ")";
			$result = mysqli_query($connection, $query);
			
			if ($results) {
			  // Success
			  $_SESSION["message"] = "Page created.";
			  redirect_to("manage_content.php?subject={$id}");
			  urlencode($current_subject["id"]);
			  } else {
			    // Failure
				$_SESSION["message"] = "Page creation failed.";
			   }
			  }
		    } else {
			  // This is probably a GET request
			} // and if (isset($_POST['submit']));  
    ?>

<?php $layout_context = "Admin";  ?>


<div id="main">
  <div id="navigation">

  <?php echo navigation($current_subject, $current_page); ?>

  </div>
  <div id="page">

    <?php echo message(); ?>
	<?php echo form_errors($errors); ?>
	
	<h2>Create New Page</h2>

	<form action="new_page.php?subject=<?php echo urlencode($current_subject["id"]); ?>" method="post">

	<p>Menu name:
	  <input type="text" name="menu_name" value="" />
	</p>
	<p>Position:
	  <select name="position">

			   <?php
			    $page_set =
				find_pages_for_subject($current_subject["id"]);
				$page_count = mysqli_num_rows($page_set);
				for($count=1; $count <= ($page_count + 1); $count++);
				{
				   echo "<option value=\"{$count}\"</option>";
				}
			   ?>
	  ?>

  </select>
  </p>
  <p>Visible:
  <input type="radio" name="visible" value="0" /> No
  &nbsp;
  <input type="radio" name="visible" value="1" /> Yes
  </p>
  <p>Content:<br/>

   <textarea name="content" rows="20" cols="80"><?php echo htmlentities($current_page["content"]); ?></textarea>

   </p>
   <input type="submit" name="submit" value="Edit Page" /> 
</form>

<a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a>

</div>
</div>
<?php include("../includes/layouts/footer.php"); ?>