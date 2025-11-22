<?php 
// catalog.php

include 'includes/header.php'; 
include 'includes/navbar.php'; 
include 'includes/db.php';


// 1. Fetch products and categories efficiently
$sql = "SELECT * FROM products";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM categories ORDER BY category_name ASC";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$categories = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Calculate min/max price for the range slider
$all_prices = array_column($products, 'price');
$min_price = !empty($all_prices) ? min($all_prices) : 100;
$max_price = !empty($all_prices) ? max($all_prices) : 3000;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue Produits | Modern Shop</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --primary-color: #0d6efd; /* Blue */
            --secondary-color: #6c757d; /* Grey */
            --background-light: #f4f6f8; /* Very light grey */
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        body {
            background-color: var(--background-light);
            font-family: 'Poppins', sans-serif;
        }
        
        /* --- Filter Sidebar Styles --- */
        .sticky-sidebar {
            position: sticky;
            top: 80px; /* Adjusted for typical fixed navbar height + margin */
            height: fit-content;
        }
        .filter-card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .filter-toggle-button {
            background-color: #fff;
            border-radius: 0.75rem 0.75rem 0 0;
            border: none;
            color: var(--primary-color);
        }

        /* --- Product Card Styles --- */
        .product-link-card {
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 0.75rem;
            overflow: hidden; /* Ensure border-radius applies to image */
        }
        .product-link-card:hover {
            transform: translateY(-5px); /* Subtle lift effect */
            box-shadow: var(--card-shadow);
        }
        .product-link-card button {
            pointer-events: all; 
        }
        .price-text {
            font-size: 1.5rem; /* Slightly larger price */
            font-weight: 700;
            color: var(--primary-color);
        }
        .product-image {
            height: 250px; /* Increased height for better visual */
            object-fit: contain;
            width: 80%;
            margin-left: 10%
        }
        
        /* Ensures product list uses flex for proper spacing */
        #product-list-container.no-results {
            display: block !important;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row">
        
        <div class="col-lg-3">
            <div class="card mb-4 sticky-sidebar filter-card" style="top:0px">
                <div class="card-header p-0">
                    <button class="btn filter-toggle-button d-flex justify-content-between align-items-center p-3" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#filtersCollapse" 
                            aria-expanded="true" 
                            aria-controls="filtersCollapse"
                            id="filterToggleButton">
                        <span class="fs-5">Filtres</span> <i class="fas fa-chevron-up ms-2" id="filterIcon"></i>
                    </button>
                </div>
                <div class="collapse show" id="filtersCollapse">
                    <div class="card-body">
                        
                        <div class="mb-4" id="category-filter">
                            <h6 class="text-muted text-uppercase fw-bold mb-3">Catégorie</h6>
                            <?php foreach ($categories as $cat): ?>
                            <div class="form-check">
                                <input class="form-check-input category-checkbox" 
                                       type="checkbox" 
                                       value="<?php echo htmlspecialchars($cat["category_id"]); ?>" 
                                       id="cat-<?php echo htmlspecialchars($cat["category_id"]); ?>">
                                <label class="form-check-label" 
                                       for="cat-<?php echo htmlspecialchars($cat["category_id"]); ?>">
                                    <?php echo htmlspecialchars($cat["category_name"]); ?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        
                        <hr class="my-3">
                        
                        <div class="mb-3">
                            <h6 class="text-muted text-uppercase fw-bold mb-3">Prix (DT)</h6>
                            <label for="priceRange" class="form-label d-flex justify-content-between">
                                <span>Minimum: <?php echo $min_price; ?> DT</span> 
                                <span id="currentPriceDisplay" class="text-primary fw-semibold">Max <?php echo $max_price; ?> DT</span>
                            </label>
                            <input type="range" class="form-range" 
                                   min="<?php echo $min_price; ?>" 
                                   max="<?php echo $max_price; ?>" 
                                   step="1" 
                                   id="priceRange" 
                                   value="<?php echo $max_price; ?>">
                        </div>
                        
                        <button class="btn btn-outline-primary w-100 mt-3 fw-bold" onclick="resetFilters()">Réinitialiser les Filtres</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="product-list-container">
                
                <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                
                <?php 
                    $product_url = 'product.php?id=' . htmlspecialchars($product['product_id']);
                ?>
                
                <div class="col product-card" 
                     data-price="<?php echo htmlspecialchars($product['price']); ?>"
                     data-category="<?php echo htmlspecialchars($product['category_id']); ?>"
                     data-id="<?php echo htmlspecialchars($product['product_id']); ?>">
                    
                    <div class="card h-100 product-link-card shadow-sm" 
                          onclick="window.location='<?php echo $product_url; ?>';">
                        
                        <div class="position-relative">
                            <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" 
                                 class="product-image" 
                                 alt="<?php echo htmlspecialchars($product['name']); ?>">
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold text-truncate mb-2"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="text-muted mb-3 flex-grow-1">
                                <?php // Simulate a short description if one exists ?>
                                <small>Catégorie: <?php 
                                    $cat_name = array_filter($categories, fn($c) => $c['category_id'] == $product['category_id']);
                                    echo htmlspecialchars($cat_name[array_key_first($cat_name)]['category_name']);
                                ?></small>
                            </p>
                            
                            <p class="price-text mt-auto mb-3">
                                <?php echo number_format($product['price'], 0, ',', ' '); ?> DT
                            </p>
                            
                            <div class="d-grid">
                                <button type="button" class="btn btn-primary fw-bold" 
                                        onclick="event.stopPropagation(); addToCart(<?php echo $product['product_id']; ?>)">
                                    <i class="fas fa-shopping-bag me-2"></i> Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <p class="alert alert-info w-100 text-center">Aucun produit n'est disponible pour le moment.</p>
                <?php endif; ?>

            </div>
            
            <div id="no-results-message" class="alert alert-warning text-center mt-5" style="display:none;">
                <i class="fas fa-exclamation-circle me-2"></i> Aucun produit ne correspond à vos critères de recherche.
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script>
    // --- FILTER FUNCTIONALITY ---
    function applyFilters() {
        const selectedCategories = Array.from(document.querySelectorAll('.category-checkbox:checked')).map(cb => cb.value);
        const maxPrice = parseInt(document.getElementById('priceRange').value);
        const productCards = document.querySelectorAll('.product-card');
        const container = document.getElementById('product-list-container');
        const noResultsMessage = document.getElementById('no-results-message');
        let resultsFound = false;

        productCards.forEach(card => {
            const productPrice = parseInt(card.getAttribute('data-price'));
            const productCategory = card.getAttribute('data-category');
            let match = true;

            // Filter by Category
            if (selectedCategories.length > 0 && !selectedCategories.includes(productCategory)) {
                match = false;
            }

            // Filter by Price
            if (productPrice > maxPrice) {
                match = false;
            }

            card.style.display = match ? 'block' : 'none';
            if (match) {
                resultsFound = true;
            }
        });

        // Toggle "No Results" message
        if (resultsFound) {
            noResultsMessage.style.display = 'none';
            container.classList.remove('no-results');
        } else {
            noResultsMessage.style.display = 'block';
            container.classList.add('no-results');
        }
    }
    
    function resetFilters() {
        // Uncheck all category checkboxes
        document.querySelectorAll('.category-checkbox').forEach(cb => {
            cb.checked = false;
        });
        
        // Reset the price range slider to its max value
        const priceRange = document.getElementById('priceRange');
        const maxVal = priceRange.max;
        priceRange.value = maxVal;
        
        // Manually trigger input event to update display
        priceRange.dispatchEvent(new Event('input')); 
        
        // Apply the reset filters
        applyFilters();
    }

    // --- ADD TO CART FUNCTIONALITY ---
    function addToCart(productId) {
        // In a real application, this would use AJAX to send the product ID to a server script (e.g., 'add_to_cart.php')
        alert('Produit ID ' + productId + ' a été ajouté au panier ! (Action simulée)');
    }

    // --- UI/UX Enhancements ---
    document.addEventListener('DOMContentLoaded', function() {
        const filtersCollapse = document.getElementById('filtersCollapse');
        const filterIcon = document.getElementById('filterIcon');
        const priceRange = document.getElementById('priceRange');
        const currentPriceDisplay = document.getElementById('currentPriceDisplay');

        // Toggle the chevron icon based on collapse state
        filtersCollapse.addEventListener('show.bs.collapse', function () {
            filterIcon.classList.remove('fa-chevron-down');
            filterIcon.classList.add('fa-chevron-up');
        });

        filtersCollapse.addEventListener('hide.bs.collapse', function () {
            filterIcon.classList.remove('fa-chevron-up');
            filterIcon.classList.add('fa-chevron-down');
        });

        // Update price display AND apply filters when the range slider moves
        priceRange.addEventListener('input', function() {
            currentPriceDisplay.textContent = 'Max ' + this.value + ' DT';
            applyFilters(); 
        });
        
        // Apply filters automatically when any category checkbox changes
        document.querySelectorAll('.category-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', applyFilters);
        });
        
        // Initial setup for price display and icon
        currentPriceDisplay.textContent = 'Max ' + priceRange.value + ' DT';
        if (filtersCollapse.classList.contains('show')) {
            filterIcon.classList.add('fa-chevron-up');
        } else {
            filterIcon.classList.add('fa-chevron-down');
        }
        
        // Initialize display to ensure correct initial state
        applyFilters(); 
    });
</script>

</body>
</html>

<?php include 'includes/footer.php'; ?>