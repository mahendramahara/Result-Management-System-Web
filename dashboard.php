<?php
session_start();
$_SESSION['user_id'] = 1;
// Redirect if not logged in
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$pageTitle = "Dashboard";
include('includes/header.php');
include('includes/nav.php');
$_SESSION['user_role'] = 'admin';
// Get user role from session
$userRole = $_SESSION['user_role'] ?? '';

// Load appropriate dashboard based on role
if ($userRole == 'student') {
    include('student/main.php');
} elseif ($userRole == 'admin' || $userRole == 'teacher') {
    include('admin/main.php');
} else {
    // Handle undefined roles
    echo '<div class="error-message">Invalid user role. Please contact administrator.</div>';
}

include('includes/footer.php');
?>
