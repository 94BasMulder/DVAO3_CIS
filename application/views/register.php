<!DOCTYPE html>
<html>
<head>
    <title>Register Page</title>
</head>
<body>

    <?php echo isset($error) ? $error : ''; ?>
    <form method="post" action="http://localhost:81/DVAO3_CIS/index.php/register/process">
      Username:<input type="text" name="user">
      Password:<input type="password" name="pass">
      <input type="submit" value="Register">
    </form>
</body>
