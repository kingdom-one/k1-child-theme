const parentElement = document.querySelector('.candidates');

parentElement.addEventListener('mouseover', (e) => {
	if (e.target.classList.contains('candidate')) {
		const photo = e.target
			.closest('.candidate')
			.querySelector('.candidate__headshot');
		photo.style.filter = `grayscale(0) blur(0px)`;
	}
});
