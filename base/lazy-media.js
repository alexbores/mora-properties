// Lazy Media

const LazyMedia = (function(){
  
  ////////////////////variables
  let mediaList = [];
  
  let selector = '[lazy-src]';
  let attr = 'lazy-src';
  let attrLoading = 'lazy-loading-src';

  ///////////////////////////////////initials
  const load = () => {
    Array.from(document.querySelectorAll(selector)).forEach(el=>{
        setMedia(el);
        
    });
  };

  const setMedia = (el) => {
    let errorLoad = (ev)=>{
      console.warn('image skipped: '+el.src);
    };
    if(el.nodeName == 'IMG'){
      el.addEventListener('error',errorLoad);
    }
    let options = {
       root: null, 
       rootMargin: '400px 0px', 
       threshold: 0, 
    };
    
    let lazySrc = el.getAttribute(attr);
    el.setAttribute(attrLoading, lazySrc);
    el.removeAttribute(attr);

    let mediaObj = {
      done:false,
      src:lazySrc,
      elem:el,
    };

    mediaList.push(mediaObj);


    let interFunct = (entries, observer) => {
        entries.forEach(entry => {
          if(entry.isIntersecting) {
            observer.unobserve(entry.target);

            let el = entry.target;

            if(el.nodeName == 'IMG'){
              el.src = el.getAttribute(attrLoading);
            }
            else{
              try{
                el.style.backgroundImage = `url('${el.getAttribute(attrLoading)}')`;
              }
              catch{
                console.warn('background image skipped: '+el.src);
              }
            }
            mediaObj.done = true;
            el.removeAttribute(attrLoading);
          }
        });
    };
    let observer = new IntersectionObserver(interFunct,options);
    observer.observe(el);

  }
  
  //////////////////////////////////////////////////expose
  return {
    //methods
    load,

    mediaList,
  }

})();
Object.freeze(LazyMedia);