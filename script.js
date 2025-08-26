
// Header Scroll 
let nav = document.querySelector(".navbar");
window.onscroll = function() {
    if(document.documentElement.scrollTop > 50){
        nav.classList.add("header-scrolled"); 
    }else{
        nav.classList.remove("header-scrolled");
    }
}

// nav hide  
let navBar = document.querySelectorAll(".nav-link");
let navCollapse = document.querySelector(".navbar-collapse.collapse");
navBar.forEach(function(a){
    a.addEventListener("click", function(){
        navCollapse.classList.remove("show");
    })
})


//slide up animation//
document.addEventListener('DOMContentLoaded', function() {
  const features = document.querySelectorAll('.features-box');

  function checkVisibility() {
      const windowHeight = window.innerHeight;
      const scrollTop = window.scrollY;

      features.forEach(feature => {
          const { top, bottom } = feature.getBoundingClientRect();
          const elementTop = top + scrollTop;
          const elementBottom = bottom + scrollTop;

          if (elementBottom > scrollTop && elementTop < scrollTop + windowHeight) {
              feature.classList.add('slide-up');
          }
      });
  }

  // Check visibility on scroll and on page load
  window.addEventListener('scroll', checkVisibility);
  checkVisibility(); // Initial check on page load
});







//lightbox//
function openLightbox(image) {
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightbox-img');

  lightboxImg.src = image.src;
  lightbox.style.display = 'flex';
}

function closeLightbox() {
  const lightbox = document.getElementById('lightbox');
  lightbox.style.display = 'none';
}
