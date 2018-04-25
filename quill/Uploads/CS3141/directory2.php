<?php
//echo "Here are our files:";
//echo "";
$path = ".";
$dh = opendir($path);
$i=1;
while (($file = readdir($dh)) !== false) {
    if($file != "." && $file != ".." && $file != "directory2.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
        
		if(is_file($file)){
			//For regular files.
			echo "<a href='$path/$file'>$file</a><br /><br />";
		} else {
			//For folders
			echo "<a href='$path/$file/directory2.php'>$file</a><br /><br />";	
		}
		
        $i++;
    }
}
closedir($dh);
?> 