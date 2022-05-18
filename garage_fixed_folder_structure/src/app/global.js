// <================ Animations ================>

// Selects the classes of the containers that you want to animate
const scrollClass = document.querySelectorAll('.scrollEvent')

// Checks for the height and returns boolean if the class is in the view
const classInView = (el, dividend = 0) => {
    const elementTop = el.getBoundingClientRect().top;
    return (elementTop <= ((window.innerHeight || document.documentElement.clientHeight) / dividend));
};

// Checks for the height and returns boolean if the class is out of view
const classOutView = (el) => {
    const elementTop = el.getBoundingClientRect().top;
    return (elementTop > (window.innerHeight || document.documentElement.classList));
}

// function to add the class scrolled
const displayScrolled = (element) => {
    element.classList.add('scrolled');
}

// function to remove the class scrolled
const removeScrolled = (element) => {
    element.classList.remove('scrolled');
}

// function to handle the scroll animation
const handleScrollAnimation = () => {
    scrollClass.forEach((el) => {
        if (classInView(el, 1)) {
            displayScrolled(el);
        } else if (classOutView(el)) {
            removeScrolled(el);
        }
    });
}

// Listens to the event scroll and triggers the function handleScrollAnimation
window.addEventListener('scroll', () => {
    handleScrollAnimation();
})