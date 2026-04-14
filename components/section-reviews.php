<style>
  #reviews {
    padding: 140px 0;
    max-width: 100%;
    overflow: hidden; 
    background-color: var(--color-white);
  }
  #reviews .content {
    align-items: center;
  }
  #reviews .title {
    margin-bottom: 60px;
    text-align: center;
    color: var(--color-gray); 
  }
  #reviews .title span.gray{
     color: var(--color-gray-dark); 
  }
  #reviews .title span.accent{
     color: var(--color-accent); 
  }
  
  #reviews .swiper {
    width: 100%;
  }
  
  #reviews .swiper-slide {
    background-color: var(--color-light-cloud);
    padding: 20px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    height: auto;
    box-sizing: border-box;
    justify-content: center;
    border-radius: 6px;
    min-height: 180px;
  }
  #reviews .swiper-slide svg{
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 1;
    width: 20px;
    height: 20px;
  }
  #reviews .swiper-slide svg:last-of-type{
    top: unset;
    left: unset;
    bottom: 20px;
    right: 20px;
    transform: rotate(180deg);
  }
  #reviews .swiper-slide svg{
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 1;
    width: 20px;
    height: 20px;
  }
  #reviews .swiper-slide svg path{
    fill: var(--color-accent);
  }
  
  #reviews .user-review {
    font-size: 15px;
    line-height: 1.6;
    color: var(--color-gray-dark);
    max-width: 90%;
    position: relative;
    z-index: 2;
  }

  /* Linear transition for continuous effect */
  #reviews .swiper-wrapper {
    transition-timing-function: linear;
  }

  @media screen and (max-width: 767px){
    #reviews {
      padding: 80px 0 120px 0;
    }
  }
</style>

<section id="reviews">
  <div class="content">
    <h2 class="title">
        Crafted with <span class="gray">Intention.</span><br>
        Known by <span class="accent">Dedication</span>
    </h2>
  </div>

    <div class="swiper">
      <div class="swiper-wrapper">
        <?php
          $original_reviews = [
            [
              'text' => 'Staying here felt like a true escape. The property was immaculate, the design stunning, and every detail thoughtfully curated.',
            ],
            [
              'text' => 'Absolutely loved the vibe. It was peaceful, luxurious, and felt more like a personal retreat than just a rental.',
            ],
            [
              'text' => 'The perfect balance of comfort and style. We instantly felt at home, yet completely transported to a calmer state of mind.',
            ],
            [
              'text' => 'Everything was seamless from check-in to check-out. The space was beautiful, quiet, and exactly what we needed to recharge.', 
            ],
            [
               'text' => 'The attention to detail is unmatched. From the linens to the lighting, everything was designed for relaxation.',
            ]
          ];

          // Double the reviews to ensure smooth looping
          $reviews = array_merge($original_reviews, $original_reviews);
          
          foreach($reviews as $review):
        ?>
          <div class="swiper-slide">
            <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M9.563 8.469l-0.813-1.25c-5.625 3.781-8.75 8.375-8.75 12.156 0 3.656 2.688 5.375 4.969 5.375 2.875 0 4.906-2.438 4.906-5 0-2.156-1.375-4-3.219-4.688-0.531-0.188-1.031-0.344-1.031-1.25 0-1.156 0.844-2.875 3.938-5.344zM21.969 8.469l-0.813-1.25c-5.563 3.781-8.75 8.375-8.75 12.156 0 3.656 2.75 5.375 5.031 5.375 2.906 0 4.969-2.438 4.969-5 0-2.156-1.406-4-3.313-4.688-0.531-0.188-1-0.344-1-1.25 0-1.156 0.875-2.875 3.875-5.344z"></path>
</svg>
             <p class="user-review"><?= $review['text'] ?></p>
             <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M9.563 8.469l-0.813-1.25c-5.625 3.781-8.75 8.375-8.75 12.156 0 3.656 2.688 5.375 4.969 5.375 2.875 0 4.906-2.438 4.906-5 0-2.156-1.375-4-3.219-4.688-0.531-0.188-1.031-0.344-1.031-1.25 0-1.156 0.844-2.875 3.938-5.344zM21.969 8.469l-0.813-1.25c-5.563 3.781-8.75 8.375-8.75 12.156 0 3.656 2.75 5.375 5.031 5.375 2.906 0 4.969-2.438 4.969-5 0-2.156-1.406-4-3.313-4.688-0.531-0.188-1-0.344-1-1.25 0-1.156 0.875-2.875 3.875-5.344z"></path>
