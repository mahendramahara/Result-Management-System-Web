<?php
$pageTitle = "Home";
include('includes/header.php');
include('includes/nav.php');
?>

<div class="hero-section">
  <h1>Welcome to Your Dashboard</h1>
  <a href="view-results.php">Search Result</a>
</div>

<div class="features">
  <div class="feature-box">
    <i class="fas fa-user-graduate"></i>
    <h3>Student Login</h3>
    <p>Manage individual student profiles and track academic performance.</p>
    <a href="student-login.php">Go to Login</a>
  </div>

  <div class="feature-box">
    <i class="fas fa-user-cog"></i>
    <h3>Admin Settings</h3>
    <p>Control access, permissions, and overall system settings.</p>
    <a href="teacher-dashboard.php">Go to Login</a>
  </div>
</div>

<?php
include('includes/footer.php');
?>