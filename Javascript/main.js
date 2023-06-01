const slider = document.querySelector(".image-slider");
const arrLeft = document.querySelector(".arrow-left");
const arrRight = document.querySelector(".arrow-right");
const heading = document.querySelector(".caption h1");
const description = document.querySelector(".caption p");
//data for the slider 
const images = [
    "com-1.jpg", "com-2.jpg", "com-3.jpg",
     "com-4.jpg", "com-5.jpg", "pho-1.jpg",
     "pho-2.jpg" ,"pho-3.jpg","pho-4.jpg" ,
     "nVidiagraphics.jpg" ,"tab-25600.jpg",
    ]

    //headings for different electronics
const headings = [
   "HP","DELL","DELL", "LENOVO",
   "DELL","PHONES","iPHONES",
   "PHONES","iPHONES","GRAPHICS CARDS",
   "TABLETS","SAMSUNGs",
    
]
//descriptions

const descriptions = [
    "The new version with qualities",
    "Full waranty for software and hardware",
    "Durable battery life",
    "Modern and satisfaying features",
    "Loved by millions of customers world wide",
    "Best price which is affordable",
    "Fast storage types installed",
    "High performace processors installed",
    "Beautiful design and easily portable",
    "Enough Component parts to be sold",
    "Let's make your life easier together!"
]


//slider id

let id = 0;
function slide(id) {
    //set the background image
    
    slider.style.backgroundImage = `url(img/${images[id]})`;
    
    //add image fade animation
    slider.classList.add('image-fade');
  
    /*
      Remove animation after it's done, so it can be used again
     */
    setTimeout(()=>{
        slider.classList.remove('image-fade');
    },550);
    //change heading
    heading.innerText = headings[id];
    //change Description
    description.innerText = descriptions[id];
}
    //add click event to left arrow

    arrLeft.addEventListener('click', ()=>{
        //decrease id
        id--;
       /*
         Check if id is smaller than the number of available slides
       */ 
      if(id <0){
         id = images.length-1;
      }

      //run the slider function
      slide(id);
    });

    //Add click event to right arrow
    arrRight.addEventListener('click', ()=>{
        //Increament ID
        id++;
        /*
          Check if id is greater than
          the number of available slides
        */   
       if(id > images.length-1){
         id = 0;
       }

       //Run the slider function
       slide(id);
    });

