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

function initializeSlider(containerId, slidesClass, prevButtonClass, nextButtonClass) {
    const slidesContainer = document.getElementById(containerId);
    const slides = document.querySelectorAll("." + slidesClass);
    const prevButton = document.querySelector("#" + prevButtonClass);
    const nextButton = document.querySelector("#" + nextButtonClass);

    let currentIndex = 0;

    setupSlider(slidesContainer, slides, prevButton, nextButton, currentIndex);
}
