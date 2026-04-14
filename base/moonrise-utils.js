// MoonRise Utils

const Mnr = (function(){

  ///////////////////////////////////performance
  const debounce = (cb, delay = 500) => {
    let timeout;
    return (...args) => {
      clearTimeout(timeout);
      timeout = setTimeout(() => {
        cb(...args);
      }, delay);
    }
  };
  

  //////////////////////////////// dom
  const setViewTrigger = (elem, fnEnter, fnExit, runOnce = false, options = null) => {
      let interFunct = (entries, observer) => {
        entries.forEach(entry => {
          if(entry.isIntersecting) {
            runOnce = (runOnce == null) ? false : runOnce;

            if(runOnce == true){
              observer.unobserve(entry.target)
            }

            if(fnEnter != null){
              fnEnter(entry.target);
            }
          }
          else{
            if(fnExit != null){
              fnExit(entry.target);
            }
          }
        });
      };
      let observer = new IntersectionObserver(interFunct,options);
      observer.observe(elem);
  }

  /////////////////////////////////utilities

  const wait = (fn, t) => {
      let queue = [], self, timer;
    
      function schedule(fn, t) {
          timer = setTimeout(function() {
              timer = null;
              fn.call();
              if (queue.length) {
                  let item = queue.shift();
                  schedule(item.fn, item.t);
              }
          }, t);            
      }
      self = {
          wait: function(fn, t) {
              // if already queuing things or running a timer, 
              //   then just add to the queue
              if (queue.length || timer) {
                  queue.push({fn: fn, t: t});
              } else {
                  // no queue or timer yet, so schedule the timer
                  schedule(fn, t);
              }
              return self;
          },
          cancel: function() {
              clearTimeout(timer);
              queue = [];
              return self;
          }
      };
      return self.wait(fn, t);
  }

  //////////////////////////////////////////////////expose
  return {
    //methods
    setViewTrigger,
    debounce,
    wait
  }

})();
Object.freeze(Mnr);