

<?php
    

	$fixed_root = "./";	// Security Feature
	
	$dir_root = $_GET['dir_root'];	// The place to begin the parse, relative to the fixed root.

	$dir_root = preg_replace ( "-(\.\./)*-", "", $dir_root );	// Just so no one sneaks any nasties in.

	$div_id = $_GET['div_id'];	// The ID of the enclosing <div>, <dt> or <dd> tag.
		
	$item_name = $_GET['item_name'];	// The name of the enclosing directory.
		
	$collapse = $_GET['collapse'];	// Set to 1 if the directory is open, and needs to be closed.
		
	$posix_root = $fixed_root.$dir_root;

	$item_count = 0;
	
	/*
		The way this works is by using the standard DHTML technique of replacing an element's InnerHTML property.
		
		This file generates XHTML, in the form of a definition list (<dl>, <dt> and <dd>). This represents the
		hierarchy of the subdirectory being examined.
		<a> tags are generated that result in JavaScript calls that initiate new AJAX calls. Each call is treated
		as an atomic entity. This means that you never look at the "big picture." It is always one directory at a
		time.
		A newly opened directory always has its subdirectories closed.
		CSS classes are generated for each element, so it is completely configurable.
	*/
 	if ( is_dir ( $posix_root ) )
 		{
 		// Make sure that it is a directory.
		if ( $dh = opendir ( $posix_root ) )
			{
			rewinddir ( $dh );
			// If we will be displaying it closed, we use one class. These are for the main definition term element (<dt>).
			if ( $collapse )
				{
				$collapse = "";
				$d_class = "dt_class_dir_closed";
				}
			else	// If open, we use another.
				{
				$collapse = 1;
				$d_class = "dt_class_dir_open";
				}
			
			// A directory is always displayed as a definition list, even if there is only one element (closed directory).
			echo "<dl class=\"dl_class_dir_tree\">";
			// If we have an item that rates a link.
			if ( $item_name )
				{
				echo "<dt class=\"$d_class\"><a href=\"javascript:callout('collapse=$collapse&amp;dir_root=".urlencode($dir_root)."&amp;div_id=$div_id&amp;item_name=".urlencode($item_name)."', '$div_id')\" class=\"";
				
				// Again, we assign different classes, based upon the "open" or "closed" state of the directory. These are for the links.
				if ( $collapse )
					{
					echo "a_class_dir_link_open";
					}
				else
					{
					echo "a_class_dir_link_closed";
					}
				
				echo "\">".htmlspecialchars ( $item_name )."</dt>\n";
				}
			
			// If the directory is open, we list its contents here.
			while ( $collapse && ($item = readdir ( $dh )) )
				{
				if ( !preg_match ( "/^\./", $item ) )
					{
					$this_div = $div_id."_".$item_count;
					$item_count++;
					$viable_link = true;
					// We check to see if nested subdirectories have contents (they can be opened, if so).
					if ( is_dir ( $posix_root."/".$item ) )
						{
						$viable_link = false;
						if ( $dh2 = opendir ( $posix_root."/".$item ) )
							{
							rewinddir ( $dh2 );
							while ( $item2 = readdir ( $dh2 ) )
								{
								if ( !preg_match ( "/^\./", $item2 ) )
									{
									$viable_link = true;
									break;
									}
								}
							closedir ( $dh2 );
							}
						}
					
					// Nested contents are always in <dd> tags.
					echo "<dd id=\"$this_div\"";
					if ( is_dir ( $posix_root."/".$item ) )	// If it is a directory, then we allow an AJAX call to open it.
						{
						if ( $viable_link )	// If the directory contains files or subdirectories, it can be opened.
							{
							echo " class=\"dd_class_dir_closed\">";
							echo "<a class=\"a_class_dir_link_closed\" href=\"javascript:callout('dir_root=".urlencode($dir_root."/".$item)."&amp;div_id=$this_div&amp;item_name=".urlencode($item)."', '$this_div')\">";
							}
						else	// If not, it is "dead."
							{
							echo " class=\"dd_class_dir_empty\">";
							}
						}
					else	// If it is a file, then we just provide a URI to that file.
						{
						echo " class=\"dd_class_file\">";
						echo "<a rel='facebox' class=\"a_class_file_link\" target='_parent' href=\"".htmlspecialchars($posix_root."addpage.php?page=".$item)."\">";
						}
					
					echo $item;	
					
							
					
}
					
					     
					
					if ( $viable_link )
						{
						echo "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "<a href='addpage.php?file=$item&action=delete'
      title='delete the image' target='_parent'><IMG SRC='images/delete.gif' title='delete this file?' border='0'></a>";
												
						}
						
						
						
					echo "</dd>\n";
					}
				}
			closedir ( $dh );
			}
		echo "</dl>\n";
		

	

if (isset($_GET['action']) && isset($_GET['file'])) {
  if ($_GET['action'] == "delete") {
    unlink($_GET['file']);
  }
} else {
  echo "" ;
}
	

if (isset($_GET['action']) && isset($_GET['file'])) {
  if ($_GET['action'] == "delete") {
    unlink($_GET['file']);
	echo "<IMG SRC='images/recycle_orange_whiteoutline.gif' border='0'>";
  }
} else {
  echo "" ;
}
 
//<meta http-equiv='refresh' content='2;url=addpage.php'>

?>