</svg>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Second Slider (Reverse) -->
    <div class="swiper swiper-reverse" style="margin-top: 20px;">
      <div class="swiper-wrapper">
        <?php
          $original_reviews_2 = [
            [ 'text' => 'A seamless experience from start to finish. The team was responsive, and the property was beyond expectation.' ],
            [ 'text' => 'Truly a home away from home. The design was inspiring, and the comfort level was exactly what we needed.' ],
            [ 'text' => 'Highly recommend for anyone looking for a stylish, stress-free stay. Every detail was perfect.' ],
            [ 'text' => 'The best rental experience we’ve had. Professional management and a beautiful, clean space.' ],
            [ 'text' => 'Quiet, refined, and effortlessly chic. We didn’t want to leave and will definitely book again.' ]
          ];

          $reviews_2 = array_merge($original_reviews_2, $original_reviews_2);
          
          foreach($reviews_2 as $review):
        ?>
          <div class="swiper-slide">
             <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M9.563 8.469l-0.813-1.25c-5.625 3.781-8.75 8.375-8.75 12.156 0 3.656 2.688 5.375 4.969 5.375 2.875 0 4.906-2.438 4.906-5 0-2.156-1.375-4-3.219-4.688-0.531-0.188-1.031-0.344-1.031-1.25 0-1.156 0.844-2.875 3.938-5.344zM21.969 8.469l-0.813-1.25c-5.563 3.781-8.75 8.375-8.75 12.156 0 3.656 2.75 5.375 5.031 5.375 2.906 0 4.969-2.438 4.969-5 0-2.156-1.406-4-3.313-4.688-0.531-0.188-1-0.344-1-1.25 0-1.156 0.875-2.875 3.875-5.344z"></path>
</svg>
             <p class="user-review"><?= $review['text'] ?></p>
             <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
<path d="M9.563 8.469l-0.813-1.25c-5.625 3.781-8.75 8.375-8.75 12.156 0 3.656 2.688 5.375 4.969 5.375 2.875 0 4.906-2.438 4.906-5 0-2.156-1.375-4-3.219-4.688-0.531-0.188-1.031-0.344-1.031-1.25 0-1.156 0.844-2.875 3.938-5.344zM21.969 8.469l-0.813-1.25c-5.563 3.781-8.75 8.375-8.75 12.156 0 3.656 2.75 5.375 5.031 5.375 2.906 0 4.969-2.438 4.969-5 0-2.156-1.406-4-3.313-4.688-0.531-0.188-1-0.344-1-1.25 0-1.156 0.875-2.875 3.875-5.344z"></path>
</svg>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
     // First Slider (Normal)
     new Swiper('#reviews .swiper:not(.swiper-reverse)', {
       slidesPerView: 1,
       spaceBetween: 20,
       loop: true,
       speed: 5000, 
       allowTouchMove: false, 
       autoplay: {
         delay: 0,
         disableOnInteraction: false,
         pauseOnMouseEnter: true,
       },
       breakpoints: {
         640: {
           slidesPerView: 2,
           spaceBetween: 20,
         },
         1024: {
           slidesPerView: 4,
           spaceBetween: 30,
         },
       },
     });

     // Second Slider (Reverse)
     new Swiper('#reviews .swiper-reverse', {
       slidesPerView: 1,
       spaceBetween: 20,
       loop: true,
       speed: 5000, 
       allowTouchMove: false, 
       autoplay: {
         delay: 0,
         disableOnInteraction: false,
         pauseOnMouseEnter: true,
         reverseDirection: true,
       },
       breakpoints: {
         640: {
           slidesPerView: 2,
           spaceBetween: 20,
         },
         1024: {
           slidesPerView: 4,
           spaceBetween: 30,
         },
       },
     });
  });
</script>