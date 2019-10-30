//index
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

//display

<?php
//include 'php_scripts/register.php';
    $dbname = 'hello';
    $servername = 'localhost';
    $username = 'root';
    $pwd = '';
    $conn = new mysqli($servername,$username,$pwd,$dbname) or die(mysqli_error($conn));
?>
<html>
<head></head>
<body>
<div style="align: center;">
        <table>
            <tr><th>id</th><th>username</th><th>mobile</th></tr>
            <?php
                $result = mysqli_query($conn,"SELECT * FROM `haii`");
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <tr><td><?php echo "".$row['name']; ?></td><td><?php echo "".$row['password']; ?></td></tr>
            <?php
                }
            ?>
        </table>
    </div><br>
</body>
</html>

//login

<?php
    $dbname = 'hello';
    $servername = 'localhost';
    $username = 'root';
    $pwd = '';
    $conn = new mysqli($servername,$username,$pwd,$dbname) or die(mysqli_error($conn));
    if(isset($_POST['login'])){
    	$name = mysqli_real_escape_string($conn,$_POST['username']);
    	$pwd = mysqli_real_escape_string($conn,$_POST['password']);
    	$user_check_query = "SELECT * FROM haii WHERE name='$name' AND password='$pwd'";
					$result = mysqli_query($conn, $user_check_query);
					if(mysqli_num_rows($result)){
						$_SESSION['username'] = $user_login;
						$_SESSION['success'] = "You are now logged in";
						header('location: index.php');
					}else {
						print '<script type="text/javascript">';
						print 'alert("Invalid username [or] password");';
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
            <button type="submit" name="login">login</button>
        </form>
    </div>
</body>
</html>
