// SIDEBAR
function showSidebar (){
  const sideBar = document.querySelector(".sideBar");
  sideBar.style.display = "flex";
}

function closeSidebar (){
  const sideBar = document.querySelector(".sideBar");
  sideBar.style.display = "none";
}


// SLIDESHOWS
let currentIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
  if (index >= slides.length) currentIndex = 0;
  else if (index < 0) currentIndex = slides.length - 1;
  else currentIndex = index;

  slides.forEach((slide, i) => {
    slide.classList.toggle('active', i === currentIndex);
  });
}

// Button events
document.querySelector('.leftBut').addEventListener('click', () => showSlide(currentIndex - 1));
document.querySelector('.rightBut').addEventListener('click', () => showSlide(currentIndex + 1));

// Optional auto-slide
setInterval(() => showSlide(currentIndex + 1), 4000);

// Start slideshow
showSlide(0);