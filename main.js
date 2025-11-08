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
let index = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function showSlide(i) {
  slides.forEach(slide => slide.classList.remove('active'));
  index = (i + totalSlides) % totalSlides; // wrap around
  slides[index].classList.add('active');
}

// Button navigation
document.querySelector('.prev').addEventListener('click', () => {
  showSlide(index - 1);
});

document.querySelector('.next').addEventListener('click', () => {
  showSlide(index + 1);
});

// Auto slide every 10 seconds
setInterval(() => {
  showSlide(index + 1);
}, 10000);