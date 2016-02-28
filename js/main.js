function userConfirm() {
	window.location = "index.html";
	var welcome = document.getElementById("welcome");
	welcome.innerHTML = "welcome to txtbkr<br>you have successfully signed up";
}

function welcome(){
			var welcome = document.getElementById("welcome");
			welcome.innerHTML = "welcome to txtbkr<br>you have successfully signed up";
}

function signupcheck(){
	var check = document.getElementById("signupcheck");
	if(check.innerHTML == "true"){
		welcome();
	}
}

function addBook(title, author, img, major, isbn) {
	window.onload = function () { 
		document.isbnform.action ="addbook.php";

		var titleinput = document.getElementById("bookTitle");
		var authorinput = document.getElementById("bookAuthor");
		var imginput = document.getElementById("bookImageLink");
		var classinput = document.getElementById("bookClass");
		var isbninput = document.getElementById("bookISBN");



		titleinput.value = title;
		authorinput.value = author;
		imginput.value = img;
		classinput.value = major;
		isbninput.value = isbn;

	
	}

}
