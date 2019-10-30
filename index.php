<?php
//include 'php_scripts/register.php';
    $dbname = 'hello';
    $servername = 'localhost';
    $username = 'root';
    $pwd = '';
    $conn = new mysqli($servername,$username,$pwd,$dbname) or die(mysqli_error($conn));
    if(isset($_POST['save'])){
        $un = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        //CREATE table usersample (id int primary key auto_increment, username varchar(25), mobile_no varchar(10))
        $sql = "INSERT INTO haii (name,password) VALUES('$un','$password')";//query
		if ($conn->query($sql) === TRUE) {
		    print '<script type="text/javascript">';
		    print 'alert("Registered Successfully");';
			print '</script>';
		}else {
		    print '<script type="text/javascript">';
			print 'alert("Registered Unsuccessful, Error '. $sql .' and '. $conn->error .'.");';
			print '</script>';
		}
    }
?>
<html>
<title></title>
<head></head>
<body>
    
    <div style="text-align: center;">
        <form method="POST" action="<?php 
                 echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password"><br>
            <button type="submit" name="save">Save</button>
        </form>
    </div>
</body>
</html>
<?php
/*
$user_check_query = "SELECT * FROM customers WHERE username='$username' OR email_id='$email' LIMIT 1";
			$result = mysqli_query($conn, $user_check_query);
			$user = mysqli_fetch_assoc($result);
			if($user){
				if($user['username'] === $username){
					print '<script type="text/javascript">';
					print 'alert("Username Exists");';
					print '</script>';
				}
				else if($user['email'] === $email) {
					print '<script type="text/javascript">';
					print 'alert("Email ID Exists");';
					print '</script>';
				}
            }
            

$user_check_query = "SELECT * FROM customers WHERE username='$user_login' AND password='$pwdencrypt' LIMIT 1";
				$result = mysqli_query($conn, $user_check_query);
				if(mysqli_num_rows($result) == 1){
					$_SESSION['username'] = $user_login;
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				}else {
					print '<script type="text/javascript">';
					print 'alert("Invalid username [or] password");';
					print '</script>';
				}
                */
                ?>