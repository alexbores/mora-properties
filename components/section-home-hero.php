




<style>
  #home-banner{
    display: flex;
    flex-direction: column;
    min-height: calc(210vh);
    background-color: var(--color-light-cloud);
  }
  #home-banner .content{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh; 
    position: sticky;
    top: 0;
    max-width: 1200px;
  }

  #home-banner .title-track{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    width: 100%;
    position: relative;
  }
  #home-banner .title-track.title-track-2{
    align-items: flex-end;
  }

  #home-banner .title{
    font-size: 100px;
    line-height: 0.7;
    color: var(--color-accent);
    font-weight: 400;
    letter-spacing: 5px;
    will-change: transform;
    transition: transform 0.5s ease-out;
  }
  #home-banner .title.title-1{
    text-align: left;
    letter-spacing: 15px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 20px;
  }
  #home-banner .title.title-1 span{
    display: none;
  }
  #home-banner .title.title-1 .logo{
    position: relative;
    width: 170px;
    height: 170px;
    object-fit: contain;
    object-position: center;
    display: block;
    margin-top: -8px;
    margin-bottom: -8px;
  }
  #home-banner .title.title-2{
    text-align: right;
    margin-top: 25px;
  }


  #home-banner .center-row{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    width: 100%;
    position: relative;
  }

  #home-banner .text{
    font-size: 15px;
    line-height: 1.5;
    color: var(--color-black);
    font-weight: 400;
    text-transform: uppercase;
    flex: 1;
  }
  #home-banner .text.second-text{
    text-align: right;
  }
  #home-banner .text strong{
    color: var(--color-accent);
  }

  #home-banner .logos-holder{
    display: flex;
    flex-direction: column;
        align-items: flex-end;
    justify-content: center;
    flex: 1;
  }
  #home-banner .logos-holder img{
    width: 100px;
    height: 50px;
    object-fit: contain;
    object-position: center;
    display: block;
    filter: grayscale(1);
    transition: filter 0.2s ease-out;
  }
  #home-banner .logos-holder a:hover img{
    filter: grayscale(0);
  }


  #home-banner .images-holder{
    width: 550px;
    aspect-ratio: 16/9;
    position: relative;
    overflow: visible;
  }
  #home-banner .wrapper {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    height: 100%;
    background-color: var(--color-light-pink);
    overflow: hidden;
    will-change: width, height;
    transition: width 0.5s ease-out, height 0.5s ease-out;
    z-index: 4;
  }
  #home-banner .images-holder img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    display: block;
    opacity: 0;
    transition: opacity 0.4s linear;
    border-radius: 3px;
  }
  #home-banner .images-holder .hero-banner-img.active {
    opacity: 1;
    z-index: 2;
  }
  #home-banner .images-holder .center-img{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 3;
    width: 140px;
    height: 140px; 
    object-fit: contain;
    object-position: center;
    display: block;
    opacity: 1;
    filter: drop-shadow(0px 0px 20px rgba(0,0,0,0.7));
  }


  @media screen and (max-width: 767px){
    #home-banner{
      min-height: calc(180vh);
    }
    #home-banner .images-holder {
    width: 100%;
    aspect-ratio: 5 / 4;
    position: relative;
    overflow: visible;
}
    #home-banner .content {
      padding-top: 120px;
      justify-content: flex-start;
    }
    #home-banner .title-track {
      display: none;
}
    #home-banner .title{
      display: none;
    }
    #home-banner .text {
     font-size: var(--font-size-subtitle);
     text-align: center;
    }
    #home-banner .text strong{
      color: var(--color-black);
      font-weight: initial;
    }
    #home-banner .center-row {
      flex-direction: column;
      gap: 30px;
    }
    #home-banner .logos-holder {
      flex-direction: row;
      gap: 20px;
    }
  }
</style>



