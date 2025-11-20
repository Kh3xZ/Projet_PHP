<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logitech G502X Hero Banner</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --logi-purple: rgb(0, 70, 190); /* Purple for active indicator */
            --logi-bg: #0d001f;
        }

        body {
            background-color: white;
            margin: 0;
            padding: 0;
        }

        /* --- Carousel Styles --- */
        .logi-carousel-container {
            background-color: var(--logi-bg);
            width: 100%;
        }

        /* Image Styling */
        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover; /* Ensures image covers area without stretching weirdly */
            display: block;
        }

        /* --- Navigation Indicators (The buttons showing which image you are in) --- */
        .carousel-indicators {
            bottom: 30px; /* Lifted slightly */
            gap: 15px; /* More space between dots */
            margin-bottom: 0;
            align-items: center; /* Center vertically */
        }

        .carousel-indicators button {
            width: 12px !important;
            height: 12px !important;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2) !important;
            border: 2px solid transparent !important; /* invisible border for sizing stability */
            opacity: 1 !important;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1); /* Smooth spring-like transition */
            padding: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
        }

        /* Hover state for inactive dots */
        .carousel-indicators button:hover {
            background-color: rgba(255, 255, 255, 0.5) !important;
            transform: scale(1.2);
        }

        /* Style for the ACTIVE button (Shows which slide you are on) */
        .carousel-indicators .active {
            width: 40px !important; /* Expands into a pill shape */
            border-radius: 10px; /* Soft corners */
            background-color: var(--logi-purple) !important; /* Purple color */
            box-shadow: 0 0 15px rgb(0, 70, 190); /* Stronger glow */
            transform: scale(1); /* Reset scale since we changed width */
        }

        /* --- Arrows --- */
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
            opacity: 0.7;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            opacity: 1;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0,0,0,0.5); /* Dark background behind arrow for visibility */
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            background-size: 50%;
        }

        /* Mobile adjustments */
        @media (max-width: 768px) {
            .carousel-item img {
                min-height: 200px; /* Ensure banner has height on mobile */
            }
        }
    </style>
</head>
<body>  

    <div id="logiHeroCarousel" class="carousel slide logi-carousel-container" data-bs-ride="carousel" style="width: 75%;height:40%;margin-left:12%;margin-top:20px;border-radius:20px;overflow:hidden;">
        
        <!-- The Indicators (Buttons that show current slide) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

        <!-- The Images -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <!-- REPLACE THIS SRC WITH YOUR FIRST BANNER IMAGE -->
                <img src="assets/images/1.jpeg" alt="Banner 1">
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item">
                <!-- REPLACE THIS SRC WITH YOUR SECOND BANNER IMAGE -->
                <img src="assets/images/2.jpeg" alt="Banner 2">
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <!-- REPLACE THIS SRC WITH YOUR THIRD BANNER IMAGE -->
                <img src="assets/images/3.jpeg" alt="Banner 3">
            </div>
            <div class="carousel-item">
                <!-- REPLACE THIS SRC WITH YOUR FIRST BANNER IMAGE -->
                <img src="assets/images/4.jpeg" alt="Banner 4">
            </div>
        </div>

        <!-- Controls (Arrows) -->
        <button class="carousel-control-prev" type="button" data-bs-target="#logiHeroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#logiHeroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php include 'includes/footer.php'; ?>
<link rel="stylesheet" href="/assets/css/styles.css">
