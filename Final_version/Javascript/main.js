const slider = document.querySelector(".image-slider");
const heading = document.querySelector(".caption h1");
const description = document.querySelector(".caption p");

// Data for the slider
const images = [
  "com-1.jpg", "com-2.jpg", "com-3.jpg",
  "com-4.jpg", "com-5.jpg", "pho-1.jpg",
  "pho-2.jpg", "pho-3.jpg", "pho-4.jpg",
  "nVidiagraphics.jpg", "tab-25600.jpg",
];

// Headings for different electronics
const headings = [
  "HP", "DELL", "DELL", "LENOVO",
  "DELL", "PHONES", "iPHONES",
  "PHONES", "iPHONES", "GRAPHICS CARDS",
  "TABLETS", "SAMSUNGs",
];

// Descriptions
const descriptions = [
  "The new version with qualities",
  "Full warranty for software and hardware",
  "Durable battery life",
  "Modern and satisfying features",
  "Loved by millions of customers worldwide",
  "Best price which is affordable",
  "Fast storage types installed",
  "High-performance processors installed",
  "Beautiful design and easily portable",
  "Enough component parts to be sold",
  "Let's make your life easier together!",
];

let id = 0;
let intervalId;

function slide() {
  // Set the background image
  slider.style.backgroundImage = `url(img/${images[id]})`;

  // Change heading
  heading.innerText = headings[id];

  // Change description
  description.innerText = descriptions[id];

  // Increment ID for the next slide
  id++;

  // Reset ID if it exceeds the number of available slides
  if (id >= images.length) {
    id = 0;
  }
}

// Call the slide function initially
slide();

// Set an interval to automatically call the slide function every 5 seconds
intervalId = setInterval(slide, 5000);

// Stop the interval when the user hovers over the slider
slider.addEventListener("mouseenter", () => {
  clearInterval(intervalId);
});

// Resume the interval when the user stops hovering over the slider
slider.addEventListener("mouseleave", () => {
  intervalId = setInterval(slide, 3000);
});


//--------JavaScript code to define the uncheckCheckbox function--


