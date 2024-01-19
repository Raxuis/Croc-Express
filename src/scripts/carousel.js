function setupSlider(slidesContainer, slides, prevButton, nextButton, currentIndex) {
    const slideWidth = slides[0].clientWidth;

    prevButton.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        slidesContainer.scrollLeft = currentIndex * slideWidth;
    });

    nextButton.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % slides.length;
        slidesContainer.scrollLeft = currentIndex * slideWidth;
    });
}

const slidesContainer1 = document.getElementById("slides-container1");
const slidesContainer2 = document.getElementById("slides-container2");

const slidesFirst = document.querySelectorAll(".slideFirst");
const slidesSecond = document.querySelectorAll(".slideSecond");

const prevButtons = document.getElementsByClassName("slide-arrow-prev");
const nextButtons = document.getElementsByClassName("slide-arrow-next");

let currentIndexFirst = 0;
let currentIndexSecond = 0;

setupSlider(slidesContainer1, slidesFirst, prevButtons[0], nextButtons[0], currentIndexFirst);
setupSlider(slidesContainer2, slidesSecond, prevButtons[1], nextButtons[1], currentIndexSecond);
