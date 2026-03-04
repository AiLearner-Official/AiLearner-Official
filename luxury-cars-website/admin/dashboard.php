<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireAdmin();

// Get statistics
$stats = [];

// Total cars
$stmt = $conn->query("SELECT COUNT(*) as count FROM cars");
$stats['total_cars'] = $stmt->fetch()['count'];

// Available cars
$stmt = $conn->query("SELECT COUNT(*) as count FROM cars WHERE status = 'available'");
$stats['available_cars'] = $stmt->fetch()['count'];

// Total bookings
$stmt = $conn->query("SELECT COUNT(*) as count FROM bookings");
$stats['total_bookings'] = $stmt->fetch()['count'];

// Pending bookings
$stmt = $conn->query("SELECT COUNT(*) as count FROM bookings WHERE status = 'pending'");
$stats['pending_bookings'] = $stmt->fetch()['count'];

// Recent bookings
$stmt = $conn->query("
    SELECT b.*, u.name as user_name, c.title as car_title 
    FROM bookings b 
    JOIN users u ON b.user_id = u.id 
    JOIN cars c ON b.car_id = c.id 
    ORDER BY b.created_at DESC 
    LIMIT 5
");
$recent_bookings = $stmt->fetchAll();

// Recent cars
$stmt = $conn->query("SELECT * FROM cars ORDER BY created_at DESC LIMIT 5");
$recent_cars = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Luxury Cars</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="/public/index.php" class="logo">
                <i class="fas fa-crown logo-icon"></i>
                LUXURY<span style="color: var(--white);">CARS</span>
            </a>
            
            <div class="nav-links">
                <a href="/public/index.php">View Site</a>
                <a href="/admin/dashboard.php" class="active">Dashboard</a>
                <a href="/auth/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="dashboard">
        <div class="container">
            <div class="dashboard-grid">
                <!-- Sidebar -->
                <aside class="admin-sidebar">
                    <h3>Admin Panel</h3>
                    <nav class="admin-nav">
                        <ul>
                            <li><a href="/admin/dashboard.php" class="active">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a></li>
                            <li><a href="/admin/manage-cars.php">
                                <i class="fas fa-car"></i> Manage Cars
                            </a></li>
                            <li><a href="/admin/add-car.php">
                                <i class="fas fa-plus-circle"></i> Add New Car
                            </a></li>
                            <li><a href="/admin/bookings.php">
                                <i class="fas fa-calendar-check"></i> Manage Bookings
                            </a></li>
                            <li><a href="/admin/testimonials.php">
                                <i class="fas fa-comments"></i> Testimonials
                            </a></li>
                            <li><a href="/admin/users.php">
                                <i class="fas fa-users"></i> Users
                            </a></li>
                        </ul>
                    </nav>
                </aside>

                <!-- Main Content -->
                <main class="admin-content">
                    <h2 style="color: var(--gold); margin-bottom: 2rem;">Dashboard Overview</h2>
                    
                    <!-- Stats -->
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-number"><?php echo $stats['total_cars']; ?></div>
                            <div class="stat-label">Total Cars</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number"><?php echo $stats['available_cars']; ?></div>
                            <div class="stat-label">Available Cars</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number"><?php echo $stats['total_bookings']; ?></div>
                            <div class="stat-label">Total Bookings</div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-number"><?php echo $stats['pending_bookings']; ?></div>
                            <div class="stat-label">Pending Bookings</div>
                        </div>
                    </div>

                    <!-- Recent Bookings -->
                    <h3 style="margin-top: 3rem; color: var(--white);">Recent Bookings</h3>
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Car</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_bookings as $booking): ?>
                                    <tr>
                                        <td>#<?php echo $booking['id']; ?></td>
                                        <td><?php echo htmlspecialchars($booking['user_name']); ?></td>
                                        <td><?php echo htmlspecialchars($booking['car_title']); ?></td>
                                        <td><?php echo date('M d, Y', strtotime($booking['booking_date'])); ?></td>
                                        <td>
                                            <span style="
                                                padding: 0.25rem 0.75rem;
                                                border-radius: 50px;
                                                font-size: 0.875rem;
                                                background: <?php 
                                                    echo $booking['status'] === 'approved' ? 'rgba(34, 197, 94, 0.1)' : 
                                                           ($booking['status'] === 'rejected' ? 'rgba(239, 68, 68, 0.1)' : 
                                                           'rgba(234, 179, 8, 0.1)'); 
                                                ?>;
                                                color: <?php 
                                                    echo $booking['status'] === 'approved' ? '#22c55e' : 
                                                           ($booking['status'] === 'rejected' ? '#ef4444' : 
                                                           '#eab308'); 
                                                ?>;
                                            ">
                                                <?php echo ucfirst($booking['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/admin/booking-details.php?id=<?php echo $booking['id']; ?>" 
                                               class="btn-action btn-edit">View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Recent Cars -->
                    <h3 style="margin-top: 3rem; color: var(--white);">Recent Cars</h3>
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_cars as $car): ?>
                                    <tr>
                                        <td>#<?php echo $car['id']; ?></td>
                                        <td><?php echo htmlspecialchars($car['title']); ?></td>
                                        <td><?php echo htmlspecialchars($car['brand']); ?></td>
                                        <td>$<?php echo number_format($car['price'], 2); ?></td>
                                        <td>
                                            <span style="
                                                padding: 0.25rem 0.75rem;
                                                border-radius: 50px;
                                                font-size: 0.875rem;
                                                background: <?php echo $car['status'] === 'available' ? 'rgba(34, 197, 94, 0.1)' : 'rgba(239, 68, 68, 0.1)'; ?>;
                                                color: <?php echo $car['status'] === 'available' ? '#22c55e' : '#ef4444'; ?>;
                                            ">
                                                <?php echo ucfirst($car['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/admin/edit-car.php?id=<?php echo $car['id']; ?>" 
                                               class="btn-action btn-edit">Edit</a>
                                            <a href="/admin/delete-car.php?id=<?php echo $car['id']; ?>" 
                                               class="btn-action btn-delete" 
                                               onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <script src="/assets/js/main.js"></script>
</body>
</html>