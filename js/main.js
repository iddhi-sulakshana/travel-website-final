//click on the burger icon display the menu bar
//and add the animations to the menu items
const navSlider = () => {
	const burger = document.querySelector('.burger');
	const nav = document.querySelector('.nav_link');
	const navlinks = document.querySelectorAll('.nav_link li');
	//toggle
	burger.addEventListener('click', () => {
		nav.classList.toggle('nav-active');

		//animation
		navlinks.forEach((link, index)=>{
			if(link.style.animation){
				link.style.animation = `FadeLeft 0.5s ease forwards ${index / 5 + .15}s`;
			}
		});
	});
	
}
navSlider();
