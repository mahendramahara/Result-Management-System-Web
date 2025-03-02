<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>Student Result Management System</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  
  <?php
  // Add page-specific CSS files
  $currentPage = basename($_SERVER['PHP_SELF'], '.php');
  if (file_exists("assets/css/{$currentPage}.css")) {
    echo '<link rel="stylesheet" href="assets/css/' . $currentPage . '.css">';
  }
  ?>
</head>

<body>
  <header>
    <h1>Student Result Management System</h1>
  </header>