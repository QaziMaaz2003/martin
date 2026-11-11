(function () {
	var toggle = document.getElementById('martin-nav-toggle');
	var nav = document.getElementById('martin-primary-nav');
	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			var isOpen = nav.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		});
	}

	// Mobile: tap to open submenus instead of relying on hover.
	var parents = document.querySelectorAll('.primary-nav .menu-item-has-children > a');
	parents.forEach(function (link) {
		link.addEventListener('click', function (e) {
			if (window.innerWidth <= 768) {
				e.preventDefault();
				link.parentElement.classList.toggle('is-open');
			}
		});
	});
})();
