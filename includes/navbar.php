<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Navbar Replica</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts for a similar look -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --mega-bg: rgb(0, 70, 190); /* Dark navy background */
            --mega-purple: tomato;
            --mega-text: #ffffff;
            --mega-gray: #f4f6f8;
        }

        body {
            background-color: #f0f0f0;
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }

        /* --- Main Navbar Wrapper --- */
        .mega-header {
            background-color: var(--mega-bg);
            color: var(--mega-text);
            padding-top: 15px;
        }

        /* --- Top Row Styling --- */
        .top-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 15px;
        }

        /* Logo Styling */
        .logo-text {
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
            font-style: italic;
            font-size: 2rem;
            color: white;
            letter-spacing: -2px;
            text-transform: uppercase;
            margin-right: 2rem;
            display: flex;
            align-items: center;
        }
        .logo-text i {
            font-size: 1.5rem;
            margin-right: 5px;
        }

        /* Search Bar Styling */
        .search-container {
            flex-grow: 1;
            max-width: 700px;
            margin: 0 20px;
        }

        .search-input-group {
            background-color: white;
            border-radius: 50px;
            padding: 2px 5px;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .search-input {
            border: none;
            box-shadow: none !important;
            background: transparent;
            padding-left: 20px;
            font-size: 0.95rem;
            color: #555;
        }
        
        .search-input::placeholder {
            color: #aab2bd;
        }

        .search-btn {
            border: none;
            background: transparent;
            color: #888;
            padding-right: 15px;
            padding-left: 10px;
            border-radius: 0 50px 50px 0;
        }

        /* User & Cart Actions */
        .user-actions {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .action-item {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            position: relative;
            transition: background-color 0.3s;
        }
        
        .action-item:hover .icon-circle {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .icon-circle i {
            color: white; /* Purple tint for icons */
            font-size: 1.1rem;
        }

        /* Cart Badge */
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--mega-purple);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--mega-bg);
        }

        /* --- Bottom Row Styling --- */
        .bottom-bar {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: stretch;
            height: 50px;
        }

        /* The Purple "All Products" Button */
        .all-products-btn {
            background-color: var(--mega-purple);
            color: white;
            font-weight: 800;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            padding: 0 25px;
            text-decoration: none;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            margin-right: 20px;
        }
        
        .all-products-btn:hover {
            color: white;
            filter: brightness(1.1);
        }

        .all-products-btn i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        /* Navigation Links */
        .nav-links {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 25px;
            overflow-x: auto; /* Handle overflow on small screens */
        }

        .nav-link-item {
            color: white;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 0.85rem;
            white-space: nowrap;
            transition: color 0.2s;
        }

        .nav-link-item:hover {
            color: var(--mega-purple);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .search-container {
                order: 3;
                width: 100%;
                max-width: 100%;
                margin: 10px 0 0 0;
            }
            .top-bar {
                flex-wrap: wrap;
            }
            .nav-links {
                display: none; /* Hidden on mobile for simplicity, typically becomes a hamburger menu */
            }
            .bottom-bar {
                justify-content: space-between;
            }
            .all-products-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <header class="mega-header">
        <div class="container">
            <!-- TOP ROW: Logo, Search, User Actions -->
            <div class="top-bar">
                
                <!-- Logo (Styled text to match MEGA) -->
                <a href="index.php" class="text-decoration-none">
                    <div class="logo-text">
                        <!-- Using an icon and text to approximate the logo feel -->
                        <span>//TECHNOLOGIA</span>
                    </div>
                </a>

                <!-- Search Bar -->
                <div class="search-container">
                    <div class="search-input-group">
                        <input type="text" class="form-control search-input" placeholder="Rechercher" aria-label="Rechercher">
                        <button class="search-btn" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Right Side Actions -->
                <div class="user-actions">
                    <!-- Connexion -->
                    <a href="#" class="action-item">
                        <div class="icon-circle">
                            <i class="fas fa-user"></i>
                        </div>
                        <span>Connexion</span>
                    </a>

                    <!-- Panier -->
                    <a href="#" class="action-item">
                        <div class="icon-circle">
                            <i class="fas fa-shopping-bag"></i>
                            <span class="cart-badge">0</span>
                        </div>
                        <span>Mon Panier</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- BOTTOM ROW: Categories Button & Nav Links -->
        <div class="bottom-bar-wrapper" style="border-top: 1px solid rgba(255,255,255,0.1);">
            <div class="container">
                <div class="bottom-bar">
                    <!-- Purple 'All Products' Button -->
                    <a href="#" class="all-products-btn">
                        <i class="fas fa-bars"></i>
                        TOUS NOS PRODUITS
                    </a>

                    <!-- Navigation Menu -->
                    <ul class="nav-links">
                        <li><a href="#" class="nav-link-item">CATEGORIES</a></li>
                        <li><a href="#" class="nav-link-item">NOUVAUTES</a></li>
                        <li><a href="#" class="nav-link-item">PROMOTION</a></li>
                        <li><a href="#" class="nav-link-item">PRE BUILD</a></li>
                        <li><a href="#" class="nav-link-item">CUSTOM BUILD</a></li
                        <li><a href="#" class="nav-link-item">PC PORTABLE</a></li>
                        <li><a href="#" class="nav-link-item">QUOI DE NEUF</a></li>
                        <li><a href="#" class="nav-link-item">WHITE FRIDAY</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

</body>
</html>