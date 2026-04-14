
document.addEventListener('DOMContentLoaded',()=>{
   LazyMedia.load();
   SVGInject(document.querySelectorAll("[svg-src]"));

   // setForm();
});

function setForm(){
   let title = `<h3 class="form-title subtitle-1">Let's Find You A Home</h3>`;

   let forms = document.querySelectorAll('.wpcf7-form');
   forms.forEach(form=>{
     form.insertAdjacentHTML('afterBegin',title);    
   });
}