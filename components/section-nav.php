<style>
	header{
    padding-bottom: 20px;
    padding-top: 10px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 5;
    transition: all 0.5s;
	}
  header.scrolled,
  header.not-home{
    padding-top: 20px; 
  }
	header .content{
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: nowrap;
      padding: 10px 20px;
      max-width: var(--content-long-width);
      border-radius: 12px;
      will-change: max-width, background-color;
      transition: all 0.5s ease-in-out;
      overflow: hidden;
	}
  header.scrolled .content,
  header.not-home .content{
    max-width: 800px;
    background-color: white;
    box-shadow: 0px 0px 4px 0px rgb(0 0 0 / 19%);
  }
  header .back-img{
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    object-fit: cover;
    opacity: 0;
    transition: 0.7s ease-in-out;
  }
  header.scrolled .back-img,
  header.not-home .back-img{
    opacity: 1;
  }
  header .logo{
    width: 200px;
    height: 40px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 5px;
    opacity: 0;
    transition: all 0.2s;
    z-index: 2;
  }
  header .logo h1{
    position: absolute;
    left: 0;
    top: 0;
    visibility: hidden;
  }
  header .logo a{
    width: 100%;
    height: 100%;
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    z-index: 2;
  }
  header.scrolled .logo,
  header.not-home .logo{
    opacity: 1;
  }
  header .logo img{
    width: auto;
    height: 100%;
    object-fit: contain;
    display: block;
     transition: all 0.5s;
  }

  header .options{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    gap: 30px;
    flex-wrap: nowrap;
    z-index: 2;
  }
  header .options .nav-links{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-end;
    gap: 30px;
    flex-wrap: nowrap;
    z-index: 2;
  }
  header .options .option{
    font-size: 12px;
    line-height: 1.2;
    color: var(--color-black);
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    flex: 1;
    transition: all 0.1s;
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    text-decoration: underline;
    text-underline-offset: 5px;
  }
  header.scrolled .options .option,
  header.not-home .options .option{
     text-decoration: none;
  }
  header .options .button-contact{
    margin-left: 50px;
  }
  header .options .option:hover{
    color: var(--color-accent);
    text-decoration: none;
  }
 
  /* header.scrolled .options .option{
    color: var(--color-white);
  } */
  header.scrolled .options .button-contact,
  header.not-home .options .button-contact{
    margin-left: 20px;
  }


  /* Mobile Styles */
  header .hamburger{
    display: none;
    flex-direction: column;
    justify-content: space-between;
    width: 30px;
    height: 20px;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    z-index: 10;
    margin-left: 20px;
  }
  header .hamburger span{
    width: 100%;
    height: 2px;
    background-color: var(--color-black);
    transition: all 0.3s ease-in-out;
  }
  
  /* Menu Open State (Hamburger to X) */
  header.menu-open .hamburger span:nth-child(1){
    transform: rotate(45deg) translate(5px, 5px);
  }
  header.menu-open .hamburger span:nth-child(2){
    opacity: 0;
  }
  header.menu-open .hamburger span:nth-child(3){
    transform: rotate(-45deg) translate(7px, -8px); /* Adjusted for visual balance */
  }

  @media screen and (max-width: 767px){
     header{
        padding-top: 0!important;
        padding-bottom: 0!important;
     }
     header .content{
        width: 100%;
        max-width: 100%;
        border-radius: 0;
        padding: 15px 20px;
     }

     header .logo{
      opacity: 1;
     }
     
     /* Show Hamburger */
     header .hamburger{
        display: flex;
     }
     header .options {
      gap: 10px;
     }

     /* Hide regular options except Contact Us (handled by structure) */
     header .options .nav-links {
        position: fixed;
        top: 0;
        right: -100%;
        width: 100%;
        height: 100vh;
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        transition: right 0.4s ease-in-out;
        z-index: 9;
        padding-top: 100px;
    }
     
     header.menu-open .options .nav-links{
        right: 0; /* Slide in */
     }
     
     header .options .nav-links .option{
        font-size: 24px;
        margin: 15px 0;
        flex: 0;
     }

     /* Ensure Content spans full width when menu open */
     header.menu-open .content{
        max-width: 100%;
        border-radius: 0;
     }
  }

</style>


<header class="<?= !is_front_page() ? 'not-home' : '' ?>">
	<div class="content ">
    <img class="back-img" src="<?= get_template_directory_uri() ?>/assets/pattern.png" width="100%" height="100%" alt="pattern">

	  <div class="logo">
      <a href="<?= home_url() ?>" aria-label="Mora Escapes home">
        <img src="<?= get_template_directory_uri() ?>/assets/logo-horizontal.png" width="100%" height="100%" alt="logo">
        <h1>Mora Escapes</h1>
      </a>
	  </div>	
   
   <div class="options">
     <div class="nav-links">
         <a class="option" href="#properties">Properties</a>
         <a class="option" href="#reviews">Reviews</a>
         <a class="option" href="#about-us">Invest With Us</a>
     </div>

    <a class="option button-contact" href="#contact-us">
       <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <path d="M18 18H9M18 18V9M18 18L11.5 11.5M6 6L8.5 8.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
       </svg>
       Contact Us
    </a>
    
    <button class="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
   </div>

	</div>
</header>




<script>
  document.addEventListener('DOMContentLoaded', () => {
    initNavScroll();
  });

  function initNavScroll(){
    const header = document.querySelector('header');
    if (!header) return;

    const checkScroll = () => header.classList.toggle('scrolled', window.scrollY > 400);
    
    window.addEventListener('scroll', checkScroll);
    checkScroll();

    // Mobile Menu Toggle
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    
    if(hamburger){
        hamburger.addEventListener('click', () => {
            header.classList.toggle('menu-open');
        });
    }

    // Close menu when clicking a link
    if(navLinks){
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                header.classList.remove('menu-open');
            });
        });
    }
  }

</script>