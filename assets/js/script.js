// Small helper script a student might write during a project
// Keeps things simple: a tiny addToCart stub and a small DOM helper

function addToCart(productId) {
	// In this project we don't have a full cart API yet,
	// so just show a small notification and log to console.
	console.log('addToCart called for', productId);
	alert('Produit ' + productId + ' ajouté au panier (simulation).');
}

// Simple DOM ready helper
document.addEventListener('DOMContentLoaded', function () {
	// nothing fancy here yet; placeholder for later JS
});
