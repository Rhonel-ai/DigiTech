<?php 

    include("./includes/config.php");      // ton fichier de connexion PDO

        // Vérifier si un ID est passé en paramètre
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "Aucun projet sélectionné.";
        exit;
    }

    $id = intval($_GET['id']);

    // Récupérer les données du projet et de la réalisation associée
    $sql = "SELECT 
                p.id, p.titre, p.description, p.img, p.visible,
                r.titre AS realisation_titre, 
                r.description AS realisation_desc, 
                r.img    AS realisation_img, 
                r.visible AS realisation_visible
            FROM projet p
            LEFT JOIN realisation r ON p.id = r.idprojet
            WHERE p.id = :id AND p.visible = 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$project) {
        echo "Projet non trouvé.";
        exit;
    }

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($project['titre']); ?> - DigiTech Elite</title>
        <!-- CSS FILES -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            
            <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

            <link href="css/bootstrap.min.css" rel="stylesheet">

            <link href="css/bootstrap-icons.css" rel="stylesheet">

            <link href="css/magnific-popup.css" rel="stylesheet">

            <link href="css/rhonel.css" rel="stylesheet">

        <style>
            body {
                background: #0a0f2c;
                color: #fff;
                
            }
            .project-card {
                background: rgba(255, 255, 255, 0.05);
                border-radius: 12px;
                transition: transform 0.2s;
                height: 100%; /* Pour que le div prenne toute la hauteur possible */
            }

            .project-card:hover {
                transform: scale(1.02);
                background-color: rgba(255, 255, 255, 0.08);
            }

            .img-wrapper {
                height: 100%;
                border-radius: 12px;
            }

            @media (max-width: 767.98px) {
                /* Sur mobile, forcer l’empilement et taille auto */
                .row.align-items-stretch > .col-md-6 {
                    height: auto !important;
                }

                .img-wrapper {
                    height: 250px; /* fixe une hauteur raisonnable sur mobile */
                }
            }


            .intro-animation {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: #0a0f2c;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                z-index: 9999;
                animation: fadeOut 1s ease forwards;
                animation-delay: 2.5s; /* Attente avant disparition */
            }

            .animated-title {
                font-size: 3.5rem;
                font-weight: bold;
                opacity: 0;
                animation: fadeInUp 1.2s ease forwards;
            }

            .animated-subtitle {
                font-size: 1.5rem;
                margin-top: 15px;
                opacity: 0;
                animation: fadeIn 1.5s ease 0.8s forwards;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeIn {
                to {
                    opacity: 1;
                }
            }

            @keyframes fadeOut {
                to {
                    opacity: 0;
                    visibility: hidden;
                }
            }
        </style>

    </head>

    <body>

                <!-- Animation d'accueil -->
            <section class="intro-animation" id="introAnimation">
                <div class="container text-center">
                    <h1 class="animated-title">DigiTech Elite</h1>
                    <p class="animated-subtitle">Sécuriser. Développer. Évoluer.</p>
                </div>
            </section>

            <main id="mainContent" style="display: none;">
                <nav class="navbar navbar-expand-lg bg-dark shadow-lg">
                    <div class="container">
                        <a href="#" class="navbar-brand">Waso <span class="text-danger">Strategy</span></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="index.php">
                                        <small><strong class="text-warning">01</strong></small> Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="">
                                        <small><strong class="text-warning">02</strong></small> About
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="">
                                        <small><strong class="text-warning">03</strong></small> Services
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="">
                                        <small><strong class="text-warning">04</strong></small> Projects
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link click-scroll" href="">
                                        <small><strong class="text-warning">05</strong></small> Contact
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <section class="hero section-hero section-padding" style="background-image: url(./images/projects/details.jpg); background-size: cover;"  >
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-6 col-12 text-center mx-auto" >
                                <div class="section-hero-text">
                                    <small class="small-title text-warning">Détails des projets</small>
                                    <h1 class="text-white">Plus de précision sur nos projets </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </main>

            <main>

                <div class="container">
                    <div class="row align-items-stretch">
                        <!-- Image à côté (ou en dessous sur mobile), avec même hauteur que project-card -->

                        <div style="padding: 40px;" class="col-md-6 d-flex justify-content-center">
                            <div class="img-wrapper rounded h-100" style="overflow: hidden; width: 100%;">
                                
                                <img src="images/projects/<?= htmlspecialchars(trim($project['img'])) ?>" 
                                alt=""
                                style="object-fit: cover; width: 100%; height: 100%; display: block; border-radius: 12px;" >
                                
                            </div>
                            
                            
                        </div>

                            <!-- Texte dans project-card -->

                        <div style="padding: 40px;" class="col-md-6 mb-3 mb-md-0">
                            <div class="project-card p-4 rounded h-95 d-flex flex-column justify-content-center">
                                <h2 style="color: #ffc107;"><?= htmlspecialchars($project['realisation_titre']) ?></h2>
                                <h4 style="color: #ffffff;" class="mt-2"><?= htmlspecialchars($project['realisation_desc']) ?></h4>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- JS pour animation -->

                    <script>

                        window.addEventListener('DOMContentLoaded', () => {
                            const left = document.querySelector('.fade-in-left');
                            const right = document.querySelector('.fade-in-right');
            
                            setTimeout(() => {
                                left.style.opacity = '1';
                                left.style.transform = 'translateX(0)';
                            }, 200);
            
                            setTimeout(() => {
                                right.style.opacity = '1';
                                right.style.transform = 'translateX(0)';
                            }, 400);
                        });


                        window.addEventListener('load', () => {
                                // Le hero est affiché juste après la disparition de l'animation
                                setTimeout(() => {
                                    document.getElementById("mainContent").style.display = "block";
                                }, 3000); // 2.5s d'animation + 0.5s de fadeOut
                        });

                    </script>
        
                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
                                <center>

                                    <div class="col-lg-6 col-12">
                                            <div class="site-footer-wrap d-flex align-items-center">
                                                <p class="copyright-text mb-0 me-4">Copyright © 2025 DigiTech Elite Co., Ltd.</p>
        
                                                <ul class="social-icon">
                                                    <li><a href="https://facebook.com" class="social-icon-link bi-facebook"></a></li>
        
                                                    <li><a href="https://pinterest.com" class="social-icon-link bi-pinterest"></a></li>
                        
                                                    <li><a href="https://twitter.com" class="social-icon-link bi-twitter"></a></li>
                        
                                                    <li><a href="https://www.youtube.com" class="social-icon-link bi-youtube"></a></li>
                                                </ul>
                                                
                                            </div>
                                    </div>

                                </center>
                            </div>
                        </div>
                    </footer>

                <!-- JAVASCRIPT FILES -->
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/jquery.sticky.js"></script>
                <script src="js/jquery.magnific-popup.min.js"></script>
                <script src="js/magnific-popup-options.js"></script>
                <script src="js/click-scroll.js"></script>
                <script src="js/custom.js"></script>

            </main>

    </body>

</html>
