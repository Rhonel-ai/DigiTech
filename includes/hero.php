
<?php
     include("config.php");
     $slides = $pdo->query("SELECT * FROM slides WHERE visible = 1")->fetchAll(PDO::FETCH_ASSOC);  
?>

<style>
    .carousel-item {
        height: 100vh;
        position: relative;
    }

    .slide-image {
        height: 95%;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .slide-overlay {
        position: absolute;
        top: 50%;
        left: 5%;
        transform: translateY(-50%);
        color: white;
        max-width: 600px;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 10px;
        animation: fadeInUp 1.5s ease-in-out;
    }

    .animated-text {
        font-size: 2.8em;
        font-weight: bold;
        white-space: pre-line;
        line-height: 1.2em;
        animation: slideInLeft 2s ease-in-out;
    }

    .animated-subtext {
        font-size: 1.3em;
        margin-bottom: 10px;
        display: block;
        animation: fadeIn 2s ease-in-out 0.5s;
    }

    @keyframes slideInLeft {
        from { opacity: 0; transform: translateX(-50px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<section>
    <div id="gdr" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">            
            <?php foreach ($slides as $index => $slide): ?>
                <?php if ($slide['visible']): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="slide-image" style="background-image: url('images/slide/<?= htmlspecialchars($slide['image']) ?>');">
                        <div class="slide-overlay">
                            <small class="animated-subtext"><?= nl2br(htmlspecialchars($slide['titre'])) ?> <strong class="text-warning"><?= sprintf('%02d', $index + 1) ?>/<?= count($slides) ?></strong></small>
                            <h1 class="animated-text">
                                <?= nl2br(htmlspecialchars($slide['description'])) ?>
                            </h1>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#gdr" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#gdr" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>
