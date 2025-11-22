<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Footer (CSS & Bootstrap)</title>
    <!-- Load Bootstrap 5 CSS for grid system and utilities -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load Font Awesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Custom Colors */
        :root {
            --footer-bg-main: rgb(0, 70, 190); /* Dark Slate/Navy Blue from image */
            --footer-bg-bottom: rgb(0, 70, 190); /* Slightly darker shade for copyright bar */
            --text-color-light: #C0C0C0; /* Light gray for link text */
            --text-color-heading: #FFFFFF; /* White for headers */
            --logo-color: #FFFFFF; /* White for the logo */
        }

        /* --- Global Footer Styles --- */
        .mega-footer {
            background-color: var(--footer-bg-main);
            color: var(--text-color-light);
            width: 100%;
            padding-top: 3rem; /* py-12 equivalent */
            padding-bottom: 3rem;
            font-family: 'Inter', sans-serif;
        }

        /* Responsive padding adjustment */
        @media (min-width: 768px) {
            .mega-footer {
                padding-top: 4rem; /* md:py-16 equivalent */
                padding-bottom: 4rem;
            }
        }

        /* Heading Styles */
        .footer-heading {
            color: var(--text-color-heading);
            font-size: 1.125rem; /* text-lg */
            font-weight: bold;
            margin-bottom: 1rem; /* mb-4 */
            text-transform: uppercase;
        }

        /* Link and Text Styles */
        .footer-list, .footer-text {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 0.875rem; /* text-sm */
        }
        
        .footer-list li {
            margin-bottom: 0.75rem; /* space-y-3 equivalent */
        }

        .footer-list a, .footer-text a {
            color: var(--text-color-light);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-list a:hover, .footer-text a:hover {
            color: var(--text-color-heading);
        }
        
        /* Social Icons */
        .social-icons a {
            font-size: 1.25rem; /* text-lg */
            margin-right: 1rem; /* space-x-4 equivalent */
        }

        /* Description Column Styling */
        .footer-description {
            max-width: 300px; /* max-w-sm */
            line-height: 1.5; /* leading-relaxed */
            margin-bottom: 1.5rem; /* mb-6 */
            font-size: 0.875rem; /* text-sm */
        }

        /* Contact Details Styling */
        .contact-detail {
            display: flex;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }
        .contact-detail i {
            margin-top: 0.2rem;
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        /* --- Logo Styling --- */
        .mega-logo {
            color: var(--logo-color);
            font-size: 2.25rem; /* text-4xl */
            font-weight: 900; /* Extra bold */
            line-height: 1;
            letter-spacing: -0.05em;
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem; /* mb-6 */
        }

        /* Mimic the unique line through the 'g' in the logo */
        .mega-logo::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 5px;
            right: 5px;
            height: 2px;
            background: currentColor;
            opacity: 0.8;
            transform: translateY(-50%);
            z-index: 0;
        }

        /* --- Copyright Bar --- */
        .footer-bottom {
            background-color: var(--footer-bg-bottom);
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-top: 1px solid rgba(100, 100, 100, 0.5); /* border-gray-700/50 */
            color: var(--text-color-light);
            font-size: 0.75rem; /* text-xs */
        }

        /* Center on mobile, left align on desktop */
        .footer-bottom p {
            text-align: center;
            margin-bottom: 0; /* Remove default paragraph margin */
        }
        @media (min-width: 768px) {
            .footer-bottom p {
                text-align: left;
            }
        }
        
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- START OF FOOTER -->
    <footer class="mega-footer mt-auto">
        
        <!-- Main Footer Section -->
        <div class="container">
            <div class="row g-5 g-md-4">
                
                <!-- Column 1: Logo, Description & Socials (col-12, col-md-3) -->
                <div class="col-12 col-md-4">
                    <a href="#" class="text-decoration-none">
                    <div class="logo-text">
                        <!-- Using an icon and text to approximate the logo feel -->
                        <span>//TECHNOLOGIA</span>
                    </div>
                </a>

                    <p class="footer-description">
                        Explorez l'essentiel de la technologie avec notre sélection exclusive de produits. Simplifiez votre vie numérique en découvrant notre gamme innovante, conçue pour offrir des performances optimales en un minimum de lignes. Trouvez la solution idéale pour vos besoins technologiques, sans compromis.
                    </p>

                    <!-- Social Media Icons -->
                    <div class="social-icons">
                        <a href="#" class="text-light" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-light" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-light" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-light" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: CATEGORY Links (col-12, col-md-2) -->
                <div class="col-6 col-md-2">
                    <h4 class="footer-heading">Category</h4>
                    <ul class="footer-list">
                        <li><a href="#">Pc gamer</a></li>
                        <li><a href="#">Pc portable</a></li>
                        <li><a href="#">Composants</a></li>
                        <li><a href="#">Accessoires Informatique</a></li>
                        <li><a href="#">Nos categories</a></li>
                    </ul>
                </div>

                <!-- Column 3: Mega Links (col-12, col-md-2) -->
                <div class="col-6 col-md-2">
                    <h4 class="footer-heading">TECHNOLOGIA</h4>
                    <ul class="footer-list">
                        <li><a href="#">Qui sommes nous</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Nos vedettes</a></li>
                        <li><a href="#">Conditions</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>

                <!-- Column 4: COORDONNÉES (Contact) (col-12, col-md-4) -->
                <div class="col-12 col-md-4">
                    <h4 class="footer-heading">Coordonnées</h4>
                    <div class="footer-text">
                        <p class="contact-detail">
                            <i class="fas fa-envelope"></i>
                            <span>Khalil.Kh3xZ@gmail.com</span>
                        </p>
                        <p class="contact-detail">
                            <i class="fas fa-envelope"></i>
                            <span>aziztrabelssi37@gmail.com </span>
                        </p>
                        <p class="contact-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Higher Institute of Technological Studies of Rades</span>
                        </p>
                        <p class="contact-detail">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Ezzahra , Ben Arous</span>
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom Copyright Bar -->
        <div class="footer-bottom mt-5">
            <div class="container">
                <p>
                    &copy; Copyright 2025 <span class="text-white fw-bold">TECHNOLOGIA</span> All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <!-- END OF FOOTER -->
    
    <!-- Bootstrap JS is not strictly needed for the footer layout but often included -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>