
<style>
   #about-us{
    background-color: var(--color-light-cloud);
    padding-top: 80px;
    padding-bottom: 80px;
   }
   #about-us .content-title{
    align-items: center;
    position: relative;
    padding: 40px 0;
   }
   #about-us .title{
    font-size: 120px;
    text-align: center;
    position: relative;
    z-index: 2;
    color: var(--color-gray);
    font-weight: 500;
   }
   #about-us span{
     display: flex;
    align-items: center;
   }
   #about-us .title img{
    width: 0px;
    height: 225px;
    object-fit: cover;
    border-radius: 6px;
    margin: 0 0px;
    transition: all 0.5s ease-in-out;
}
   #about-us .title.visible img{
    width: 400px;
    margin: 0 20px;
   }
   #about-us .back-img{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.2;
    object-fit: contain;
    margin: auto;
   }


   #about-us .info-content{
    padding: 40px 0;
    max-width: 700px;
    align-items: center;
    justify-content: center;
    flex-direction: column;
   }
   #about-us .info-content p{
    text-align: center;
   }
   #about-us .button{
    margin-top: 40px;
   }

   @media screen and (max-width: 767px){
    #about-us {
      padding: 60px 0 60px 0;
    }
    #about-us .title {
        font-size: 34px;
    }
    #about-us .title img {
      height: 110px;
    }
    #about-us .title.visible img {
        width: 150px;
    }
   }
</style>


<section id="about-us">
    
    <div class="content content-title">
        <img lazy-src="<?php echo get_template_directory_uri(); ?>/assets/flowers-1.png" alt="invest with us pattern" width="100%" height="100%" class="back-img">
        
        <h2 class="title">
            Invest 
            <span>With
                <img lazy-src="<?php echo get_template_directory_uri(); ?>/assets/invest-banner.webp" alt="invest with us" width="100%" height="100%">
            Us</span>
        </h2>
    </div>

    <div class="content info-content">
        <p class="text-1">
            We are guided by intention, elegance, and integrity. Every decision, from property selection to guest experience is rooted in care, consistency, and respect for space. We believe thoughtful environments create better experiences, and that success comes from alignment, not excess.
        </p>

         <a class="button" href="#contact-us">
            <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 18H9M18 18V9M18 18L11.5 11.5M6 6L8.5 8.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
           Invest With Us
        </a>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const title = document.querySelector('#about-us .title');
        
        if(title){
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        title.classList.add('visible');
                    } else {
                        title.classList.remove('visible');
                    }
                });
            }, { threshold: 0.5 }); // Trigger when 50% visible

            observer.observe(title);
        }
    });
</script>