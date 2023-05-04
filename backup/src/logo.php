 <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
 	<?php
 		if(($_SESSION['usertype']=="superadmin")||($_SESSION['usertype']=="admin")){
                        echo '  <a class="navbar-brand brand-logo" href="dashboards.php">
           <!--  <img src="../assetss/images/logo.svg" alt="logo" /> </a> -->
           <p style="color:white;font-size:20px;">Youth Development
           Office</p>
          <a class="navbar-brand brand-logo-mini" href="dashboards.php">
            YDO </a>';
	    }else if(($_SESSION['usertype']=="shs")||($_SESSION['usertype']=="college")){

          if($_SESSION['student']=="OK"){
                echo '  <a class="navbar-brand brand-logo" href="studentregister.php">
               <!--  <img src="../assetss/images/logo.svg" alt="logo" /> </a> -->
               <p style="color:white;font-size:20px;">Youth Development
               Office</p>
              <a class="navbar-brand brand-logo-mini" href="updatestudent.php">
                YDO </a>';
          }else if($_SESSION['student']=="NO"){
                echo '  <a class="navbar-brand brand-logo" href="studentregister.php">
                 <!--  <img src="../assetss/images/logo.svg" alt="logo" /> </a> -->
                 <p style="color:white;font-size:20px;">Youth Development
                 Office</p>
                <a class="navbar-brand brand-logo-mini" href="studentregister.php">
                  YDO </a>';
          }
	                      
	    }

	 	?>


 	
         
        </div>