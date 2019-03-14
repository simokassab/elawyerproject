
<?php
//session_start();
$level= $_SESSION['user']['level_ID'];
$id=$_SESSION['user']['idd'];
$rights=getRightsByUser($id); 
 //check the rights
	if(($rights[0]['arch']!='R') && ($rights[0]['arch']!='RW')) {

	  echo "You don't have the rights to view this page.";
	}
	else {
		if(isset($_GET['todid'])){
		    $todid=$_GET['todid'];
		   
		   // $link="2/d/";
		    //echo $link;
		  ?>

		<div class="embed-responsive embed-responsive-16by9">

		<iframe class="embed-responsive-item" src="elfinder/elfinder.php?id=<?php echo $id."&level=".$level; ?>&todid=<?php echo $todid ;?>" width="100%" height="500px"></iframe>
		    </div>      
		<?php  
		}
		else {
		?>
		<div class="embed-responsive embed-responsive-16by9">

		<iframe class="embed-responsive-item" src="elfinder/elfinder.php?id=<?php echo $id."&level=".$level; ?>" width="100%" height="500px"></iframe>
		    </div>
		<?php

		} 

}

?>