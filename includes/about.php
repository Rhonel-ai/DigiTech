<?php
     include("config.php");
     $stmt = $pdo->query("SELECT * FROM about LIMIT 1");
     $about = $stmt->fetch(PDO::FETCH_ASSOC); 
?>

<section class="about section-padding" id="section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="about-image-wrap h-100">
                                <img src="images/<?php echo htmlspecialchars($about['img']); ?>" class="img-fluid about-image rounded-4" alt="">

                                <div class="about-image-info">
                                    <h4 class="text-white"><?php echo htmlspecialchars($about['bloc1']); ?></h4>

                                    <p class="text-white mb-0">Merci pour la confiance placé en DigiTech Elite.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12 d-flex flex-column">
                            <div class="about-thumb bg-white shadow-lg">
                                
                                <div class="about-info">
                                    <small class="small-title">A propos <strong class="text-warning">02/05</strong></small>

                                    <h2 class="mb-3"><?php echo htmlspecialchars($about['bloc2_title']); ?></h2>

                                    <h5 class="mb-3"><?php echo htmlspecialchars($about['bloc2_subtitle']); ?></h5>

                                    <p><?php echo htmlspecialchars($about['bloc2_description']); ?></p>

                                    <p> Merci.</p>
                                </div>
                            </div>

                            <div class="row h-100">
                                <div class="col-lg-6 col-6">
                                    <div class="about-thumb d-flex flex-column justify-content-center bg-danger mb-lg-0 h-100">
                                        
                                        <div class="about-info">
                                            <h5 class="text-white mb-4"><?php echo htmlspecialchars($about['bloc3_title']); ?></h5>

                                            <h5 class="text-white mb-4"><?php echo htmlspecialchars($about['bloc3_list']); ?></h5>

                                            <a class="custom-btn btn custom-bg-primary" href="#section_3">Joignez nous</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-6">
                                    <div class="about-thumb d-flex flex-column justify-content-center bg-warning mb-lg-0 h-100">
                                        
                                        <div class="about-info">
                                            <h5 class="text-white mb-4"><?php echo htmlspecialchars($about['bloc4_title']); ?></h5>

                                            <p class="text-white mb-0"><?php echo htmlspecialchars($about['bloc4_description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>


            