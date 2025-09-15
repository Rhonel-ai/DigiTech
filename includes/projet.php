<?php

    include("config.php");
    // Récupération des projets visibles
    $sql = "SELECT * FROM projet WHERE visible = 1 ORDER BY id DESC";
    $projet = $pdo->query($sql);
    
?>

<section class="projects section-padding pb-0" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                <h1 class="gdr">Projects <strong class="text-warning">04/05</strong></h1>
                <h2 class="rho">Nos projets réalisés</h2>
            </div>

            <?php

                    while ($row = $projet->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="projects-thumb projects-thumb-small">
                                    <a href="project-detail.php?id=<?php echo $row['id']; ?>">
                                        <img src="images/projects/<?php echo htmlspecialchars($row['img']); ?>" 
                                            class="img-fluid projects-image" 
                                            alt="<?php echo htmlspecialchars($row['titre']); ?>" 
                                            style="width:100%; height:250px; object-fit:cover; border-radius:12px;">
                                        
                                        <div class="projects-info">
                                            <div class="projects-title-wrap">
                                                <small class="projects-small-title">
                                                    <?php echo htmlspecialchars($row['description']); ?>
                                                </small>
                                                <h2 class="projects-title">
                                                    <?php echo htmlspecialchars($row['titre']); ?>
                                                </h2>
                                            </div>

                                            <div class="projects-btn-wrap mt-4">
                                                <span class="custom-btn btn">
                                                    <i class="bi-arrow-right"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                    }
                
            ?>
        </div>
    </div>
</section>
