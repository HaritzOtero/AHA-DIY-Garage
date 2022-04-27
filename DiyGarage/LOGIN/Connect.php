<?php
	function KonektatuDatuBasera()
		{
			
			if (!($konexioa=mysqli_connect("localhost","root","")))
			{
				
				echo "There is an error connecting the DB.";
				exit();
			}
			
			
			if (!mysqli_select_db($konexioa,"aha_diy_garage"))
			{
				
				
			echo "There is an error selecting the DB.";
			exit();
			}
			
			return $konexioa;
		}
?>