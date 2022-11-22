
<!DOCTYPE HTML>
<html>
<head>
  <title>My Profile</title>
    <link rel="stylesheet" href="css/style.css" title="style" />
</head>
<body>
  <div id="main">
      <nav id="nav">

      </nav>
      <div id="site_content">
      		<h1>Admin panel task</h1>
      <div id="content">
      <h2>Registration form</h2>
      </div>
          <form action="register.php" method="post">
              <label>
                  FirstName:
                  <input type="text" name="firstname">
              </label>
              <br>
              <label>
                  Surname:
                  <input type="text" name="surname">
              </label>
              <br>
              <label>
                  Username:
                  <input type="text" name="username">
              </label>
              <br>
              <label>
                  Password:
                  <input type="password" name="password">
              </label>
              <br>
              <label>
                  <label for="birthday">Date of birth:</label>
                  <input type="date" id="birthday" name="dob">
              </label>
              <br>
              <button type="submit" name="submit" value="submit" >Register</button>
          </form>
      </div>
      <h2>Already existing user?</h2>
      <form action="login.php" method="post">
          <button type="submit" name="submit" value="submit" >Login</button>
      </form>



  </div>
</body>
</html>
