(function () {
	window._livePageStart = window._livePageStart || Date.now();
	function hideLoaderEarly() {
		var l = document.querySelector('.loader');
		if (l) l.style.display = 'none';
	}
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', hideLoaderEarly);
	} else {
		hideLoaderEarly();
	}
})();
