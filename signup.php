<?php
session_start();
// Redirect if already logged in
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

$pageTitle = "Sign Up";
include('includes/header.php');
include('includes/nav.php');

$error = "";
$success = "";

// Process signup form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'] ?? 'student';
    
    // Simple validation
    if (empty($name) || empty($email) || empty($username) || empty($password)) {
        $error = "All fields are required.";
    } else if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else if (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // In a real application, you would save to database
        // For demonstration, we'll show a success message
        $success = "Account created successfully! You can now login.";
    }
}
?>

<div class="signup-container">
    <div class="form-card">
        <h2>Create an Account</h2>
        
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
        
        <form method="post" action="" id="signupForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user icon"></i>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-wrapper">
                    <i class="fas fa-user-circle icon"></i>
                    <input type="text" id="username" name="username" placeholder="Choose a username" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="password" name="password" placeholder="Create a password" required onkeyup="checkPasswordStrength()">
                    </div>
                    <div class="strength-meter"><div id="strength-bar"></div></div>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                    </div>
                </div>
            </div>
            
            <div class="role-selection">
                <label><i class="fas fa-user-tag"></i> Select Your Role</label>
                <div class="role-options">
                    <div class="role-option">
                        <input type="radio" id="student" name="role" value="student" checked>
                        <label for="student">
                            <i class="fas fa-user-graduate"></i>
                            <span>Student</span>
                        </label>
                    </div>
                    
                    <div class="role-option">
                        <input type="radio" id="teacher" name="role" value="teacher">
                        <label for="teacher">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Teacher</span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="terms">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
            </div>
            
            <button type="submit" name="signup" class="btn-primary">
                <i class="fas fa-user-plus"></i> Create Account
            </button>
        </form>
        
        <div class="form-footer">
            <p>Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>
</div>

<script>
function checkPasswordStrength() {
    var password = document.getElementById('password').value;
    var strengthBar = document.getElementById('strength-bar');
    
    // Remove previous classes
    strengthBar.classList.remove('weak', 'medium', 'strong');
    
    if (password.length === 0) {
        strengthBar.style.width = '0';
        return;
    }
    
    // Check strength
    var strength = 0;
    if (password.length >= 6) strength += 1;
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 1;
    if (password.match(/\d/) || password.match(/[^a-zA-Z0-9]/)) strength += 1;
    
    // Update the strength bar
    switch(strength) {
        case 1:
            strengthBar.classList.add('weak');
            break;
        case 2:
            strengthBar.classList.add('medium');
            break;
        case 3:
            strengthBar.classList.add('strong');
            break;
    }
}
</script>

<?php
include('includes/footer.php');
?>
