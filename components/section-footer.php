<style>
    footer#main-footer{
        background-color: var(--color-light-cloud);
        color: var(--color-black);
        padding: 0;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 50vh; /* Adjust as needed */
    }

    /* Big Text Section */
    #main-footer .big-text-wrapper{
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding-top: 60px;
        padding-bottom: 60px;
    }
    #main-footer .big-text{
        font-family: var(--title-font-family);
        font-size: 18vw; 
        line-height: 0.8;
        white-space: nowrap;
        font-weight: 400;
        color: var(--color-gray-light); 
        transform: translateX(20%); 
        transition: transform 20s linear;
        will-change: transform;
    }
    
    #main-footer.in-view .big-text{
        transform: translateX(-10%); /* Move to left when in view */
    }

    /* Bottom Bar */
    #main-footer .footer-bottom{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 40px;
        border-top: 1px solid rgba(0,0,0,0.1);
        
        width: 100%;
        gap: 40px;
    }
    #main-footer .footer-bottom p,
    #main-footer .footer-bottom a{
        text-decoration: none;
        color: var(--color-black);
        transition: opacity 0.2s;
        font-size: 12px;
        font-family: var(--text-font-family);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    #main-footer .footer-bottom a:hover{
        opacity: 0.7;
    }

    @media screen and (max-width: 768px){
        #main-footer .footer-bottom{
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        #main-footer .big-text{
            font-size: 25vw;
        }
    }
</style>

<footer id="main-footer">
    <div class="big-text-wrapper">
        <div class="big-text">MORA ESCAPES MORA ESCAPES MORA ESCAPES</div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; COPYRIGHT MORA ESCAPES <?= date('Y') ?> ALL RIGHTS RESERVED.</p>
        <a href="<?= get_permalink(get_page_by_path('terms-conditions')) ?>">TERMS AND CONDITIONS</a>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const footer = document.getElementById('main-footer');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                footer.classList.add('in-view');
            } else {
                footer.classList.remove('in-view');
            }
        });
    }, {
        threshold: 0.2
    });
    
    if(footer) observer.observe(footer);
});
</script>
