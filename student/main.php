<?php
// Ensure this file is not accessed directly
if (!defined('BASEPATH')) {
    define('BASEPATH', true);
}

// Get student data (in a real app, you would fetch this from the database using the student ID)
$studentName = $_SESSION['user_name'] ?? 'Student';
$studentId = $_SESSION['user_id'] ?? '';
$lastLogin = date("Y-m-d H:i:s", $_SESSION['last_login'] ?? time());
$joinDate = $_SESSION['join_date'] ?? date('Y-m-d', strtotime('-1 year'));
$currentDate = date('Y-m-d');

// Placeholder data - in a real application, these would come from database queries
$recentResults = [
    ["exam" => "Mid-Term Examination", "date" => "2023-10-15", "status" => "Published", "marks" => "420/500"],
    ["exam" => "First Unit Test", "date" => "2023-09-05", "status" => "Published", "marks" => "87/100"],
    ["exam" => "Final Examination", "date" => "2023-12-10", "status" => "Upcoming", "marks" => "N/A"]
];
?>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>Welcome, <?php echo htmlspecialchars($studentName); ?>!</h2>
        <p class="last-login">Last login: <?php echo $lastLogin; ?></p>
    </div>
    
    <div class="dashboard-stats">
        <div class="stat-card">
            <i class="fas fa-chart-line"></i>
            <h3>Overall Grade</h3>
            <p class="stat-number">B+</p>
            <p>Current academic standing</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-medal"></i>
            <h3>Total Marks</h3>
            <p class="stat-number">82%</p>
            <p>Average across all subjects</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-tasks"></i>
            <h3>Subjects</h3>
            <p class="stat-number">6/6</p>
            <p>Results available</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-trophy"></i>
            <h3>Rank</h3>
            <p class="stat-number">8</p>
            <p>Class position</p>
        </div>
    </div>
    
    <div class="result-search-section">
        <h3>Search Your Results</h3>
        <div class="search-container">
            <form action="search_results.php" method="GET" class="search-form">
                <div class="form-group">
                    <label for="from_date">From Date:</label>
                    <input type="date" id="from_date" name="from_date" value="<?php echo $joinDate; ?>" min="<?php echo $joinDate; ?>" max="<?php echo $currentDate; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="to_date">To Date:</label>
                    <input type="date" id="to_date" name="to_date" value="<?php echo $currentDate; ?>" min="<?php echo $joinDate; ?>" max="<?php echo $currentDate; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exam_type">Exam Type:</label>
                    <select id="exam_type" name="exam_type" class="form-control">
                        <option value="">All Exams</option>
                        <option value="midterm">Mid-Term</option>
                        <option value="final">Final</option>
                        <option value="unit_test">Unit Test</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> Search</button>
            </form>
        </div>
    </div>
    
    <div class="action-buttons">
        <a href="view_result.php" class="btn btn-primary"><i class="fas fa-eye"></i> View Complete Results</a>
        <a href="download_result.php" class="btn btn-secondary"><i class="fas fa-download"></i> Download Result PDF</a>
    </div>
    
    <div class="recent-results">
        <h3>Recent Examination Results</h3>
        <table class="result-table">
            <thead>
                <tr>
                    <th>Examination</th>
                    <th>Date</th>
                    <th>Marks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recentResults as $result): ?>
                <tr>
                    <td><?php echo htmlspecialchars($result['exam']); ?></td>
                    <td><?php echo htmlspecialchars($result['date']); ?></td>
                    <td><?php echo htmlspecialchars($result['marks']); ?></td>
                    <td>
                        <span class="status-badge status-<?php echo strtolower($result['status']); ?>">
                            <?php echo htmlspecialchars($result['status']); ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($result['status'] == 'Published'): ?>
                        <a href="view_exam_result.php?exam=<?php echo urlencode($result['exam']); ?>" class="btn btn-sm btn-view">View</a>
                        <a href="download_exam_result.php?exam=<?php echo urlencode($result['exam']); ?>" class="btn btn-sm btn-download">PDF</a>
                        <?php else: ?>
                        <span class="btn-disabled">Not Available</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Add custom CSS for the student dashboard -->
    <style>
        .dashboard-container {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .dashboard-header {
            margin-bottom: 30px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
        }
        
        .dashboard-stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .stat-card {
            flex-basis: 23%;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-card i {
            font-size: 2rem;
            color: #4a6fdc;
            margin-bottom: 10px;
        }
        
        .stat-card .stat-number {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }
        
        .result-search-section {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .search-form {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            gap: 15px;
        }
        
        .form-group {
            flex-grow: 1;
        }
        
        .search-btn {
            height: 38px;
            margin-bottom: 1px;
        }
        
        .action-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: #4a6fdc;
            color: white;
            border: none;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .result-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .result-table th,
        .result-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
        }
        
        .result-table th {
            background-color: #f8f9fa;
            text-align: left;
            font-weight: 600;
        }
        
        .result-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .result-table .btn-sm {
            padding: 5px 10px;
            font-size: 0.875rem;
        }
        
        .btn-view {
            background-color: #28a745;
            color: white;
        }
        
        .btn-download {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-disabled {
            color: #6c757d;
            cursor: not-allowed;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-published {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-upcoming {
            background-color: #fff3cd;
            color: #856404;
        }
        
        @media (max-width: 992px) {
            .dashboard-stats {
                flex-direction: column;
                gap: 15px;
            }
            
            .stat-card {
                flex-basis: 100%;
            }
            
            .search-form {
                flex-direction: column;
            }
        }
    </style>
</div>
