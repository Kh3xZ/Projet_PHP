<?php 
// catalog.php

include 'includes/header.php'; 
include 'includes/navbar.php'; 

// --- MOCK DATA for Product Cards on a Listing Page ---
$products = [
    [
        'id' => 101, 
        'name' => 'Gigabyte GP-P650B 650W', 
        'price' => 211, 
        'image' => 'https://placehold.co/300x200/007bff/FFFFFF?text=PSU+650W',
        'ref' => 'GP-P650B',
        'status' => 'En Stock',
        'category' => 'Alimentation' 
    ],
    [
        'id' => 102, 
        'name' => 'Intel Core i5-13400F', 
        'price' => 689, 
        'image' => 'https://placehold.co/300x200/28a745/FFFFFF?text=CPU+i5',
        'ref' => 'i5-13400F',
        'status' => 'Rupture',
        'category' => 'Processeurs'
    ],
    [
        'id' => 103, 
        'name' => 'RTX 4060 VENTUS 2X', 
        'price' => 1250, 
        'image' => 'https://placehold.co/300x200/dc3545/FFFFFF?text=GPU+4060',
        'ref' => '4060-V2X',
        'status' => 'En Stock',
        'category' => 'Cartes Graphiques'
    ],
    [
        'id' => 104, 
        'name' => 'Corsair Vengeance 16GB', 
        'price' => 180, 
        'image' => 'https://placehold.co/300x200/ffc107/000000?text=RAM+16GB',
        'ref' => 'CMH16GX',
        'status' => 'En Stock',
        'category' => 'Mémoire'
    ],
    [
        'id' => 105, 
        'name' => 'AMD Ryzen 5 7600X', 
        'price' => 750, 
        'image' => 'https://placehold.co/300x200/6f42c1/FFFFFF?text=CPU+Ryzen',
        'ref' => 'R5-7600X',
        'status' => 'En Stock',
        'category' => 'Processeurs'
    ],
];

// --- Unique Categories for Filter Display ---
$categories = array_unique(array_column($products, 'category'));
$min_price = min(array_column($products, 'price')) ?? 100;
$max_price = max(array_column($products, 'price')) ?? 3000;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Custom style for the card to allow clicking anywhere (except buttons) to redirect */
        .product-link-card {
            cursor: pointer;
            transition: box-shadow 0.2s;
        }
        .product-link-card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        /* Prevent click-through for buttons within the card */
        .product-link-card button {
            pointer-events: all; /* Important: makes the button clickable instead of the parent card */
        }
        .filter-toggle-button {
            width: 100%;
            text-align: left;
            font-weight: bold;
        }
        .price-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: #007bff; /* Use primary color for price */
        }
        
        /* 💡 NEW CSS for Sticky Sidebar */
        .sticky-sidebar {
            position: sticky;
            top: 20px; /* Adjust this value to control spacing from the top of the viewport */
            height: fit-content;
            z-index: 100; /* Ensure it stays above product cards */
        }
        
        /* Ensure the main container has room for the sticky sidebar */
        @media (min-width: 992px) {
            .col-lg-3 {
                align-self: flex-start; /* Important for sticky to work correctly within flex layout */
            }
        }
    </style>
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Catalogue de Produits</h1>
    <div class="row">
        
        <div class="col-lg-3">
            <div class="card mb-4 sticky-sidebar">
                <div class="card-header p-0">
                    <button class="btn btn-light filter-toggle-button d-flex justify-content-between align-items-center" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#filtersCollapse" 
                            aria-expanded="true" 
                            aria-controls="filtersCollapse"
                            id="filterToggleButton">
                        Filtres <i class="fas fa-chevron-up ms-2" id="filterIcon"></i>
                    </button>
                </div>
                <div class="collapse show" id="filtersCollapse">
                    <div class="card-body">
                        <div class="mb-3" id="category-filter">
                            <label class="form-label fw-semibold">Catégorie</label>
                            <?php foreach ($categories as $cat): ?>
                            <div class="form-check">
                                <input class="form-check-input category-checkbox" type="checkbox" value="<?php echo htmlspecialchars($cat); ?>" id="cat-<?php echo str_replace(' ', '', $cat); ?>">
                                <label class="form-check-label" for="cat-<?php echo str_replace(' ', '', $cat); ?>"><?php echo htmlspecialchars($cat); ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label for="priceRange" class="form-label fw-semibold">Prix (DT) : <span id="currentPriceDisplay" class="text-primary">Max <?php echo $max_price; ?></span></label>
                            <input type="range" class="form-range" min="<?php echo $min_price; ?>" max="<?php echo $max_price; ?>" step="1" id="priceRange" value="<?php echo $max_price; ?>">
                            <div class="d-flex justify-content-between">
                                <small><?php echo $min_price; ?> DT</small>
                                <small><?php echo $max_price; ?> DT</small>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 mt-2" onclick="applyFilters()">Appliquer les Filtres</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4" id="product-list-container">
                
                <?php foreach ($products as $product): ?>
                
                <?php 
                    $product_url = 'product.php?id=' . htmlspecialchars($product['id']);
                ?>
                
                <div class="col product-card" 
                     data-price="<?php echo htmlspecialchars($product['price']); ?>"
                     data-category="<?php echo htmlspecialchars($product['category']); ?>"
                     data-id="<?php echo htmlspecialchars($product['id']); ?>">
                    
                    <div class="card h-100 product-link-card" 
                         onclick="window.location='<?php echo $product_url; ?>';">
                        
                        <div class="position-relative">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['name']); ?>" style="object-fit: cover; height: 200px;">
                            <?php 
                                $badge_class = $product['status'] === 'En Stock' ? 'bg-success' : 'bg-danger';
                            ?>
                            <span class="badge position-absolute top-0 end-0 mt-2 me-2 <?php echo $badge_class; ?>">
                                <?php echo htmlspecialchars($product['status']); ?>
                            </span>
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold text-truncate"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text text-muted small mb-2">Ref: <?php echo htmlspecialchars($product['ref']); ?></p>
                            <p class="price-text mt-auto mb-3">
                                <?php echo number_format($product['price'], 0, ',', ' '); ?> DT
                            </p>
                            
                            <div class="d-grid">
                                <button type="button" class="btn btn-sm btn-primary" onclick="event.stopPropagation(); addToCart(<?php echo $product['id']; ?>)">
                                    <i class="fas fa-cart-plus me-1"></i> Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

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
        });

        // Use a fallback for Bootstrap layout if all are hidden
        const container = document.getElementById('product-list-container');
        container.style.display = Array.from(productCards).some(c => c.style.display !== 'none') ? 'flex' : 'block';
    }

    // --- ADD TO CART FUNCTIONALITY ---
    function addToCart(productId) {
        alert('Produit ID ' + productId + ' a été ajouté au panier. (Action simulée)');
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

        // Update price display when the range slider moves
        priceRange.addEventListener('input', function() {
            currentPriceDisplay.textContent = 'Max ' + this.value;
        });
        
        // Initial setup for price display and icon
        currentPriceDisplay.textContent = 'Max ' + priceRange.value;
        if (filtersCollapse.classList.contains('show')) {
            filterIcon.classList.add('fa-chevron-up');
        } else {
            filterIcon.classList.add('fa-chevron-down');
        }
        
        // Apply filters when any category checkbox changes (optional auto-apply)
        document.querySelectorAll('.category-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', applyFilters);
        });

        // Initialize display to ensure correct initial state
        applyFilters(); 
    });
</script>

</body>
</html>

<?php include 'includes/footer.php'; ?>