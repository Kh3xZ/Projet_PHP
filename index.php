<?php 
session_start();
include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tecchnologia</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --logi-purple: rgb(0, 70, 190);
            --logi-bg: #0d001f;
        }

        body {
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .deals-section {
                margin-top: 40px;
                
        }

        @media (min-width: 992px) { 
    .col-lg-2-4 {
        width: 20%;
    }
}
.deal-card {
    background: rgb(0, 70, 190);
    color: white;
    padding: 18px;
    border-radius: 14px;
    min-height: 430px;
    display: flex;
    flex-direction: column;
}

.deal-header {
    font-size: 1.1rem;
    font-weight: 600;
}

.deal-header.save {
    font-size: 1.1rem;
    font-weight: 700;
}

.deal-price {
    font-size: 2.2rem;
    font-weight: 800;
    margin-top: -4px;
    margin-bottom: 12px;
}

.deal-img {
    width: 100%;
    height: 170px;
    object-fit: contain;
    margin-bottom: 14px;
}

.deal-text {
    font-size: 0.93rem;
    line-height: 1.3;
    margin-bottom: 18px;
    flex-grow: 1;
}

.deal-btn {
    background: white;
    color: black;
    border: none;
    width: 100%;
    font-weight: 600;
    padding: 10px 0;
    border-radius: 8px;
    cursor: pointer;
    
}

        .logi-carousel-container {
            background-color: var(--logi-bg);
            width: 100%;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        .carousel-indicators {
            bottom: 30px;
            gap: 15px;
            margin-bottom: 0;
            align-items: center;
        }

        .carousel-indicators button {
            width: 12px !important;
            height: 12px !important;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2) !important;
            border: 2px solid transparent !important;
            opacity: 1 !important;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            padding: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
        }

        .carousel-indicators button:hover {
            background-color: rgba(255, 255, 255, 0.5) !important;
            transform: scale(1.2);
        }

        .carousel-indicators .active {
            width: 40px !important;
            border-radius: 10px;
            background-color: var(--logi-purple) !important;
            box-shadow: 0 0 15px rgb(0, 70, 190);
            transform: scale(1);
        }

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
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            background-size: 50%;
        }

        @media (max-width: 768px) {
            .carousel-item img {
                min-height: 200px;
            }
        }
        .category-wrapper {
            position: relative;
            max-width: 90%;
            width: 100%;
            padding: 20px;
            margin: 30px auto 30px auto; 
            border-radius: 8px; 
            
        }

        .category-scroll-container {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth; 
            gap: 20px; 
            padding: 10px 5px; 
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .category-scroll-container::-webkit-scrollbar {
            display: none;
        }
        .category-item {
            flex: 0 0 auto; 
            width: 140px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease;
            text-decoration: none;
            color: inherit;
        }

        .category-item:hover {
            transform: translateY(-3px);
        }

        .category-item:hover .category-title {
            color: #0056b3;
        }
        .img-circle {
            width: 120px;
            height: 120px;
            background-color: #f1f2f4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px auto;
            overflow: hidden;
            position: relative;
        }
        .img-circle img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
            mix-blend-mode: multiply;
        }
        .icon-placeholder {
            font-size: 3rem;
            color: black;
        }
        .category-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: #1d1d1f;
            line-height: 1.2;
            margin-top: 5px;
        }
        .scroll-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 10;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.2s;
            opacity: 0.8;
        }

        .scroll-btn:hover {
            opacity: 1;
            background-color: #f8f9fa;
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .scroll-btn-left {
            left: 10px;
            display: none;
        }

        .scroll-btn-right {
            right: 10px;
        }
    </style>
</head>
<body>  
    <div id="logiHeroCarousel" class="carousel slide logi-carousel-container" data-bs-ride="carousel" style="width: 75%;height:40%;margin-left:12%;margin-top:20px;border-radius:20px;overflow:hidden;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#logiHeroCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/1.jpeg" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="assets/images/2.jpeg" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="assets/images/3.jpeg" alt="Banner 3">
            </div>
            <div class="carousel-item">
                <img src="assets/images/4.jpeg" alt="Banner 4">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#logiHeroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#logiHeroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


<div class="deals-section container-fluid mt-5">

    <div class="row g-4 justify-content-center" >
        <div class="col-md-2 col-sm-6">
            <div class="deal-card">
                <div class="deal-header">Only</div>
                <div class="deal-price">$169.99</div>
                <img src="assets/images/tvdeal.webp" class="deal-img" alt="">
                <div class="deal-text">
                    Save $160 on TCL 55" F35 Series LED 4K TV. Only $169.99 after savings.
                </div>
                <form method="get" action="product.php">
                 <input type="hidden" name="id" value="41">
                 <button class="deal-btn">Shop now</button>
                </form>

            </div>
        </div>

        <div class="col-md-2 col-sm-6">
            <div class="deal-card">
                <div class="deal-header">Only</div>
                <div class="deal-price">$29.99</div>
                <img src="assets/images/eadeal.webp" class="deal-img" alt="">
                <div class="deal-text">
                    Save up to $40 on select EA Sports games. Only $29.99 after savings.
                </div>
                <button class="deal-btn">Shop now</button>
            </div>
        </div>

        <div class="col-md-2 col-sm-6">
            <div class="deal-card">
                <div class="deal-header save">Save</div>
                <div class="deal-price">$420</div>
                <img src="assets/images/laptopdeal.webp" class="deal-img" alt="">
                <div class="deal-text">
                    Only $429.99 for HP OmniBook X Flip 16”. Save $420.
                </div>
                <button class="deal-btn">Shop now</button>
            </div>
        </div>

        <div class="col-md-2 col-sm-6">
            <div class="deal-card">
                <div class="deal-header save">Save</div>
                <div class="deal-price">$270</div>
                <img src="assets/images/iphonedeal.webp" class="deal-img" alt="">
                <div class="deal-text">
                    Only $229.99 for this Shark cordless vacuum after $270 savings.
                </div>
                <button class="deal-btn">Shop now</button>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="deal-card">
                <div class="deal-header save">Save</div>
                <div class="deal-price">$270</div>
                <img src="assets/images/sonywhdeal.webp" class="deal-img" alt="">
                <div class="deal-text">
                    Only $229.99 for this Shark cordless vacuum after $270 savings.
                </div>
                <button class="deal-btn">Shop now</button>
            </div>
        </div>

    </div>
</div>
    
    <div class="category-wrapper" style="background-color:white;width:100%;height:270PX">
    <p style="color: black;text-decoration: none;font-weight: 500;font-size: 1.1rem;">SHOP PRODUCTS BY CATEGORY</p> 
        <button class="scroll-btn scroll-btn-left" id="scrollLeftBtn">
            <i class="fas fa-chevron-left"></i>
        </button>

        <div class="category-scroll-container" id="scrollContainer" >
            <a href="products.php" class="category-item">
                <div class="img-circle">
                    <div class="position-relative">
                        <i class="fas fa-star icon-placeholder"></i>
                        <i class="fas fa-dollar-sign position-absolute top-50 start-50 translate-middle text-white" style="font-size: 1.2rem; margin-top: 2px;"></i>
                    </div>
                </div>
                <p class="category-title">Shop all</p>
            </a>
            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/ipad.jpg" alt="Apple">
                </div>
                <p class="category-title" >Apple</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/tv.jpg" alt="TVs">
                </div>
                <p class="category-title">TVs & Projectors</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/laptop.jpg" alt="Laptops">
                </div>
                <p class="category-title">Laptops & Desktops</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/tablet.jpg" alt="Tablets">
                </div>
                <p class="category-title">Tables, E-Readers & Accessories</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/desktop.jpg" alt="Gaming">
                </div>
                <p class="category-title">PC Gaming</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/games.jpg" alt="Video Games">
                </div>
                <p class="category-title">Video Games & Virtual Reality</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/headset.jpg" alt="Headphones">
                </div>
                <p class="category-title">Headphones</p>
            </a>


            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/camera.jpg" alt="Cameras">
                </div>
                <p class="category-title" >Cameras & Camcorders</p>
            </a>

            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/mouse.webp" alt="Cameras">
                </div>
                <p class="category-title" >Mice</p>
            </a>

            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/keyboard.jpg" alt="Cameras">
                </div>
                <p class="category-title" >Keyboards</p>
            </a>

            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/gpu.jpg" alt="Cameras">
                </div>
                <p class="category-title" >Composants Desktop</p>
            </a>

            <a href="#" class="category-item">
                <div class="img-circle">
                    <img src="assets/images/office.png" alt="Cameras">
                </div>
                <p class="category-title" >Logiciel</p>
            </a>

        </div>

        <button class="scroll-btn scroll-btn-right" id="scrollRightBtn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const scrollContainer = document.getElementById('scrollContainer');
            const leftBtn = document.getElementById('scrollLeftBtn');
            const rightBtn = document.getElementById('scrollRightBtn');
            const calculateScrollAmount = () => {
                return scrollContainer.clientWidth * 0.8;
            };
            
            rightBtn.addEventListener('click', () => {
                const scrollAmount = calculateScrollAmount();
                scrollContainer.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            });

            leftBtn.addEventListener('click', () => {
                const scrollAmount = calculateScrollAmount();
                scrollContainer.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            });

            const handleScrollButtons = () => {
                const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;
                if (scrollContainer.scrollLeft > 20) {
                    leftBtn.style.display = 'flex';
                } else {
                    leftBtn.style.display = 'none';
                }
                if (scrollContainer.scrollLeft >= maxScrollLeft - 10) {
                    rightBtn.style.display = 'none';
                } else {
                    rightBtn.style.display = 'flex';
                }
            };

            scrollContainer.addEventListener('scroll', handleScrollButtons);
            window.addEventListener('resize', handleScrollButtons);
            handleScrollButtons();
        });
    </script>
</body>
</html>


<?php include 'includes/footer.php'; ?>
<link rel="stylesheet" href="/assets/css/styles.css">