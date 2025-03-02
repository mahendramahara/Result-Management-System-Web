<?php
$pageTitle = "View Results";
include('includes/header.php');
include('includes/nav.php');

$resultMessage = "";
$studentData = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['roll_number'])) {
    $rollNumber = trim($_POST['roll_number']);
    
    if (!empty($rollNumber)) {
        // Dummy data for demonstration
        $studentData = [
            'name' => 'John Doe',
            'roll_number' => $rollNumber,
            'class' => 'Class X',
            'subjects' => [
                ['name' => 'Mathematics', 'marks' => 85, 'grade' => 'A'],
                ['name' => 'Science', 'marks' => 78, 'grade' => 'B'],
                ['name' => 'English', 'marks' => 92, 'grade' => 'A+'],
                ['name' => 'Social Studies', 'marks' => 75, 'grade' => 'B'],
                ['name' => 'Computer Science', 'marks' => 88, 'grade' => 'A'],
            ],
            'total_marks' => 418,
            'percentage' => 83.6,
            'overall_grade' => 'A'
        ];
    } else {
        $resultMessage = "Please enter a valid roll number.";
    }
}
?>

<div class="container" style="max-width: 800px; margin: 30px auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <h2 style="text-align: center; color: var(--primary-color); margin-bottom: 20px;">Student Result Portal</h2>
    
    <?php if (!$studentData): ?>
        <form method="post" action="" style="max-width: 500px; margin: 0 auto;">
            <div style="margin-bottom: 20px;">
                <label for="roll_number" style="display: block; margin-bottom: 8px; font-weight: bold;">Enter Roll Number:</label>
                <input type="text" id="roll_number" name="roll_number" required 
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            
            <div style="text-align: center;">
                <button type="submit" style="background-color: var(--primary-color); color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                    Check Result
                </button>
            </div>
            
            <?php if (!empty($resultMessage)): ?>
                <p style="color: red; text-align: center; margin-top: 15px;"><?php echo $resultMessage; ?></p>
            <?php endif; ?>
        </form>
    <?php else: ?>
        <div class="result-card">
            <div style="background-color: var(--primary-color); color: white; padding: 15px; border-radius: 8px 8px 0 0;">
                <h3 style="margin: 0; text-align: center;">Student Details</h3>
            </div>
            
            <div style="padding: 20px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 20px;">
                    <p><strong>Name:</strong> <?php echo $studentData['name']; ?></p>
                    <p><strong>Roll Number:</strong> <?php echo $studentData['roll_number']; ?></p>
                    <p><strong>Class:</strong> <?php echo $studentData['class']; ?></p>
                </div>
                
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background-color: #f3f3f3;">
                            <th style="padding: 10px; text-align: left; border: 1px solid #ddd;">Subject</th>
                            <th style="padding: 10px; text-align: center; border: 1px solid #ddd;">Marks</th>
                            <th style="padding: 10px; text-align: center; border: 1px solid #ddd;">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($studentData['subjects'] as $subject): ?>
                            <tr>
                                <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $subject['name']; ?></td>
                                <td style="padding: 10px; text-align: center; border: 1px solid #ddd;"><?php echo $subject['marks']; ?></td>
                                <td style="padding: 10px; text-align: center; border: 1px solid #ddd;"><?php echo $subject['grade']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <div style="background-color: #f9f9f9; padding: 15px; border-radius: 5px;">
                    <p><strong>Total Marks:</strong> <?php echo $studentData['total_marks']; ?> / 500</p>
                    <p><strong>Percentage:</strong> <?php echo $studentData['percentage']; ?>%</p>
                    <p><strong>Overall Grade:</strong> <?php echo $studentData['overall_grade']; ?></p>
                </div>
                
                <div style="margin-top: 20px; text-align: center;">
                    <button onclick="window.print()" style="background-color: var(--secondary-color); color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                        <i class="fas fa-print"></i> Print Result
                    </button>
                    <a href="view-results.php" style="display: inline-block; margin-left: 10px; background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none;">
                        Check Another Result
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php
include('includes/footer.php');
?>