export default function myCopyright() {
	const copyright = document.getElementById('copyright');
	const thisYear = new Date().getFullYear();
	const brand = 'Kingdom One';
	copyright.innerHTML = `<p>&copy; ${thisYear} ${brand} All Rights Reserved.`;
}
