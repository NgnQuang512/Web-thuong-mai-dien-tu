let sliderTitles = document.querySelector(".slider-title");
let sliderTitle = document.querySelectorAll(".slider-title-item");
let sliderContainer = document.getElementById("slider-container-img");
let sliderImg = sliderContainer.querySelectorAll("img");
sliderTitle[0].classList.add("active");
let counter = 0;
let autoSlider = () => {
  sliderImg[counter].style.animation = "nextBf 0.5s ease-in forwards";
  sliderTitle[counter].classList.toggle("active");
  if (counter >= sliderImg.length - 1) {
    counter = 0;
  } else {
    counter++;
  }
  sliderImg[counter].style.animation = "nextAft 0.5s ease-in forwards";
  sliderTitle[counter].classList.toggle("active");
};
setInterval(autoSlider, 3000);
