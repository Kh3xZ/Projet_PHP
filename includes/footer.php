<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <style>
        /* Custom Colors */
        :root {
            --footer-bg-main: rgb(0, 70, 190);
            --footer-bg-bottom: rgb(0, 70, 190);
            --text-color-light: #C0C0C0;
            --text-color-heading: #FFFFFF;
            --logo-color: #FFFFFF;
        }

        .mega-footer {
            background-color: var(--footer-bg-main);
            color: var(--text-color-light);
            width: 100%;
            padding-top: 3rem;
            padding-bottom: 3rem;
            font-family: 'Inter', sans-serif;
        }


        @media (min-width: 768px) {
            .mega-footer {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }
        }

        .footer-heading {
            color: var(--text-color-heading);
            font-size: 1.125rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .footer-list, .footer-text {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 0.875rem;
        }
        
        .footer-list li {
            margin-bottom: 0.75rem;
        }

        .footer-list a, .footer-text a {
            color: var(--text-color-light);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-list a:hover, .footer-text a:hover {
            color: var(--text-color-heading);
        }
        

        .social-icons a {
            font-size: 1.25rem;
            margin-right: 1rem;
        }


        .footer-description {
            max-width: 300px;
            line-height: 1.5;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

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

        .mega-logo {
            color: var(--logo-color);
            font-size: 2.25rem;
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.05em;
            position: relative;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
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
        .footer-bottom {
            background-color: var(--footer-bg-bottom);
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-top: 1px solid rgba(100, 100, 100, 0.5);
            color: var(--text-color-light);
            font-size: 0.75rem;
        }
        .footer-bottom p {
            text-align: center;
            margin-bottom: 0;
        }
        @media (min-width: 768px) {
            .footer-bottom p {
                text-align: left;
            }
        }
        
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <footer class="mega-footer mt-auto">
        <div class="container">
            <div class="row g-5 g-md-4">
                <div class="col-12 col-md-4">
                    <a href="#" class="text-decoration-none">
                    <div class="logo-text">
                        <span>//TECHNOLOGIA</span>
                    </div>
                </a>

                    <p class="footer-description">
                        Explorez l'essentiel de la technologie avec notre sélection exclusive de produits. Simplifiez votre vie numérique en découvrant notre gamme innovante, conçue pour offrir des performances optimales en un minimum de lignes. Trouvez la solution idéale pour vos besoins technologiques, sans compromis.
                    </p>
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
        <div class="footer-bottom mt-5">
            <div class="container">
                <p>
                    &copy; Copyright 2025 <span class="text-white fw-bold">TECHNOLOGIA</span> All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>