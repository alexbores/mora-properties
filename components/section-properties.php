<style>
  #properties{
    background-color: var(--color-light-cloud);
    margin-top: -40vh;
    z-index: 3;
    --back-pattern-height: 300px;
  }
  #properties .content{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  

  #properties .title-content-wrapper {
    padding-bottom: 40px;
    display: flex;
    align-items: center;
    padding-top: 120px;
    max-width: 100%;
    width: 100%;
    background-color: var(--color-white);
    justify-content: center;
  }
  #properties .title-content{
    display: flex;
    align-items: center;
    flex-direction: row;
    gap: 20px;
  }
  #properties .title-content .title{
    text-align: center;
    color: var(--color-accent);
  }
  #properties .title-content .title .line-1,
  #properties .title-content .title .line-3{
    display: block;
    width: 100%;
    text-align: left;
    line-height: 1;
  }
  #properties .title-content .title .line-3{
    text-align: right;
  }
  #properties .title-content .title .line-2{
    padding: 0 80px;
  }

  



  #properties .back-img{
    z-index: 1;
    object-fit: cover;
    object-position: center;
    width: 100%;
    height: var(--back-pattern-height);
    position: relative;
    /* filter: brightness(0.9); */
  }
  #properties .properties-info-content{
    z-index: 2;
    /* max-width: var(--content-small-width); */
    margin-top: calc(60px - var(--back-pattern-height)); 
    margin-bottom: calc(60px - var(--back-pattern-height)); 
  }

  #properties .properties-info-content .main-cols{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    --gap: 40px;
    gap: var(--gap);
    width: 100%;
    position: relative;
    flex-wrap: wrap;
    z-index: 2;
    max-width: var(--content-small-width);
  }
  #properties .properties-info-content .main-cols .img-holder{
    width: calc(60% - (var(--gap) / 2));
    height: 400px;
    position: relative;
  }
  #properties .properties-info-content .main-cols .img-holder img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    opacity: 0;
    transition: opacity 1s ease-in-out;
    max-width: unset;
    border-radius: 6px;
  }
  #properties .properties-info-content .main-cols .img-holder.img-holder-2 img{
    right: unset;
    left: 0
  }
  #properties .properties-info-content .main-cols .img-holder img.active{
    opacity: 1;
  }

  #properties .properties-info-content .main-cols .img-holder .text-tag{
    background-color: var(--color-white);
    color: var(--color-accent);
    padding: 5px 20px;
    border-radius: 6px;
    position: absolute;
    top: 20px;
    left: 20px;
    font-weight: bold;
    font-family: var(--title-font-family);
    font-size: var(--font-size-text);
    z-index: 2;
  }
  #properties .properties-info-content .main-cols .img-holder.img-holder-2 .text-tag{
    left: unset;
    right: 20px;
  }

  #properties .properties-info-content .main-cols .text-holder{
    width: calc(40% - (var(--gap) / 2));
    height: 400px;
    padding: 40px;
    background-color: var(--color-white);
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: start;
    gap: 20px;
  }
  #properties .properties-info-content .main-cols .text-holder p{
    color: var(--color-gray);
  }
  #properties .properties-info-content .main-cols .text-holder p strong{
    color: var(--color-black);
  }


  #properties .buttons-holder{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    z-index: 2;
    position: relative;
  }
  #properties .buttons-holder p{
    width: 100%;
  }
  #properties .buttons-holder a{
    flex: 1;
  }
  #properties .buttons-holder img{
    width: auto;
    height: 45px;
    object-fit: contain;
    object-position: center;
    display: block;
    filter: grayscale(1);
    transition: filter 0.2s ease-out;
  }
  #properties .buttons-holder a:hover img{
    filter: grayscale(0);
  }
  


 
  
  #properties .properties-grid{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    --gap: 60px;
    gap: var(--gap);
    width: 100%;
    padding: 80px 0;
  }

  #properties .property-card{
    display: flex;
    flex-direction: row;
    background-color: transparent;
    gap: 20px;
    align-items: stretch;
    width: calc(50% - (var(--gap) / 2));
  }
  
  #properties .property-card .card-img{
    width: 45%;
    object-fit: cover;
    aspect-ratio: 4/3;
    border-radius: 4px;
  }
  
  #properties .property-card .card-content{
    width: 55%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 10px 0;
  }
  
  #properties .property-card .card-title{
    font-size: var(--font-size-subtitle-small);
    font-family: var(--title-font-family);
    margin-bottom: 10px;
    line-height: 1.2;
    color: var(--color-accent);
  }
  
  #properties .property-card .card-desc{
    font-size: var(--font-size-text);
    color: var(--color-gray);
    margin-bottom: 20px;
    line-height: 1.5;
  }
  
  #properties .property-card .card-features{
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
  }
  
  #properties .property-card .feature{
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    color: var(--color-black);
    font-weight: 500;
  }
  #properties .property-card .feature svg{
    width: 16px;
    height: 16px; 
    stroke: var(--color-black);
  }
  
  #properties .property-card .card-actions{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 5px;
    margin-top: auto;
  }
  
  #properties .property-card .price-label{
    font-size: var(--font-size-text-small);
    font-style: italic;
    color: var(--color-black);
  }
  

  @media screen and (max-width: 767px){
    #properties {
    --back-pattern-height: 400px;
    }
    #properties .title-content-wrapper {
          padding-top: 60px;
    }
    #properties .title-content .title .line-2{
      padding: 0 20px;
    }
    #properties .properties-info-content .main-cols {
      flex-direction: column;
      --gap: 20px;
    }

    #properties .properties-info-content .main-cols .img-holder {
     width: 100%;
     height: auto;
     aspect-ratio: 16 / 9;
    }
    #properties .properties-info-content .main-cols .img-holder .text-tag {
     top: 10px;
     left: 10px;
    }
    #properties .properties-info-content .main-cols .text-holder {
    width: 100%;
    height: auto;
    padding: 40px;
    }

    #properties .properties-grid {
    flex-direction: column;
    }
    #properties .property-card {
    width: 100%;
    flex-direction: column;
    }
    #properties .property-card .card-img {
    width: 100%;
    }
    #properties .property-card .card-content {
    width: 100%;
    flex-direction: column;
    align-items: center;
    }
    #properties .property-card .card-title {
      text-align: center;
      font-size: var(--font-size-subtitle);
    }
    #properties .property-card .card-desc {
    text-align: center;
}
    #properties .property-card .card-features {
     align-items: center;
     justify-content: center;
}
  };
