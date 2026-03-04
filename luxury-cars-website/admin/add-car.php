<?php
require_once '../config/db.php';
require_once '../config/session.php';
requireAdmin();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $brand = trim($_POST['brand']);
    $price = trim($_POST['price']);
    $description = trim($_POST['description']);
    $specifications = trim($_POST['specifications']);
    $status = $_POST['status'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    
    // Handle image upload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $new_filename = uniqid() . '.' . $ext;
            $destination = '../assets/images/' . $new_filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                $image = $new_filename;
            }
        }
    }
    
    if (empty($title) || empty($brand) || empty($price)) {
        $error = 'Please fill in all required fields.';
    } else {
        try {
            $stmt = $conn->prepare("
                INSERT INTO cars (title, brand, price, image, description, specifications, status, featured) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            $stmt->execute([
                $title, $brand, $price, $image, $description, 
                $specifications, $status, $featured
            ]);
            
            $success = 'Car added successfully!';
            
            // Clear form
            $title = $brand = $price = $description = $specifications = '';
            
        } catch (PDOException $e) {
            $error = 'Error adding car: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car | Admin Panel</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar (same as admin dashboard) -->
    <nav class="navbar">
        <!-- ... same navbar code ... -->
    </nav>

    <div class="dashboard">
        <div class="container">
            <div class="dashboard-grid">
                <!-- Sidebar (same as dashboard) -->
                <aside class="admin-sidebar">
                    <!-- ... same sidebar code ... -->
                </aside>

                <!-- Main Content -->
                <main class="admin-content">
                    <h2 style="color: var(--gold); margin-bottom: 2rem;">Add New Car</h2>
                    
                    <?php if ($error): ?>
                        <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                            <?php echo htmlspecialchars($error); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($success): ?>
                        <div style="background: rgba(34, 197, 94, 0.1); color: #22c55e; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">
                            <?php echo htmlspecialchars($success); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="form-label" for="title">Car Title *</label>
                            <input type="text" class="form-input" id="title" name="title" 
                                   value="<?php echo htmlspecialchars($title ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="brand">Brand *</label>
                            <input type="text" class="form-input" id="brand" name="brand" 
                                   value="<?php echo htmlspecialchars($brand ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="price">Price ($) *</label>
                            <input type="number" step="0.01" class="form-input" id="price" name="price" 
                                   value="<?php echo htmlspecialchars($price ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="image">Car Image</label>
                            <input type="file" class="form-input" id="image" name="image" accept="image/*">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-input form-textarea" id="description" name="description" 
                                      rows="4"><?php echo htmlspecialchars($description ?? ''); ?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="specifications">Specifications (one per line)</label>
                            <textarea class="form-input form-textarea" id="specifications" name="specifications" 
                                      rows="4"><?php echo htmlspecialchars($specifications ?? ''); ?></textarea>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                            <div class="form-group">
                                <label class="form-label" for="status">Status</label>
                                <select class="form-input" id="status" name="status">
                                    <option value="available">Available</option>
                                    <option value="sold">Sold</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                                    <input type="checkbox" id="featured" name="featured" value="1">
                                    <span>Featured Car</span>
                                </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="cta-button">
                            <i class="fas fa-plus-circle"></i> Add Car
                        </button>
                        
                        <a href="/admin/manage-cars.php" class="btn-secondary" style="margin-left: 1rem;">
                            <i class="fas fa-arrow-left"></i> Back to Cars
                        </a>
                    </form>
                </main>
            </div>
        </div>
    </div>

    <script src="/assets/js/main.js"></script>
</body>
</html>