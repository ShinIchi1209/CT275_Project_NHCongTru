<style>
    .slideshow-container {
        position: relative;
        max-width: 100%;
        margin: auto;
    }

    .slideshow-container img {
        width: 100%;
        height: auto;
    }

    .slideshow-container .slide {
        display: none;
    }

    .slideshow-container .slide.active {
        display: block;
    }
</style>

<div class="slideshow-container">
    <?php
       $query = "SELECT * FROM slider WHERE active = '1' LIMIT 6 ";
       $result = mysqli_query($conn, $query);
       while ($row_slider = mysqli_fetch_assoc($result)) {
           $images[] = $row_slider['src'];
       }
    ?>
    <?php foreach ($images as $index => $image) : ?>
        <?php $activeClass = ($index === 0) ? "active" : ""; ?>
        <div class="slide <?php echo $activeClass; ?>">
            <img src="images/banner/<?php echo $image; ?>">
        </div>
    <?php endforeach; ?>
</div>

<script>
    var slides = document.querySelectorAll('.slide');
    var currentSlide = 0;

    function showSlide(n) {
        slides[currentSlide].classList.remove('active');
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add('active');
    }

    setInterval(function() {
        showSlide(currentSlide + 1);
    }, 3000);
</script>