</style>



<section id="properties">
  <div class="title-content-wrapper">
  <div class="content title-content">
    <h2 class="title">
        <span class="line-1">Stays</span>
        <span class="line-2">Thoughtfully</span>
        <span class="line-3">Held</span>
    </h2>

  </div>
  </div>
    
  <img class="back-img" lazy-src="<?= get_template_directory_uri() ?>/assets/pattern-large.png" width="100%" height="100%" alt="pattern-1">

  <div class="content properties-info-content">
      

      <div class="main-cols">

        
        <div class="img-holder">
           <p class="text-tag">
            VILLA SOLENE
           </p>

           <img class="active" lazy-src="<?= get_template_directory_uri() ?>/assets/main-property-banners/property-1.png" width="100%" height="100%" alt="property 1">

           <img lazy-src="<?= get_template_directory_uri() ?>/assets/main-property-banners/property-3.png" width="100%" height="100%" alt="property 3">
        </div>
        

        <div class="text-holder">
          <div>
          <p class="text-1"><strong>We curate short-term stays designed to feel held, calm, and quietly elevated.</strong></p>
          <p class="text-1">Thoughtfully designed spaces that feel timeless, comfortable, and effortlessly right—turning stays into cared-for experiences.</p>
          </div>

          <a class="button" href="#contact-us">
            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 18H9M18 18V9M18 18L11.5 11.5M6 6L8.5 8.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Get More Information
          </a>
        </div>
      </div>

        <div class="properties-grid">
        <?php
          $properties_list = [
             [
               'title' => 'The Arbour House',
               'desc'  => 'A secluded sanctuary nestled in greenery, blurring the lines between indoors and out.',
               'img'   => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
               'features' => ['2-4 Guests', 'King Suite']
             ],
             [
               'title' => 'Maison Serein',
               'desc'  => 'Minimalist elegance designed for the quiet mind. Pure lines, soft light, total calm.',
               'img'   => 'https://images.unsplash.com/photo-1613977257363-707ba9348227?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
               'features' => ['2 Guests', 'Private Pool']
             ],
             [
               'title' => 'The Highland Atelier',
               'desc'  => 'Where panoramic views meet artisanal details. A creative retreat above the noise.',
               'img'   => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
               'features' => ['4 Guests', 'Mountain View']
             ],
             [
               'title' => 'Cove Residence',
               'desc'  => 'Steps from the ocean, where the sound of waves sets the rhythm of your day.',
               'img'   => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
               'features' => ['6 Guests', 'Direct Beach Access']
             ]
          ];
          
          foreach($properties_list as $prop):
        ?>
          <div class="property-card">
             <img src="<?= $prop['img'] ?>" alt="<?= $prop['title'] ?>" class="card-img">
             <div class="card-content">
                <div>
                  <h3 class="card-title"><?= $prop['title'] ?></h3>
                  <p class="card-desc"><?= $prop['desc'] ?></p>
                  
                  <div class="card-features">
                     <?php foreach($prop['features'] as $feat): ?>
                       <div class="feature">
                         <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                         <?= $feat ?>
                       </div>
                     <?php endforeach; ?>
                  </div>
                </div>

                <div class="card-actions">
                   <a href="#" class="button">Contact for pricing</a>
                </div>
             </div>
          </div>
        <?php endforeach; ?>
     </div>

     <div class="main-cols">
        <div class="text-holder">
          <div>
          <p class="text-1"><strong>Our mission is to offer intentional stays through professional, detail-driven management.</strong></p>
          <p class="text-1">Touchless convenience meets thoughtful personal care—protected properties, honored guests, elevated short-term living.</p>
          </div>

          <div class="buttons-holder">
            <p><strong>Book your stay:</strong></p>

            <a href="" class="button button-transparent" aria-label="go to airbnb"><img lazy-src="<?= get_template_directory_uri() ?>/assets/airbnb-logo.webp" width="100%" height="100%" alt="airbnb-logo" class="logo"></a>
            <a href="" class="button button-transparent" aria-label="go to vrbo"><img lazy-src="<?= get_template_directory_uri() ?>/assets/vrbo-logo.webp" width="100%" height="100%" alt="vrbo-logo" class="logo"></a>
            <a href="" class="button button-transparent" aria-label="go to booking"><img lazy-src="<?= get_template_directory_uri() ?>/assets/booking-logo.webp" width="100%" height="100%" alt="booking-logo" class="logo"></a>
          </div>
        </div>
        
        <div class="img-holder img-holder-2">
          <p class="text-tag">
            VILLA SOLENE
           </p>

          <img class="active" lazy-src="<?= get_template_directory_uri() ?>/assets/main-property-banners/property-2.png" width="100%" height="100%" alt="property 2">

          <img lazy-src="<?= get_template_directory_uri() ?>/assets/main-property-banners/property-4.png" width="100%" height="100%" alt="property 4">
        </div>
      </div>
    </div>
  </div>

  <img class="back-img back-img-2" lazy-src="<?= get_template_directory_uri() ?>/assets/pattern-large.png" width="100%" height="100%" alt="pattern-1">
</section>


<script>
  document.addEventListener('DOMContentLoaded', () => {
    const holders = document.querySelectorAll('#properties .properties-info-content .main-cols .img-holder');
    
    if (holders.length === 0) return;

    holders.forEach((holder, index) => {
      const images = holder.querySelectorAll('img');
      if (images.length < 2) return;

      let currentImage = 0;
      // Stagger start slightly based on index
      let lastSwitchTime = performance.now() + (index * 500); 
      const interval = 1500; // 3 seconds per image

      const animate = (timestamp) => {
        if (timestamp - lastSwitchTime >= interval) {
          images[currentImage].classList.remove('active');
          currentImage = (currentImage + 1) % images.length;
          images[currentImage].classList.add('active');
          lastSwitchTime = timestamp;
        }
        requestAnimationFrame(animate);
      };
      
      requestAnimationFrame(animate);
    });
  });
</script>