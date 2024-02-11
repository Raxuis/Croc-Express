const circleElement = document.querySelector('.circle');
const buttons = document.querySelectorAll('button');
const inputs = document.querySelectorAll('input');
const mouse = { x: 0, y: 0 };
const previousMouse = { x: 0, y: 0 };
const circle = { x: 0, y: 0 };
let currentStale = 0;
let currentAngle = 0;


buttons.forEach(button => {
    button.addEventListener('mouseover', () => {
        circleElement.style.border = '1px solid #000';
        circleElement.style.boxShadow = '0 0 0 1px #000';/*
        circleElement.style.setProperty('--circle-size', '10px'); */
    });

    button.addEventListener('mouseout', () => {
        circleElement.style.border = '1px solid #FFF';
        circleElement.style.boxShadow = '0 0 0 0';/*
        circleElement.style.setProperty('--circle-size', '30px'); */
    });
});

inputs.forEach(input => {
    input.addEventListener('mouseover', () => {
        circleElement.style.border = '1px solid #000';
        circleElement.style.boxShadow = '0 0 0 1px #000';/*
        circleElement.style.setProperty('--circle-size', '10px'); */
    });

    input.addEventListener('mouseout', () => {
        circleElement.style.border = '1px solid #FFF';
        circleElement.style.boxShadow = '0 0 0 0';/*
        circleElement.style.setProperty('--circle-size', '30px'); */
    });
});

document.addEventListener('mousedown', () => {
    circleElement.style.transitionDuration = '0.3s';
    circleElement.style.border = '1px solid #000';
    circleElement.style.boxShadow = '0 0 0 1px #000';
    circleElement.style.setProperty('--circle-size', '20px');
})
document.addEventListener('mouseup', () => {
    circleElement.style.border = '1px solid #FFF';
    circleElement.style.boxShadow = '0 0 0 0';
    circleElement.style.setProperty('--circle-size', '30px');
})
window.addEventListener('mousemove', (e) => {
    circleElement.style.transitionDuration = '';
    mouse.x = e.x;
    mouse.y = e.y;
});

const speed = 0.17;
const tick = () => {
    circle.x += (mouse.x - circle.x) * speed;
    circle.y += (mouse.y - circle.y) * speed;

    const translateTransform = `translate(${circle.x}px, ${circle.y}px)`;

    // Squeeze
    const deltaMouseX = mouse.x - previousMouse.x;
    const deltaMouseY = mouse.y - previousMouse.y;
    previousMouse.x = mouse.x;
    previousMouse.y = mouse.y;

    const mouseVelocity = Math.min(Math.sqrt(deltaMouseX ** 2 + deltaMouseY ** 2) * 4, 150);
    const scaleValue = (mouseVelocity / 150) * 0.5;

    currentStale += (scaleValue - currentStale) * speed;
    const scaleTransform = `scale(${1 + currentStale}, ${1 - currentStale})`;

    // Rotate
    const angle = Math.atan2(deltaMouseY, deltaMouseX) * 180 / Math.PI;
    if (mouseVelocity > 20) {
        currentAngle = angle;
    }
    const rotateTransform = `rotate(${currentAngle}deg)`;

    // Apply everything
    circleElement.style.transform = `${translateTransform} ${rotateTransform} ${scaleTransform} `;
    window.requestAnimationFrame(tick);
}
tick();
