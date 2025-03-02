<?php
// Ensure this file is not accessed directly
if (!defined('BASEPATH')) {
    define('BASEPATH', true);
}

// Get admin data
$adminName = $_SESSION['user_name'] ?? 'Administrator';
$adminRole = $_SESSION['user_role'] ?? 'admin';
$lastLogin = date("Y-m-d H:i:s", $_SESSION['last_login'] ?? time());

// Placeholder data - in a real application, these would come from database queries
$studentCount = 250;
$teacherCount = 25;
$resultsPublished = 3;
$pendingResults = 2;
$classesManaged = 6;
?>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h2>Welcome, <?php echo htmlspecialchars($adminName); ?>!</h2>
        <p class="role-badge"><?php echo ucfirst(htmlspecialchars($adminRole)); ?></p>
        <p class="last-login">Last login: <?php echo $lastLogin; ?></p>
    </div>
    
    <div class="dashboard-stats">
        <div class="stat-card">
            <i class="fas fa-user-graduate"></i>
            <h3>Students</h3>
            <p class="stat-number"><?php echo $studentCount; ?></p>
            <p>Total registered</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-chalkboard-teacher"></i>
            <h3>Teachers</h3>
            <p class="stat-number"><?php echo $teacherCount; ?></p>
            <p>Total staff</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-check-circle"></i>
            <h3>Results</h3>
            <p class="stat-number"><?php echo $resultsPublished; ?></p>
            <p>Published</p>
        </div>
        
        <div class="stat-card">
            <i class="fas fa-chalkboard"></i>
            <h3>Classes</h3>
            <p class="stat-number"><?php echo $classesManaged; ?></p>
            <p>Being managed</p>
        </div>
    </div>
    
    <div class="management-tabs">
        <div class="tab-nav" role="tablist">
            <button class="tab-btn active" id="students-tab" data-target="students-panel">
                <i class="fas fa-user-graduate"></i> Student Management
            </button>
            <button class="tab-btn" id="teachers-tab" data-target="teachers-panel">
                <i class="fas fa-chalkboard-teacher"></i> Teacher Management
            </button>
            <button class="tab-btn" id="results-tab" data-target="results-panel">
                <i class="fas fa-file-alt"></i> Result Management
            </button>
            <button class="tab-btn" id="reports-tab" data-target="reports-panel">
                <i class="fas fa-chart-bar"></i> Reports & Analytics
            </button>
        </div>
        
        <div class="tab-content">
            <!-- Student Management Panel -->
            <div class="tab-panel active" id="students-panel">
                <h3>Student Management</h3>
                <div class="action-buttons">
                    <a href="admin/add_student.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Student</a>
                    <a href="admin/view_students.php" class="btn btn-secondary"><i class="fas fa-list"></i> View All Students</a>
                    <a href="admin/import_students.php" class="btn btn-secondary"><i class="fas fa-file-import"></i> Import Students</a>
                    <a href="admin/student_promotion.php" class="btn btn-secondary"><i class="fas fa-user-graduate"></i> Student Promotion</a>
                </div>
                
                <div class="search-box">
                    <h4>Quick Student Search</h4>
                    <form action="admin/search_students.php" method="GET">
                        <div class="search-form">
                            <div class="form-group">
                                <input type="text" name="search_term" placeholder="Search by Name, Roll No, or Class" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </form>
                </div>
                
                <div class="recent-records">
                    <h4>Recently Added Students</h4>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Roll No</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ST001</td>
                                    <td>John Doe</td>
                                    <td>Class X-A</td>
                                    <td>101</td>
                                    <td>
                                        <a href="#" class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="action-btn delete-btn" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ST002</td>
                                    <td>Jane Smith</td>
                                    <td>Class IX-B</td>
                                    <td>205</td>
                                    <td>
                                        <a href="#" class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="action-btn delete-btn" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Teacher Management Panel -->
            <div class="tab-panel" id="teachers-panel">
                <h3>Teacher Management</h3>
                <div class="action-buttons">
                    <a href="admin/add_teacher.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Teacher</a>
                    <a href="admin/view_teachers.php" class="btn btn-secondary"><i class="fas fa-list"></i> View All Teachers</a>
                    <a href="admin/assign_subjects.php" class="btn btn-secondary"><i class="fas fa-book"></i> Assign Subjects</a>
                    <a href="admin/assign_classes.php" class="btn btn-secondary"><i class="fas fa-chalkboard"></i> Assign Classes</a>
                </div>
                
                <div class="search-box">
                    <h4>Quick Teacher Search</h4>
                    <form action="admin/search_teachers.php" method="GET">
                        <div class="search-form">
                            <div class="form-group">
                                <input type="text" name="search_term" placeholder="Search by Name, ID, or Subject" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> Search</button>
                        </div>
                    </form>
                </div>
                
                <div class="recent-records">
                    <h4>Recently Added Teachers</h4>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Contact</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>T001</td>
                                    <td>Prof. Robert Johnson</td>
                                    <td>Mathematics</td>
                                    <td>robert@example.com</td>
                                    <td>
                                        <a href="#" class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="action-btn delete-btn" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>T002</td>
                                    <td>Dr. Emily Wilson</td>
                                    <td>Science</td>
                                    <td>emily@example.com</td>
                                    <td>
                                        <a href="#" class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="action-btn delete-btn" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Result Management Panel -->
            <div class="tab-panel" id="results-panel">
                <h3>Result Management</h3>
                <div class="action-buttons">
                    <a href="admin/add_result.php" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Result</a>
                    <a href="admin/bulk_results.php" class="btn btn-secondary"><i class="fas fa-file-upload"></i> Bulk Upload</a>
                    <a href="admin/publish_results.php" class="btn btn-secondary"><i class="fas fa-check-double"></i> Publish Results</a>
                    <a href="admin/result_template.php" class="btn btn-secondary"><i class="fas fa-file-download"></i> Download Template</a>
                </div>
                
                <div class="exam-calendar">
                    <h4>Exam Calendar</h4>
                    <div class="calendar-container">
                        <div class="exam-event upcoming">
                            <div class="event-date">Dec<br>10</div>
                            <div class="event-details">
                                <h5>Final Examination</h5>
                                <p>All Classes</p>
                                <span class="event-status">Upcoming</span>
                            </div>
                        </div>
                        
                        <div class="exam-event results-pending">
                            <div class="event-date">Nov<br>15</div>
                            <div class="event-details">
                                <h5>Unit Test 3</h5>
                                <p>Class IX, X</p>
                                <span class="event-status">Results Pending</span>
                            </div>
                        </div>
                        
                        <div class="exam-event published">
                            <div class="event-date">Oct<br>15</div>
                            <div class="event-details">
                                <h5>Mid-Term Examination</h5>
                                <p>All Classes</p>
                                <span class="event-status">Results Published</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="result-actions">
                    <h4>Results to Publish</h4>
                    <div class="notification-list">
                        <div class="notification">
                            <i class="fas fa-bell"></i>
                            <div class="notification-content">
                                <h5>Unit Test 3 Results Ready</h5>
                                <p>Results are ready to be published for Class IX and X</p>
                            </div>
                            <div class="notification-actions">
                                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Publish</a>
                                <a href="#" class="btn btn-sm btn-secondary"><i class="fas fa-eye"></i> Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reports Panel -->
            <div class="tab-panel" id="reports-panel">
                <h3>Reports & Analytics</h3>
                <div class="action-buttons">
                    <a href="admin/class_performance.php" class="btn btn-primary"><i class="fas fa-chart-line"></i> Class Performance</a>
                    <a href="admin/student_progress.php" class="btn btn-secondary"><i class="fas fa-user-chart"></i> Student Progress</a>
                    <a href="admin/subject_analysis.php" class="btn btn-secondary"><i class="fas fa-book-open"></i> Subject Analysis</a>
                    <a href="admin/custom_report.php" class="btn btn-secondary"><i class="fas fa-file-alt"></i> Custom Reports</a>
                </div>
                
                <div class="report-preview">
                    <h4>Performance Overview</h4>
                    <div class="chart-container">
                        <div class="chart-placeholder">
                            <i class="fas fa-chart-bar"></i>
                            <p>Class-wise Performance Chart</p>
                            <span>Click on Class Performance to view detailed analytics</span>
                        </div>
                    </div>
                </div>
                
                <div class="recent-records">
                    <h4>Top Performers</h4>
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Percentage</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Samantha Wright</td>
                                    <td>Class X-A</td>
                                    <td>98.4%</td>
                                    <td>
                                        <a href="#" class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn print-btn" title="Print"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Michael Chen</td>
                                    <td>Class X-B</td>
                                    <td>97.8%</td>
                                    <td>
                                        <a href="#" class="action-btn view-btn" title="View"><i class="fas fa-eye"></i></a>
                                        <a href="#" class="action-btn print-btn" title="Print"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="recent-activities">
        <h3>System Notifications</h3>
        <div class="activity-list">
            <div class="activity-item">
                <div class="activity-icon"><i class="fas fa-file-alt"></i></div>
                <div class="activity-details">
                    <h4>Mid-Term Results Published</h4>
                    <p>Results for Class X have been published</p>
                    <span class="activity-time">2 hours ago</span>
                </div>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon"><i class="fas fa-user-plus"></i></div>
                <div class="activity-details">
                    <h4>New Students Added</h4>
                    <p>5 new students were added to Class IX</p>
                    <span class="activity-time">Yesterday</span>
                </div>
            </div>
            
            <div class="activity-item">
                <div class="activity-icon"><i class="fas fa-user-tie"></i></div>
                <div class="activity-details">
                    <h4>New Teacher Registered</h4>
                    <p>Mr. James Wilson has joined the Science department</p>
                    <span class="activity-time">3 days ago</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Complete CSS styling for admin dashboard -->
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        
        .dashboard-header h2 {
            margin: 0;
        }
        
        .role-badge {
            display: inline-block;
            padding: 5px 15px;
            background-color: #4a6fdc;
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .last-login {
            font-size: 0.85rem;
            color: #6c757d;
        }
        
        .dashboard-stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 15px;
        }
        
        .stat-card {
            flex: 1 1 200px;
            min-width: 200px;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .stat-card i {
            font-size: 2.5rem;
            color: #4a6fdc;
            margin-bottom: 15px;
        }
        
        .stat-card .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }
        
        /* Management Tabs Styling */
        .management-tabs {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .tab-nav {
            display: flex;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            overflow-x: auto;
            scrollbar-width: none; /* Firefox */
        }
        
        .tab-nav::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Edge */
        }
        
        .tab-btn {
            padding: 15px 25px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            color: #495057;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .tab-btn i {
            font-size: 1.2rem;
        }
        
        .tab-btn:hover {
            color: #4a6fdc;
            background-color: rgba(74, 111, 220, 0.05);
        }
        
        .tab-btn.active {
            color: #4a6fdc;
            font-weight: 600;
        }
        
        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #4a6fdc;
        }
        
        .tab-content {
            padding: 25px;
        }
        
        .tab-panel {
            display: none;
        }
        
        .tab-panel.active {
            display: block;
        }
        
        .tab-panel h3 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
            font-size: 1.4rem;
        }
        
        /* Action buttons styling */
        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 25px;
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .btn-primary {
            background-color: #4a6fdc;
            color: white;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-sm {
            padding: 5px 10px;
            font-size: 0.85rem;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        /* Search box styling */
        .search-box {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
        }
        
        .search-box h4 {
            margin-top: 0;
            margin-bottom: 15px;
        }
        
        .search-form {
            display: flex;
            gap: 10px;
        }
        
        .form-group {
            flex: 1;
        }
        
        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 1rem;
        }
        
        .search-btn {
            white-space: nowrap;
        }
        
        /* Table styling */
        .recent-records {
            margin-bottom: 25px;
        }
        
        .recent-records h4 {
            margin-bottom: 15px;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            border-radius: 5px;
            overflow: hidden;
        }
        
        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        .data-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        /* Action buttons in tables */
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            margin-right: 5px;
            transition: transform 0.3s ease;
        }
        
        .action-btn:hover {
            transform: scale(1.1);
        }
        
        .view-btn {
            background-color: #17a2b8;
        }
        
        .edit-btn {
            background-color: #ffc107;
        }
        
        .delete-btn {
            background-color: #dc3545;
        }
        
        .print-btn {
            background-color: #28a745;
        }
        
        /* Exam calendar styling */
        .exam-calendar {
            margin-bottom: 25px;
        }
        
        .calendar-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .exam-event {
            display: flex;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .exam-event.upcoming {
            border-left: 5px solid #ffc107;
        }
        
        .exam-event.results-pending {
            border-left: 5px solid #17a2b8;
        }
        
        .exam-event.published {
            border-left: 5px solid #28a745;
        }
        
        .event-date {
            width: 80px;
            background-color: #4a6fdc;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 1.2;
            padding: 15px 0;
        }
        
        .event-details {
            padding: 15px;
            flex: 1;
        }
        
        .event-details h5 {
            margin: 0 0 5px;
            font-size: 1.1rem;
        }
        
        .event-details p {
            margin: 0 0 10px;
            color: #6c757d;
        }
        
        .event-status {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .published .event-status {
            background-color: #d4edda;
            color: #155724;
        }
        
        .upcoming .event-status {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .results-pending .event-status {
            background-color: #d1ecf1;
            color: #0c5460;
        }
        
        /* Notification list styling */
        .result-actions {
            margin-bottom: 25px;
        }
        
        .notification-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .notification {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .notification i {
            font-size: 1.5rem;
            color: #ffc107;
            margin-right: 15px;
        }
        
        .notification-content {
            flex: 1;
        }
        
        .notification-content h5 {
            margin: 0 0 5px;
        }
        
        .notification-content p {
            margin: 0;
            color: #6c757d;
        }
        
        .notification-actions {
            display: flex;
            gap: 10px;
        }
        
        /* Report preview styling */
        .report-preview {
            margin-bottom: 25px;
        }
        
        .chart-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .chart-placeholder {
            text-align: center;
            color: #6c757d;
        }
        
        .chart-placeholder i {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 15px;
        }
        
        .chart-placeholder p {
            font-size: 1.2rem;
            margin: 0 0 10px;
        }
        
        .chart-placeholder span {
            font-size: 0.9rem;
        }
        
        /* Recent activities styling */
        .recent-activities {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .recent-activities h3 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 1.4rem;
        }
        
        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .activity-item {
            display: flex;
            align-items: flex-start;
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: transform 0.3s ease;
        }
        
        .activity-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            background-color: #4a6fdc;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .activity-icon i {
            font-size: 1.2rem;
        }
        
        .activity-details h4 {
            margin: 0 0 5px;
            font-size: 1.1rem;
        }
        
        .activity-details p {
            margin: 0 0 5px;
            color: #6c757d;
        }
        
        .activity-time {
            font-size: 0.8rem;
            color: #adb5bd;
        }
        
        /* Responsive styling */
        @media (max-width: 992px) {
            .dashboard-stats {
                flex-direction: column;
            }
            
            .stat-card {
                width: 100%;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 768px) {
            .tab-nav {
                flex-wrap: nowrap;
                overflow-x: auto;
            }
            
            .notification {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .notification i {
                margin-bottom: 10px;
            }
            
            .notification-content {
                margin-bottom: 15px;
            }
            
            .notification-actions {
                width: 100%;
            }
        }
    </style>

    <!-- Add JavaScript outside of style tag for tab functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabPanels = document.querySelectorAll('.tab-panel');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons and panels
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabPanels.forEach(panel => panel.classList.remove('active'));
                    
                    // Add active class to the clicked button
                    this.classList.add('active');
                    
                    // Show the corresponding panel
                    const targetPanel = document.getElementById(this.dataset.target);
                    if (targetPanel) {
                        targetPanel.classList.add('active');
                    }
                });
            });
        });
    </script>
</div>
