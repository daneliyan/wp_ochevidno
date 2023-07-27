$(document).ready(function () {

	/*=== DARK LIGHT THEME ==================================*/
	const themeButton1 = document.getElementById('theme-button1')
	const themeButton2 = document.getElementById('theme-button2')
	const darkTheme = 'dark-theme'
	const iconTheme = 'icon-sun'

	// Previously selected topic (if user selected)
	const selectedTheme = localStorage.getItem('selected-theme')
	const selectedIcon = localStorage.getItem('selected-icon')

	// We obtain the current theme that the interface has by validating the dark-theme class
	const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
	const getCurrentIcon = () => themeButton1.classList.contains(iconTheme) ? 'icomoon icon-moon' : 'icomoon icon-sun'

	// We validate if the user previously chose a topic
	if (selectedTheme) {
		// If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
		document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
		themeButton1.classList[selectedIcon === 'icomoon icon-moon' ? 'add' : 'remove'](iconTheme)
	}

	// Activate / deactivate the theme manually with the button
	themeButton1.addEventListener('click', () => {
		// Add or remove the dark / icon theme
		document.body.classList.toggle(darkTheme)
		themeButton1.classList.toggle(iconTheme)
		// We save the theme and the current icon that the user chose
		localStorage.setItem('selected-theme', getCurrentTheme())
		localStorage.setItem('selected-icon', getCurrentIcon())
	})

	// Repeat the same code for the second button using themeButton2 instead of themeButton1.
	themeButton2.addEventListener('click', () => {
		// Add or remove the dark / icon theme
		document.body.classList.toggle(darkTheme)
		themeButton2.classList.toggle(iconTheme)
		// We save the theme and the current icon that the user chose
		localStorage.setItem('selected-theme', getCurrentTheme())
		localStorage.setItem('selected-icon', getCurrentIcon())
	})


	/*=== Search (Header) ==================================*/
	let searchHiddenInput = document.querySelector("#searchHiddenInput");
	let searchToggleBtn = document.querySelector("#searchToggleBtn");
	let searchBarLabel = document.querySelector("#searchBarLabel");
	searchToggleBtn.addEventListener("click", () => {
		searchBarLabel.classList.toggle("active");
		searchHiddenInput.focus();
	});
	document.addEventListener("click", (event) => {
		if (!event.target.matches("#searchBarLabel, #searchToggleBtn, #searchToggleBtn i, #searchHiddenInput")) {
			searchBarLabel.classList.remove("active");
		}
	});
	window.onscroll = () => {
		searchBarLabel.classList.remove("active");
	}


	/*=== Burger Menu ==================================*/
	const navMenu = document.getElementById('nav-menu'),
		navToggle = document.getElementById('nav-toggle'),
		body = document.querySelector('body');
	if (navToggle) {
		navToggle.addEventListener('click', () => {
			navToggle.querySelector('i').classList.toggle('icon-remove');
			navMenu.classList.toggle('show-menu');
			body.classList.toggle('dis-scroll');
		});
	}
	const navLink = document.querySelectorAll('.nav-list li a, .nav-menu .header-bar .btn-icon')
	const linkAction = () => {
		const navMenu = document.getElementById('nav-menu')
		navToggle.querySelector('i').classList.toggle('icon-remove');
		navMenu.classList.remove('show-menu');
		body.classList.remove('dis-scroll');
	}
	navLink.forEach(n => n.addEventListener('click', linkAction));



	/*=== Widget Categories ==================================*/
	const widgetCategoriesItems = document.querySelectorAll('.widget_categories>ul>li')
	widgetCategoriesItems.forEach((item) => {
		const widgetCategoriesHeader = item.querySelector('.widget_categories>ul>li>a')
		widgetCategoriesHeader.addEventListener('click', () => {
			const openItem = document.querySelector('.widget_categories-open')
			toggleItem(item)
			if (openItem && openItem !== item) {
				toggleItem(openItem)
			}
		})
	})
	const toggleItem = (item) => {
		const widgetCategoriesContent = item.querySelector('.widget_categories>ul>li>.widget_categories-submenu')
		if (item.classList.contains('widget_categories-open')) {
			widgetCategoriesContent.removeAttribute('style')
			item.classList.remove('widget_categories-open')
		} else {
			widgetCategoriesContent.style.height = widgetCategoriesContent.scrollHeight + 'px'
			item.classList.add('widget_categories-open')
		}
	}


	$('.owl-carousel').owlCarousel({
		loop: true,
		margin: 10,
		items: 1,
		nav: true,
		navText: false,
		autoHeight: true,
	})

});