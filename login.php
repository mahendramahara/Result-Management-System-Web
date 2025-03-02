<?php
session_start();
// Redirect if already logged in
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

$pageTitle = "Login";
include('includes/header.php');
include('includes/nav.php');

$error = "";
$success = "";

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    // Simple validation
    if (empty($username) || empty($password)) {
        $error = "Username and password are required.";
    } else {
        // In a real application, you would verify from database
        // For demonstration, we're using a hardcoded check
        if ($username === "admin" && $password === "admin123") {
            // Set session variables
            $_SESSION['user_id'] = 1;
            $_SESSION['user_name'] = "Administrator";
            $_SESSION['user_role'] = "admin";
            $_SESSION['last_login'] = time();
            
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit;
        } else if ($username === "student" && $password === "student123") {
            // Set session variables for student
            $_SESSION['user_id'] = 2;
            $_SESSION['user_name'] = "John Student";
            $_SESSION['user_role'] = "student";
            $_SESSION['last_login'] = time();
            
            // Redirect to dashboard
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<div class="form-container">
    <div class="form-card">
        <h2>Welcome Back</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-wrapper">
                    <i class="fas fa-user icon"></i>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock icon"></i>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
            </div>
            
            <div class="remember-me">
                <div class="remember-checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            
            <button type="submit" name="login" class="btn-primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>
        
        <div class="form-footer">
            <p>Don't have an account? <a href="signup.php">Create Account</a></p>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
