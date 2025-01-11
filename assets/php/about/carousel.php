<!-- Carousel Team Members -->

<div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $total = count($teamMembers);
        $slides = ($total % 3 === 0) ? ($total / 3) : (int) ($total / 3) + 1;
        for ($i = 0; $i < $slides; $i++) {
            $active = ($i === 0) ? 'active' : '';
            echo "<button type='button' data-bs-target='#teamCarousel' data-bs-slide-to='$i' class='$active'></button>";
        }
        ?>
    </div>

    <!-- Carousel Items -->
    <div class="carousel-inner">
        <?php
        $counter = 0;
        foreach ($teamMembers as $index => $developer) {
            if ($counter % 3 === 0) {
                echo '<div class="carousel-item ' . ($counter === 0 ? 'active' : '') . '"><div class="row justify-content-center">';
            }
            echo "
                        <div class='col-4 col-md-3 col-sml-6'> 
                            <div class='team-member'>
                                <a href='{$developer[2]}'><img src='{$developer[1]}' class='img-fluid rounded-circle' alt='{$developer[0]}'></a>
                                <h5>{$developer[0]}</h5>
                            </div>
                        </div>";

            $counter++;
            if ($counter % 3 === 0 || $index === $total - 1) {
                echo '</div></div>';
            }
        }
        ?>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
        <img src="assets/images/about/prev.png" alt="Previous">
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
        <img src="assets/images/about/next.png" alt="Next">
    </button>
</div>
</div>
</div>