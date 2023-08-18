// Function to go from homepage to add your experience page
function goToAddPage(url) {
    window.location.href = "addBar.html"
}

// Function to go from add your experience page to homepage
function goToHomePage(url) {
    window.location.href = "home.html"
}

// Function to open popup after user adds bar experience
function openPopup() {
    let popup = document.getElementById("popup");
    popup.classList.add("open-popup")
}