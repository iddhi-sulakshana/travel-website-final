//uses to change image in the main image view, when 
//click on the image it changes main image source to 
//the clicked image url
const changeImage = () => {
	const main_image = document.getElementById('main-image');
	const container = document.querySelector('.grid-images');
	const list = container.querySelectorAll('.sub-image');
	for(let i=0; i<list.length; i++){
		list[i].addEventListener('click', () => {
			//animations
			main_image.classList.remove("scale");
			void main_image.offsetWidth;
			main_image.src = list[i].src;
			main_image.classList.add("scale");
		});
	}
}
changeImage();

//change the post review header depend on review status
const head = document.querySelector('.head-message');
const stars = document.getElementsByName('rate');
for(let i=0; i<stars.length; i++){
	stars[i].addEventListener('click', (event) => {
		if(event.path[0].id == 'rate-1'){
			head.innerHTML = 'Terrible 😣';
		}else if(event.path[0].id == 'rate-2'){
			head.innerHTML = 'Poor 😑';
		}else if(event.path[0].id == 'rate-3'){
			head.innerHTML = 'Average 😐';
		}else if(event.path[0].id == 'rate-4'){
			head.innerHTML = 'Good 🙂';
		}else if(event.path[0].id == 'rate-5'){
			head.innerHTML = 'Excellent 😍';
		}
	});
}