<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/db.php'; ?>


<?php
$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE product_id = $id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);



$product_name = $product["name"];
$product_ref = $product["name"];
$product_price = $product["price"];
$main_image_url = "assets/images/".$product["image"];


$specifications = [
    "Puissance" => "650 Watts",
    "Certification" => "80+ Bronze",
    "Type de connexion" => "Non modulaire",
    "Format alimentation PC" => "ATX",
    "LED" => "Non RGB",
    "ATX 3.0" => "Non"
];

$description_title = $product_name;
$description_content = $product["description"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product_name); ?> - Detail</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome for icons (optional but good practice) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJ8Ww9P0/L/y/5T/2F/7G3xH2qfH1Vq6jUv0A+1/4wQ/4S7F/7B9g/5Zg/7Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .thumbnail-image {
            border: 1px solid #dee2e6;
            cursor: pointer;
            transition: all 0.2s;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .thumbnail-image:hover, .thumbnail-image.active {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        .spec-list {
            list-style: none;
            padding: 0;
        }
        .spec-list li {
            padding: 5px 0;
            border-bottom: 1px dashed #e9ecef;
            display: flex;
            justify-content: space-between;
        }
        .spec-list li strong {
            font-weight: 500;
            color: #495057;
        }
        .price-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }
        .price-text {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
        }
        .quantity-input-group {
            width: 150px;
            margin: 0 auto 20px;
        }
        .nav-link.active {
            font-weight: 600;
            border-bottom: 3px solid #007bff !important;
            color: #007bff !important;
        }
        .vote-button {
            border: 1px solid #ced4da;
            padding: 2px 8px;
            border-radius: 5px;
            font-size: 0.8rem;
            margin-left: 10px;
            color: #495057;
        }
        .description-content {
            white-space: pre-wrap; /* To handle line breaks in the PHP variable */
        }
    </style>
</head>
<body>

<!-- Header/Breadcrumb (Mock) -->
<div class="container py-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-secondary">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product_name); ?></li>
        </ol>
    </nav>
</div>

<div class="container product-card mb-5">
    <div class="row">

        <!-- 1. Left Column: Image Gallery -->
        <div class="col-lg-5 d-flex flex-column flex-md-row">
            <!-- Thumbnails (left of main image) -->
            
            <div class="flex-grow-1 position-relative order-1 order-md-2 mb-3 mb-md-0">
                <div class="d-flex align-items-center justify-content-center bg-light rounded-2" style="min-height: 300px;">
                    <img id="main-product-image" 
                         src="<?php echo htmlspecialchars($main_image_url); ?>" 
                         alt="<?php echo htmlspecialchars($product_name); ?>" 
                         class="img-fluid rounded-2"
                         style="max-height: 100%; max-width: 100%; object-fit: contain;">
                </div>
                 <!-- Arrows (optional, for slider functionality if JS was fully implemented) -->
                <button class="btn btn-sm btn-light position-absolute top-50 start-0 translate-middle-y ms-2 d-none d-md-block" style="opacity: 0.8;"><i class="fas fa-chevron-left"></i></button>
                <button class="btn btn-sm btn-light position-absolute top-50 end-0 translate-middle-y me-2 d-none d-md-block" style="opacity: 0.8;"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <!-- 2. Middle Column: Details and Specs -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <h1 class="h4 fw-bold"><?php echo htmlspecialchars($product_name); ?></h1>
            <p class="text-muted small mb-3">
                Référence: <span class="fw-semibold"><?php echo htmlspecialchars($product_ref); ?></span>
            </p>

            <ul class="spec-list mt-4">
                <?php foreach ($specifications as $key => $value): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($key); ?> :</strong>
                        <span><?php echo htmlspecialchars($value); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- 3. Right Column: Price and Actions -->
        <div class="col-lg-3 mt-4 mt-lg-0">
            <div class="price-box">
                <div class="price-text mb-3">
                    <?php echo number_format($product_price, 0, ',', ' '); ?> DT
                </div>

                <!-- Quantity Selector -->
                <div class="input-group quantity-input-group mb-4">
                    <button class="btn btn-outline-secondary" type="button" id="button-minus">-</button>
                    <input type="text" class="form-control text-center" value="1" id="product-quantity" readonly>
                    <button class="btn btn-outline-secondary" type="button" id="button-plus">+</button>
                </div>

                <!-- Action Buttons -->
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-violet text-white" style="background-color: rgb(0, 70, 190);">
                        <i class="fas fa-cart-plus me-2"></i> Ajouter au panier
                    </button>
                    <button class="btn btn-lg btn-outline-violet" style="color: rgb(0, 70, 190); border-color:rgb(0, 70, 190);">
                        COMMANDE
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Separator -->
    <hr class="my-5">

    <!-- Bottom Section: Tabs -->
    <div class="row">
        <div class="col-12">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">DESCRIPTION</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specsheet-tab" data-bs-toggle="tab" data-bs-target="#specsheet" type="button" role="tab" aria-controls="specsheet" aria-selected="false">FICHE TECHNIQUE</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content pt-4" id="myTabContent">
                <!-- Description Tab Pane -->
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <h2 class="h5 fw-bold mb-3"><?php echo htmlspecialchars($description_title); ?></h2>
                    <p class="description-content text-secondary"><?php echo htmlspecialchars($description_content); ?></p>
                </div>

                <!-- Technical Sheet Tab Pane (Mock Content) -->
                <div class="tab-pane fade" id="specsheet" role="tabpanel" aria-labelledby="specsheet-tab">
                    <p class="text-muted">Le contenu de la fiche technique irait ici. Il contiendrait des tableaux détaillés sur les caractéristiques électriques, les connecteurs, les dimensions, etc.</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    // JavaScript for Quantity Counter
    const quantityInput = document.getElementById('product-quantity');
    const minusButton = document.getElementById('button-minus');
    const plusButton = document.getElementById('button-plus');

    minusButton.addEventListener('click', () => {
        let current = parseInt(quantityInput.value);
        if (current > 1) {
            quantityInput.value = current - 1;
        }
    });

    plusButton.addEventListener('click', () => {
        let current = parseInt(quantityInput.value);
        // Assuming a max stock of 10 for demonstration
        if (current < 10) {
             quantityInput.value = current + 1;
        }
    });

    // JavaScript for Main Image Switching
    function changeMainImage(newImageUrl, element) {
        document.getElementById('main-product-image').src = newImageUrl;
        
        // Remove 'active' class from all thumbnails
        document.querySelectorAll('.thumbnail-image').forEach(img => {
            img.classList.remove('active');
        });

        // Add 'active' class to the clicked thumbnail
        element.classList.add('active');
    }

    // Set the first thumbnail as active on load
    document.addEventListener('DOMContentLoaded', () => {
        const firstThumbnail = document.querySelector('.thumbnail-image');
        if (firstThumbnail) {
            firstThumbnail.classList.add('active');
        }
    });
</script>

</body>
</html>

<?php include 'includes/footer.php'; ?>
<link rel="stylesheet" href="/assets/css/styles.css">
