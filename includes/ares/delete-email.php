<?php include('../functions.php');?>
<?php include('../login/auth.php');?>
<?php 
	$id = isset($_POST['id']) && is_numeric($_POST['id']) ? mysqli_real_escape_string($mysqli, (int)$_POST['id']) : exit;
	
	$q = 'DELETE FROM ares_emails WHERE id = '.$id;
	$r = mysqli_query($mysqli, $q);
	if ($r)
	{
		if(file_exists('../../uploads/attachments/a'.$id))
		{
			$files = glob('../../uploads/attachments/a'.$id.'/*'); // get all file names
			foreach($files as $file){
			    unlink($file); 
			}
			rmdir('../../uploads/attachments/a'.$id);
		}
		echo true;
	}
	
?>