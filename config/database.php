<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "result_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
function setupDatabase($conn) {
    // Users table (updated with email and student_id fields)
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE,
        role VARCHAR(20) NOT NULL,
        student_id INT(11) NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
    )";
    $conn->query($sql);

    // Students table
    $sql = "CREATE TABLE IF NOT EXISTS students (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        roll_number VARCHAR(20) NOT NULL UNIQUE,
        name VARCHAR(100) NOT NULL,
        class VARCHAR(20) NOT NULL,
        section VARCHAR(10),
        dob DATE,
        gender VARCHAR(10),
        email VARCHAR(100),
        phone VARCHAR(15),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->query($sql);

    // Subjects table
    $sql = "CREATE TABLE IF NOT EXISTS subjects (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        code VARCHAR(20) NOT NULL UNIQUE,
        max_marks INT(11) NOT NULL DEFAULT 100
    )";
    $conn->query($sql);

    // Results table
    $sql = "CREATE TABLE IF NOT EXISTS results (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        student_id INT(11) NOT NULL,
        subject_id INT(11) NOT NULL,
        marks_obtained FLOAT NOT NULL,
        exam_type VARCHAR(20) NOT NULL,
        semester VARCHAR(20),
        year INT(4) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
        FOREIGN KEY (subject_id) REFERENCES subjects(id) ON DELETE CASCADE
    )";
    $conn->query($sql);

    // Insert default admin if not exists
    $password_hash = password_hash("admin123", PASSWORD_DEFAULT);
    $sql = "INSERT IGNORE INTO users (username, password, name, role, email) VALUES ('admin', '$password_hash', 'Administrator', 'admin', 'admin@example.com')";
    $conn->query($sql);

    // Insert sample subjects
    $subjects = [
        ['Mathematics', 'MATH101', 100],
        ['Physics', 'PHY101', 100],
        ['Chemistry', 'CHEM101', 100],
        ['English', 'ENG101', 100],
        ['Computer Science', 'CS101', 100]
    ];
    
    foreach ($subjects as $subject) {
        $sql = "INSERT IGNORE INTO subjects (name, code, max_marks) VALUES ('{$subject[0]}', '{$subject[1]}', {$subject[2]})";
        $conn->query($sql);
    }
    
    // Insert sample students if not exists
    $students = [
        ['S001', 'John Doe', '10', 'A', '2000-01-15', 'Male', 'john@example.com', '1234567890'],
        ['S002', 'Jane Smith', '10', 'B', '2000-05-20', 'Female', 'jane@example.com', '9876543210'],
        ['S003', 'Michael Johnson', '11', 'A', '1999-11-10', 'Male', 'michael@example.com', '5555555555']
    ];
    
    foreach ($students as $student) {
        $sql = "INSERT IGNORE INTO students (roll_number, name, class, section, dob, gender, email, phone) 
                VALUES ('{$student[0]}', '{$student[1]}', '{$student[2]}', '{$student[3]}', '{$student[4]}', '{$student[5]}', '{$student[6]}', '{$student[7]}')";
        $conn->query($sql);
    }
}

// Setup the database
setupDatabase($conn);
?>
