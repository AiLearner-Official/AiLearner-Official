<?php
require_once '../config/db.php';
require_once '../config/session.php';

// Get filter parameters
$brand = $_GET['brand'] ?? '';
$min_price = $_GET['min_price'] ?? '';
$max_price = $_GET['max_price'] ?? '';
$status = $_GET['status'] ?? 'available';

// Build query
$sql = "SELECT * FROM cars WHERE 1=1";
$params = [];

if ($brand) {
    $sql .= " AND brand = ?";
    $params[] = $brand;
}

if ($min_price) {
    $sql .= " AND price >= ?";
    $params[] = $min_price;
}

if ($max_price) {
    $sql .= " AND price <= ?";
    $params[] = $max_price;
}

if ($status) {
    $sql .= " AND status = ?";
    $params[] = $status;
}

$sql .= " ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$cars = $stmt->fetchAll();

// Get unique brands for filter
$brands = $conn->query("SELECT DISTINCT brand FROM cars ORDER BY brand")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Collection | Luxury Cars</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar (same as index.php) -->
    <nav class="navbar">
        <!-- ... same navbar code ... -->
    </nav>

    <section class="cars" style="padding-top: 8rem;">
        <div class="container">
            <div class="section-title">
                <h2>Our Premium Collection</h2>
                <p>Discover luxury vehicles that redefine automotive excellence</p>
            </div>

            <!-- Filters -->
            <div class="filters" style="margin-bottom: 3rem;">
                <form method="GET" class="filter-form">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                        <select class="form-input" name="brand">
                            <option value="">All Brands</option>
                            <?php foreach ($brands as $brand_option): ?>
                                <option value="<?php echo htmlspecialchars($brand_option['brand']); ?>" 
                                    <?php echo ($brand === $brand_option['brand']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($brand_option['brand']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <input type="number" class="form-input" name="min_price" 
                               placeholder="Min Price" value="<?php echo htmlspecialchars($min_price); ?>">
                        
                        <input type="number" class="form-input" name="max_price" 
                               placeholder="Max Price" value="<?php echo htmlspecialchars($max_price); ?>">
                        
                        <select class="form-input" name="status">
                            <option value="available" <?php echo ($status === 'available') ? 'selected' : ''; ?>>Available</option>
                            <option value="sold" <?php echo ($status === 'sold') ? 'selected' : ''; ?>>Sold</option>
                        </select>
                        
                        <button type="submit" class="cta-button">
                            <i class="fas fa-filter"></i> Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Cars Grid -->
            <div class="cars-slider">
                <?php if (count($cars) > 0): ?>
                    <?php foreach ($cars as $car): ?>
                        <div class="car-card">
                            <img src="/assets/images/<?php echo htmlspecialchars($car['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($car['title']); ?>" 
                                 class="car-image">
                            <span class="car-badge" style="background: <?php echo $car['featured'] ? 'var(--gold)' : 'var(--silver)'; ?>">
                                <?php echo $car['featured'] ? 'Featured' : ucfirst($car['status']); ?>
                            </span>
                            <div class="car-content">
                                <h3 class="car-title"><?php echo htmlspecialchars($car['title']); ?></h3>
                                <p class="car-brand"><?php echo htmlspecialchars($car['brand']); ?></p>
                                <p class="car-price">$<?php echo number_format($car['price'], 2); ?></p>
                                <a href="/public/car-details.php?id=<?php echo $car['id']; ?>" 
                                   class="cta-button" style="width: 100%; text-align: center;">
                                    View Details
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 4rem; background: var(--glass-bg); border-radius: 20px;">
                        <i class="fas fa-car" style="font-size: 3rem; color: var(--gold); margin-bottom: 1rem;"></i>
                        <h3 style="color: var(--white); margin-bottom: 0.5rem;">No Cars Found</h3>
                        <p style="color: var(--silver-light);">Try adjusting your filters or check back later for new arrivals.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Footer (same as index.php) -->
    <footer class="footer">
        <!-- ... same footer code ... -->
    </footer>

    <script src="/assets/js/main.js"></script>
</body>
</html>