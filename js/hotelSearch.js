function animateSrchItem() {
    let items = document.querySelectorAll(".searched-item");
    items.forEach((link, index) => {
        link.style.animation = ``;
        link.offsetWidth;
        link.style.animation = link.style.animation = `FadeUp 0.25s ease forwards ${index / 5 + .01}s`;;
    });
}