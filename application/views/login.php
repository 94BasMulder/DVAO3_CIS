<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
  
    <?php echo isset($error) ? $error : ''; ?>
    <form method="post" action="http://localhost:81/DVAO3_CIS/index.php/login/process">
      Username:<input type="text" name="user">
      Password:<input type="text" name="pass">
      <input type="submit" value="Login">
    </form>
</body>
</html>
