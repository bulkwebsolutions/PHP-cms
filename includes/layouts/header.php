<?php  
    if (!isset($layout_context)) {
	   $layout_context = "public";
	}	
?>
<!DOCTYPE>
<html lang="en">
  <head>
     <title>Admin Page <?php if ($layout_context == "Admin") { echo "Admin"; } ?></title>
	 <link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="header">
	<h1>Widget Corp <?php if ($layout_context == "Admin") { echo "Admin"; } ?></h1>
	</div>