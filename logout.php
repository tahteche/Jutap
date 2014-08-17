<?php
 require_once 'google/appengine/api/users/UserService.php';

//Alias to make names of ...\User and ...\Userservice classes shorter
 use google\appengine\api\users\User as User;
 use google\appengine\api\users\UserService as UserService;
  
 
//Check if someone already logged in. If a user is logged in, a $user object is created if not, null is returned.
 $user = UserService::getCurrentUser();

//If no user is logged in, redirect to Login Page
if ($user) {
  header('Location: ' .
		 UserService::createLogoutURL('/'));
}
?>