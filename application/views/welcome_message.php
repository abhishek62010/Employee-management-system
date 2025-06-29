<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Employee Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background:rgb(41, 111, 181);
      font-family: 'Segoe UI', sans-serif;
    }
    .welcome-box {
      background: #fff;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      margin-top: 100px;
    }
    h1 {
      color: #343a40;
      font-weight: bold;
    }
    p {
      color: #6c757d;
    }
    .btn-primary {
      padding: 10px 25px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center">
    <div class="welcome-box text-center">
      <h1>Welcome to Employee Management System</h1>
      <p class="mt-3">Login to manage employee details.</p>
      <a href="<?= site_url('auth/login') ?>" class="btn btn-primary mt-4">Login Now</a>
    </div>
  </div>
</body>
</html>
