<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);
$loggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
?>

<nav class="nav-bar">
  <a href="index.php" <?php echo ($currentPage == 'index.php') ? 'class="active"' : ''; ?>>Home</a>
  <a href="view-results.php" <?php echo ($currentPage == 'view-results.php') ? 'class="active"' : ''; ?>>View Results</a>
  <a href="about.php" <?php echo ($currentPage == 'about.php') ? 'class="active"' : ''; ?>>About</a>
  
  <?php if($loggedIn): ?>
    <a href="dashboard.php" <?php echo ($currentPage == 'dashboard.php') ? 'class="active"' : ''; ?>>Dashboard</a>
    <a href="logout.php" <?php echo ($currentPage == 'logout.php') ? 'class="active"' : ''; ?>>Logout</a>
  <?php else: ?>
    <a href="login.php" <?php echo (in_array($currentPage, ['login.php', 'signup.php'])) ? 'class="active"' : ''; ?>>Sign Up / Login</a>
  <?php endif; ?>
</nav>