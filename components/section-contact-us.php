
<style>
    #contact-us{
        background-color: var(--color-light-cloud);
        padding: 20px 0;
        position: relative;
        color: white;
    }
    #contact-us .back-img{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }
    #contact-us .overlay{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.6);
        z-index: 2;
    }
    #contact-us .content{
        position: relative;
        z-index: 3;
        max-width: var(--content-long-width);
        padding: 40px;
        flex-wrap: wrap;
        flex-direction: row;
        align-items: stretch;
        border-radius: 6px;
        overflow: hidden;
    }
    
    /* Left Column */
    #contact-us .contact-info{
        flex: 1;
        width: calc(100% - 300px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
        position: relative;
        z-index: 4;
    }
    #contact-us .contact-info h2{
        font-size: 56px;
        line-height: 1.1;
        margin-bottom: 20px;
        font-family: var(--title-font-family);
        color: var(--color-white);
    }
    #contact-us .contact-info div > p{
        font-size: var(--font-size-text);
        margin-bottom: 60px;
        opacity: 0.9;
        max-width: 500px;
        color: var(--color-white);
    }
    
    #contact-us .info-grid{
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }
    #contact-us .info-item{
        width: calc(50% - 20px);
    }
    #contact-us .info-item.info-full{
        width: 100%;
    }
    #contact-us .info-item h3{
        font-size: var(--font-size-subtitle-small);
        margin-bottom: 15px;
        font-weight: 800;
        color: var(--color-white);
    }
    #contact-us .info-item p,
    #contact-us .info-item a{
        font-size: 15px;
        line-height: 1.6;
        text-decoration: underline;
        display: block;
        color: var(--color-white);
    }
    #contact-us .info-item a{
        color: var(--color-white);
    }
     #contact-us .info-item a:hover{
        opacity: 1;
        text-decoration: none;
     }

    /* Right Column - Form */
    #contact-us .form-container{
        width: 500px;
        background: white;
        padding: 30px;
        border-radius: 6px;
        color: var(--color-black);
        display: flex;
        flex-direction: column;
        justify-content: start;
        position: relative;
        z-index: 4;
    }
    #contact-us .form-container h3{
        font-size: 28px;
        margin-bottom: 10px;
        font-family: var(--title-font-family);
    }
    #contact-us .form-container > p{
        font-size: 14px;
        color: var(--color-gray);
        margin-bottom: auto;
    }


    
    @media screen and (max-width: 768px){
        #contact-us .content{
            flex-direction: column;
            padding: 20px 20px;
        }
        #contact-us .contact-info{
            width: 100%;
        }
        #contact-us .contact-info h2 {
         font-size: var(--font-size-title);
       }
        #contact-us .info-grid{
            gap: 40px;
        }
        #contact-us .info-item{
            width: 100%;
        }
        #contact-us .form-container {
            width: 100%;
            margin-top: 60px;
        }

        #contact-us .info-item h3 {
          margin-bottom: 10px;
        }

        #contact-us .form-container > p {
    margin-bottom: 40px;
        }
    }
</style>

<section id="contact-us">
    
    
    
    
    <div class="content">
        <img lazy-src="<?= get_template_directory_uri() ?>/assets/main-property-banners/property-4.png" alt="contact background" class="back-img">
        <div class="overlay"></div>

        <!-- Left Info -->
        <div class="contact-info">
            <div>
                <h2>A Balance<br> You Can Feel</h2>
                <p>Discover experiences you won't find anywhere else — thoughtfully designed to immerse you in the heart of the destination. Soulful stories waiting to be lived.</p>
            </div>
            
            <div class="info-grid">
                
                <div class="info-item info-full">
                    <h3>Social Media</h3>
                    <a href="#">Instagram</a>
                    <a href="#">Facebook</a>
                </div>
                
                <div class="info-item">
                    <h3>Email</h3>
                    <a href="mailto:hello@moraescapes.com">hello@moraescapes.com</a>
                </div>
                
                <div class="info-item">
                    <h3>Phone</h3>
                    <a href="tel:+15550123456">+1 (555) 012-3456</a>
                </div>
            </div>
        </div>

        <!-- Right Form -->
        <div class="form-container">
            <h3>Start Planning Your Stay</h3>
            <p>From tailored amenities to availability questions, we’re here to help you find the perfect property for your next escape.</p>
            
            <?= do_shortcode('[contact-form-7 title="contact us"]') ?>
        </div>
    </div>
</section>