<script>
    var logged_in = false;
</script>
<?php
if (!empty($_SESSION['user'])) {
    $loggedUser = $_SESSION['user'];
    $customers=  GetCustomerByID($_SESSION['user']['idd']);
    //print_r($users);
    ?>
    <script>
        var logged_in = true;
    </script>
    <?php
}
?>

<div class="top-header">
  <div class="container-fluid">  
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <!--<a class="navbar-brand" href="#">Brand</a>-->
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
					<ul class="nav navbar-nav navbar-right">
                                         
                        <li id="mainn" class="topmenu-text"><a href="index.php?action=mainpage">الصفحة الرئيسية </a></li>	
                        <li class="dropdown" id="liNotificationDropDown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                               aria-haspopup="true" aria-expanded="false">
                                 <span title="Notifications" ><img src="../images/top-icon-06.png"/></span>
                            <font class="badge badge-important" id='notification_counter' ></font>
                            </a>
                         <ul class="dropdown-menu notific-text"  id="notification_dropdown" role="menu">
			</ul>
                        </li>
                        <li class="dropdown" id="liNotificationemails">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span  title="Emails"></span> <img src="../images/top-icon-07.png"/></span>
                            <font class="badge badge-important" id='notification_counter1' ></font>
                            </a>
                        <ul class="dropdown-menu notific-text"  id="notification_emails">
			</ul>
                        </li>
                       
                        <li class="dropdown border-none"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <?php echo $loggedUser["fname"] . " " . $loggedUser["lname"] ?>
                               
                            </a>
                         <ul class="dropdown-menu">
								<li>
                                                                    <a href="<?php echo  'index.php?action=editestaff&estaffid='.$customers[0]['ID']; ?>">
                                                                    My Profile
                                                                    </a>
								</li>
								
								
								<li class="divider">
								</li>
								  <li><a  href="../DBS/LogoutActionCustomer.php">تسجيل خروج</a></li>
							</ul>
                        </li>
                        
						
					</ul>
                            
				</div>
				
			</nav>
			
		</div>
            
	</div>
      
  </div>  
    
</div> 
<div class="logo">
<div class="container">
 <div class="row">
   <div class="col-sm-12">
    <div class="logo-in"> <img src="../images/logo.png"/></div>
   </div>
 </div>
 </div>
    
</div>  

<script>
    function CreateNode (parent,childType, ID, childClass, href, InnerHTML) {
        var child ;
        // childType must be String 
        if(typeof (childType) === "string" ){
            child =  document.createElement(childType);
        }else {
            console.log("childType is not of type String: "+childType+" type: "+typeof (childType));
            return false ; 
        }
        // check if the child ID is not empty in order to add it or not ... 
        if(ID.replace(" ", "") !== "" && ID.replace(" ", "") !== null ){
            child.id = ID ; 
        }
        // check if childClass is not empty in order to add it .. 
        if(childClass.replace(" ", "") !== "" && childClass.replace(" ", "") !== null ){
            child.className = childClass ; 
        }
        // check if href is not empty in order to add it .. 
        if(href.replace(" ", "") !== "" && href.replace(" ", "") !== null ){
            // also must check if the childtype == a in order to add the href ... 
            if(childType === "a"){
                child.href = href ; 
            }else{
                console.log("childType cannot take href ");
                return false ; 
            }
        }
        // check if InnerHTML is not empty in order to add it .. 
        if(InnerHTML.replace(" ", "") !== "" && InnerHTML.replace(" ", "") !== null ){
            child.innerHTML = InnerHTML ; 
        }
        parent.appendChild(child);
        return child ; 
    } 
    function RemoveNode(parent , child){
        if(parent.hasChildNodes()){
            parent.removeChild(child);
            console.log("child element removed") ;
            return true ; 
        }else{
            console.log("can not remove child element") ;
            return false ; 
        }
        return true ; 
    }
	
	
</script>

