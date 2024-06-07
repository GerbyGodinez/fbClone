<?php
require 'db_setup.php'; // Include the database setup script

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (!empty($username) && !empty($password)) {
        try {
            $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password); // Store password as plain text
            $stmt->execute();
            header('Location: home.php'); // Redirect to home.php
            exit;
        } catch (PDOException $ex) {
            $message = 'Error: ' . $ex->getMessage();
        }
    } else {
        $message = 'Please fill in both fields.';
    }
}
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login Page</title>
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <style>
          body {
              display: flex;
              justify-content: center;
              align-items: center;
              height: 100vh;
              background-color: #f0f2f5;
              margin: 0;
          }
          .login-container {
              max-width: 400px;
              width: 100%;
          }
          .login-container .form-container {
              background-color: white;
              padding: 20px;
              border-radius: 8px;
              box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
          }
          .login-container .form-container .btn-primary {
              background-color: #1877f2;
              border-color: #1877f2;
          }
          .login-container .form-container .btn-primary:hover {
              background-color: #165db6;
              border-color: #165db6;
          }
          .login-container .form-container .form-control {
              margin-bottom: 15px;
          }
          .login-container .form-container .text-center a {
              color: #1877f2;
          }
      </style>
  </head>
  <body>
      <div class="login-container">       
          <div class="text-center mb-4">
              <img src="fb.PNG" alt="Facebook Logo">
          </div>
          <div class="form-container">           
              <form method="post" action="index.php">
                  <div class="form-group">
                    <br>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Email or phone number" required>
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Log In</button>
                  <div class="text-center mt-3">
                      <a href="#">Forgot password?</a>
                  </div>
                  <hr>
                  <div class="text-center">
                      <a href="#" class="btn btn-success text-white">Create new account</a>
                  </div>
              </form>
          </div>
      </div>
  </body>
  </html>


