<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
	<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
	<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">

    <style>
        html,
        body{
            height:100%;
        }

        body{
            display:flex;
            align-items:center;
            padding-top:40px;
            padding-bottom:40px;
            background-image: url("image_movies/background.jpg");
            background-size: cover;
            background-position: center;
        }
        .form-signin{
            width:100%;
            max-width:340px;
            padding:15px;
            margin:auto;
        }

        .form-floating{
          margin-bottom:10px;
        }

    </style>
	
</head>
<body class="text-center">
<!-- Creating a form which will post us some data in register.php file -->
<main class="form-signin">
  <form action="signupMovieLogic.php" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Register</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Name" name="name">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password">
      <label for="floatingInput">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm_password">
      <label for="floatingPassword">Confirm Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
    <span>Already have an account: </span><a href="loginMovie.php">Sign in</a>
  </form>
</main>

</body>
</html>