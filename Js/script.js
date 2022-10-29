function wasap(){ 
   
window.open("https://api.whatsapp.com/send?phone=5493564627303&text=Hola,%20vi%20un%20anuncio%20en%20Facebook%20y%20quisiera%20conocer%20más%20sobre%20tus%20productos")

}


function Menu() {
	var menu = document.getElementById("btn-menu");
	var list = document.getElementById("btn-list");
	if (menu.classList.contains('btn-menu-abierto')) {
		menu.classList.remove("btn-menu-abierto");
		list.classList.remove("btn-list-abierto");
	} else {
		menu.classList.add("btn-menu-abierto");
		list.classList.add("btn-list-abierto");
	}
}
