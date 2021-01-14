<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogログイン画面</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <form action="login_act.php" method="POST">
    <div class="new">
      <h1>Login</h1>
      <div>
        <p>name</p>
        <input type="text" name="username">
      </div>
      <div>
        <p>password</p>
        <input type="password" name="password">
      </div>
      <div>
        <button>Sign up</button>
      </div>
      <a href="register.php">or register</a>
    </div>
  </form>

</body>

</html>