<?php
     include("config.php");
     $stmt = $pdo->query("SELECT* FROM services");
     $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section style="background-color: #0a0f2c;" class="services section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                            <h1 class="gdr">Services <strong class="text-warning">03/05</strong></h1>

                            <h2 class="rho">Comment pourrions nous vous aidez ?</h2>

                        </div>

                        <div class="col-lg-6 col-12">
                            <nav>
                                <div class="nav nav-tabs flex-column align-items-baseline" id="nav-tab" role="tablist">
                                    <?php
                                    $i = 0;
                                    foreach ($services as $service):
                                        // Générer un ID unique pour chaque onglet
                                        $tabId = 'nav-tab-' . $i;
                                        $targetId = 'nav-content-' . $i;
                                        $isActive = ($i === 0) ? 'active' : '';
                                    ?>
                                        <button 
                                            class="nav-link <?= $isActive ?>" 
                                            id="<?= $tabId ?>" 
                                            data-bs-toggle="tab" 
                                            data-bs-target="#<?= $targetId ?>" 
                                            type="button" 
                                            role="tab" 
                                            aria-controls="<?= $targetId ?>" 
                                            aria-selected="<?= $i === 0 ? 'true' : 'false' ?>">
                                            
                                            <h3 class="rho"><?= htmlspecialchars($service['titre']) ?></h3>
                                            <small class="gdr"><?= htmlspecialchars($service['description']) ?></small>
                                        </button>
                                    <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </div>
                            </nav>
                        </div>


                        <div class="col-lg-6 col-12">

                            <div class="tab-content" id="nav-tabContent">
                                <?php
                                    $i = 0;
                                    foreach ($services as $service):
                                        $contentId = 'nav-content-' . $i;
                                        $isActive = ($i === 0) ? 'show active' : '';

                                        // $liste_services = explode(';', $service['ser']);
                                    ?>
                                        <div class="tab-pane fade <?= $isActive ?>" id="<?= $contentId ?>" role="tabpanel">
                                            <!-- Image -->
                                            <img src="images/services/<?= htmlspecialchars($service['img']) ?>" class="img-fluid" alt="Service image">

                                            <!-- Titre -->
                                            <h5 class="rho" class="mt-4 mb-2"><?= (htmlspecialchars($service['titre'])) ?></h5>

                                            <!-- Resume -->
                                            <p class="gdr" ><?= (htmlspecialchars($service['resume'])) ?></p>

                                            <!-- Services -->
                                            <p class="rho" ><?= (htmlspecialchars($service['service'])) ?></p>

                                            
                                        </div>
                                    <?php
                                        $i++;
                                    endforeach;
                                ?>
                            </div>

                        </div>


                    </div>
                </div>
            </section>