<section id="home-banner">
  
  <div class="content">
     <div class="title-track">
       <p class="title title-1">
      <img src="<?= get_template_directory_uri() ?>/assets/flowers.png" width="100%" height="100%" alt="flowers" class="logo">

      MORA
      <span>ESCAPES</span>
     </p>
     </div>
     <div class="center-row">
       <p class="text first-text">
         Intentional <strong>Stays</strong>,
         <br> Professionally Managed
       </p>

       <div class="images-holder">
        <div class="wrapper">
         <?php 
           $banners = ['1.webp', '2.webp', '3.webp', '4.webp', '5.webp'];
           foreach($banners as $key => $banner):
         ?>
           <img class="hero-banner-img <?= $key === 0 ? 'active' : '' ?>" src="<?= get_template_directory_uri() ?>/assets/hero-banners/<?= $banner ?>" width="100%" height="100%" alt="hero-banner">
         <?php endforeach; ?>
        </div>
       </div>

       <div class="logos-holder">
         <a href="" target="_blank" aria-label="go to airbnb"><img lazy-src="<?= get_template_directory_uri() ?>/assets/airbnb-logo.webp" width="100%" height="100%" alt="airbnb-logo" class="logo"></a>
         <a href="" target="_blank" aria-label="go to vrbo"><img lazy-src="<?= get_template_directory_uri() ?>/assets/vrbo-logo.webp" width="100%" height="100%" alt="vrbo-logo" class="logo"></a>
         <a href="" target="_blank" aria-label="go to booking"><img lazy-src="<?= get_template_directory_uri() ?>/assets/booking-logo.webp" width="100%" height="100%" alt="booking-logo" class="logo"></a>

       </div>
    
     </div>

     <div class="title-track title-track-2">
       <p class="title title-2">
        ESCAPES
       </p>
     </div>
    
  </div>  

</section>





<script>
  document.addEventListener('DOMContentLoaded', () => {
    const bannerSection = document.getElementById('home-banner');
    const imagesWrapper = document.querySelector('#home-banner .wrapper');
    const banners = document.querySelectorAll('#home-banner .wrapper .hero-banner-img');
    const title1 = document.querySelector('#home-banner .title-1');
    const title2 = document.querySelector('#home-banner .title-2');
    
    if (!bannerSection || !imagesWrapper || banners.length === 0) return;

    let currentBanner = 0;
    let lastSwitchTime = 0;
    const baseInterval = 1000; // ms
    const maxAddInterval = 1000; // ms (total 3000ms at max expansion)

    const animate = (timestamp) => {
      const scrollY = window.scrollY;
      const viewHeight = window.innerHeight;
      const scrollRange = viewHeight * 0.5; // 50vh scroll (150vh height - 100vh sticky)
      
      let progress = Math.min(Math.max(scrollY / scrollRange, 0), 1);
      
      // Exponential easing (cubic ease-in)
      const easeProgress = Math.pow(progress, 3);

      if (progress > 0) {
        const startWidth = 550;
        const startHeight = 550 * (9/16);
        const endWidth = document.documentElement.clientWidth;
        const endHeight = window.innerHeight + 40;

        const currentWidth = startWidth + (endWidth - startWidth) * easeProgress;
        const currentHeight = startHeight + (endHeight - startHeight) * easeProgress;
        
        imagesWrapper.style.width = `${currentWidth}px`;
        imagesWrapper.style.height = `${currentHeight}px`;

        // 3. Title Animation (Move towards center)
        const movePercentage = 10; // Move 10% towards center
        if (title1) title1.style.transform = `translateX(${easeProgress * movePercentage}%)`;
        if (title2) title2.style.transform = `translateX(-${easeProgress * movePercentage}%)`;

      } else {
        imagesWrapper.style.width = '100%';
        imagesWrapper.style.height = '100%'; 

        if (title1) title1.style.transform = 'translateX(0)';
        if (title2) title2.style.transform = 'translateX(0)';
      }

      // 2. Image Rotation Logic
      if (!lastSwitchTime) lastSwitchTime = timestamp;
      
      const dynamicInterval = baseInterval + (maxAddInterval * easeProgress);
      const elapsed = timestamp - lastSwitchTime;

      if (elapsed >= dynamicInterval) {
        banners[currentBanner].classList.remove('active');
        currentBanner = (currentBanner + 1) % banners.length;
        banners[currentBanner].classList.add('active');
        lastSwitchTime = timestamp;
      }

      requestAnimationFrame(animate);
    };

    requestAnimationFrame(animate);
  });
</script>