// -------------------- Nav Area --------------------
// SIDEBAR
function showSidebar (){
  const sideBar = document.querySelector(".sideBar");
  sideBar.style.display = "flex";
}

function closeSidebar (){
  const sideBar = document.querySelector(".sideBar");
  sideBar.style.display = "none";
}

// -------------------- Main Area --------------------
// HOME AREA
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

// PRODUCTS AREA
// SORT AND SEARCH FUNCTION

// PRODUCTS DISPLAY

// PAGINATION FUNCTION
const totalPages = document.querySelectorAll('.products').length;
const container = document.querySelector('.pageButtons');
let pageIndex = 1;

for (let i = 1; i <= totalPages; i++) {
  const button = document.createElement('button');
  button.textContent = `${i}`;
  button.classList.add('page');

  if (i === pageIndex) {
    button.classList.add('active');
  }

  container.appendChild(button);
}