var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 1500); // Change image every 2 seconds
}


const head = document.querySelector('.head-message');
const stars = document.getElementsByName('rate');
for (let i = 0; i < stars.length; i++) {
    stars[i].addEventListener('click', (event) => {
        if (event.path[0].id == 'rate-1') {
            head.innerHTML = 'I dont like this 😣';
        } else if (event.path[0].id == 'rate-2') {
            head.innerHTML = 'I just like it 😑';
        } else if (event.path[0].id == 'rate-3') {
            head.innerHTML = 'I like it 😐';
        } else if (event.path[0].id == 'rate-4') {
            head.innerHTML = 'I Like this 🙂';
        } else if (event.path[0].id == 'rate-5') {
            head.innerHTML = 'I Love this 😍';
        }
    });
}