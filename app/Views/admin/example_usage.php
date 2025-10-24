<?php
/**
 * Example Usage of Admin Layout System
 * This file shows how to use the new admin layout system
 */

// Example 1: Simple page with basic content
function example_simple_page() {
    $content = '
        <div class="page-header">
            <div class="page-title">
                <div class="page-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                </div>
                <span>Example Page</span>
            </div>
            <a href="/admin/example/create" class="add-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Add New Item</span>
            </a>
        </div>
        
        <div class="admin-container">
            <div class="table-header">
                <h3>Example List</h3>
                <div class="search-box">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                    <input type="text" placeholder="Search items...">
                </div>
            </div>
            
            <div class="example-grid">
                <div class="example-card">
                    <h4>Example Item 1</h4>
                    <p>This is an example item.</p>
                    <div class="card-actions">
                        <a href="/admin/example/edit/1" class="btn btn-secondary">Edit</a>
                        <a href="/admin/example/delete/1" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    ';
    
    return $content;
}

// Example 2: Page with statistics
function example_stats_page() {
    $content = '
        <div class="page-header">
            <div class="page-title">
                <div class="page-icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 20V10"></path>
                        <path d="M12 20V4"></path>
                        <path d="M6 20v-6"></path>
                    </svg>
                </div>
                <span>Statistics Page</span>
            </div>
        </div>
        
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">100</div>
                <div class="stat-label">Total Items</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20,6 9,17 4,12"></polyline>
                        </svg>
                    </div>
                </div>
                <div class="stat-value">50</div>
                <div class="stat-label">Active Items</div>
            </div>
        </div>
        
        <div class="admin-container">
            <h3>Data Table</h3>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Example Item</td>
                        <td><span class="status-badge status-active">Active</span></td>
                        <td>
                            <a href="/admin/example/edit/1" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="/admin/example/delete/1" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    ';
    
    return $content;
}

// Example 3: Using helper functions (if available)
function example_with_helpers() {
    // This would use the helper functions if they were loaded
    $content = '
        <div class="page-header">
            <h1>Example with Helpers</h1>
        </div>
        <p>This example would use helper functions like admin_page_header(), admin_stats_card(), etc.</p>
    ';
    
    return $content;
}
?>

<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Example Usage - CVI Jatim</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/admin-layout.css') ?>">
	<style>
		/* Custom styles for this page only */
		.nav-item.active {
			background: #f0fdf4;
			color: #166534;
			border-right: 3px solid #22c55e;
		}
		
		.example-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			gap: 20px;
		}
		
		.example-card {
			background: #ffffff;
			border: 1px solid #e5e7eb;
			border-radius: 8px;
			padding: 20px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
		}
		
		.card-actions {
			display: flex;
			gap: 8px;
			margin-top: 12px;
		}
		
		.btn {
			padding: 6px 12px;
			border-radius: 4px;
			text-decoration: none;
			font-size: 12px;
		}
		
		.btn-secondary {
			background: #f3f4f6;
			color: #374151;
		}
		
		.btn-danger {
			background: #ef4444;
			color: white;
		}
	</style>
</head>
<body>
	<div class="layout">
		<?php include APPPATH . 'Views/admin/components/navbar.php'; ?>
		<?php include APPPATH . 'Views/admin/components/sidebar.php'; ?>
		
		<!-- Main Content -->
		<main class="content">
			<?= example_simple_page() ?>
		</main>
	</div>
</body>
</html>

