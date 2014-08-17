<?php
 require_once 'google/appengine/api/users/UserService.php';

//Alias to make names of ...\User and ...\Userservice classes shorter
 use google\appengine\api\users\User as User;
 use google\appengine\api\users\UserService as UserService;
  
 
//Check if someone already logged in. If a user is logged in, a $user object is created if not, null is returned.
 $user = UserService::getCurrentUser();

//If no user is logged in, redirect to Login Page
if (!$user) {
	if($_GET['login']=='1'){
  	header('Location: ' .
		 UserService::createLoginURL('/'));
	}
	else{
		?>
            <li><a href="login.php?login=1"><b>Sign In with Google</b></a></li>
	<?php
	}
}
//If user is logged in, the if statement below executes
if ($user) {
	?>
	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo htmlspecialchars($user->getNickname()); ?></b><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout=1">Log Out</a></li>
              </ul>
            </li>
 <?php
}
?>