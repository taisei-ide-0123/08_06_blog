<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー新規作成</title>
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <form action="register_act.php" method="POST">
    <div class="new">
      <div>
        <h1>CreateUser</h1>
        <p>name</p>
        <input type="text" name="username">
      </div>
      <div>
        <p>password</p>
        <input type="password" name="password">
      </div>
      <div>
        <button>Create</button>
      </div>
      <a href="login.php">or login</a>
    </div>
  </form>
</body>

</html>