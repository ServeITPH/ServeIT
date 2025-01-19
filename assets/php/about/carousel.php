<div id="teamCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        $total = count($teamMembers);
        $slides = ($total % 3 == 0) ? ($total / 3) : (int) ($total / 3) + 1;
        for ($i = 0; $i < $slides; $i++) {
            $active = ($i == 0) ? 'active' : '';
            echo "<button type='button' data-bs-target='#teamCarousel' data-bs-slide-to='$i' class='$active'></button>";
        }
        ?>
    </div>

    <!-- Carousel Items -->
    <div class="carousel-inner">
        <?php
        $counter = 0;
        foreach ($teamMembers as $index => $dev) {
            $nameParts = explode(' ', $dev[0]);
            $firstName = $nameParts[1];
            $surname = isset($nameParts[1]) ? $nameParts[0] : '';

            if ($counter % 3 == 0) {
                echo '<div class="carousel-item ' . ($counter == 0 ? 'active' : '') . '"><div class="row justify-content-center">';
            }
            echo "
                        <div class='col-4 col-md-3 col-sml-6'> 
                            <div class='team-member'>
                                <a href='{$dev[2]}'><img src='{$dev[1]}' class='img-fluid rounded-circle' alt='{$dev[0]}'></a>
                                <h5 class='dev-name'>
                                    <span class='surname'>$surname</span><br>
                                    <span class='first-name'>$firstName</span>
                                </h5>
                            </div>
                        </div>";

            $counter++;
            if ($counter % 3 == 0 || $index == $total - 1) {
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

<!-- Dev Names CSS -->
<style>
    .dev-name {
        font-size: 24px;
        text-align: center;
    }

    .dev-name .surname {
        font-weight: bold;
        font-size: 24px;
    }

    .dev-name .first-name {
        font-size: 24px;

    }

    @media (max-width: 768px) {
        .dev-name {
            font-size: 14px;
            text-align: center;
        }

        .dev-name .surname {
            font-size: 14px;
            font-weight: bold;
        }

        .dev-name .first-name {
            font-size: 14px;
        }
    }
</style>