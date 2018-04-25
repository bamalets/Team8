var files = <?php 
$out = array();
foreach (glob('file/*.*') as $fN){
	$p = pathinfo($fN);
	$out[] = $p['filename'];
	
}
echo json_encode($out);
?>