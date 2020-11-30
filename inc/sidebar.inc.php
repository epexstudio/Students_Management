<div class='sidebar'>
		<div class='sidebar-area'> 
			<div class='pro' style='margin-bottom: 20px;'> 
				<div> 
					<div class='user-profile'> 
						<img src='assets/profile.svg' class='img-responsive' style='max-height: 80px;' /> 
					</div>
				</div> 
				<div> 
					<div class='user-names'> 
						<?php echo "$userFirstName";  ?>
					</div>
					
					<div class='user-role'> 
						<?php echo "$userRole";  ?>
					</div>
				</div> 
			</div> 
			<ul class='sidebar-menu'>
				<li><a href='index.php'>Dashboard</a></li>
                <li><a href='profile.php?token=<?php echo $userToken; ?>'> Profile</a></li>
                <li><a href='add-faculty.php'>Add Faculty</a></li>
                <li><a href='#'>Faculty Record</a></li>
                <li><a href='#'>Add Students</a></li>
                <li><a href='#'>Students Record</a></li>
                <li><a href='#'>Classes</a></li>
                <li><a href='#'>Subjects</a></li>
                <li><a href='#'> Add Events</a></li>
                
			</ul> 
		</div> 
	</div>