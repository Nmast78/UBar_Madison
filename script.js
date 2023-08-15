// Function to go from homepage to add your experience page
function goToAddPage(url) {
    window.location.href = "addBar.html"
}

// Function to go from add your experience page to homepage
function goToHomePage(url) {
    window.location.href = "home.html"
}

let popup = document.getElementById("popup");

function openPopup() {
    popup.classList.add("open-popup")
}

function closePopup() {
    popup.classList.remove("open-popup")
}