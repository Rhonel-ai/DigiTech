<!-- Animation d'accueil -->
<section class="intro-animation" id="introAnimation">
    <div class="container text-center">
        <h1 class="animated-title">DigiTech Elite</h1>
        <p class="animated-subtitle">Sécuriser. Développer. Évoluer.</p>
    </div>
</section>

<!-- Hero principal -->
<main id="mainContent" style="display: none;">
    <nav class="navbar navbar-expand-lg bg-dark shadow-lg">
        <div class="container">
            <a href="index.php" class="navbar-brand">DigiTech <span class="text-danger">Elite</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">
                            <small><strong class="text-warning">01</strong></small> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">
                            <small><strong class="text-warning">02</strong></small> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_3">
                            <small><strong class="text-warning">03</strong></small> Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">
                            <small><strong class="text-warning">04</strong></small> Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">
                            <small><strong class="text-warning">05</strong></small> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</main>

<!-- CSS -->
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #0a0f2c;
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

<!-- JS -->
<script>
    window.addEventListener('load', () => {
        // Le hero est affiché juste après la disparition de l'animation
        setTimeout(() => {
            document.getElementById("mainContent").style.display = "block";
        }, 3000); // 2.5s d'animation + 0.5s de fadeOut
    });
</script>
