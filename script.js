// Function to go from homepage to add your experience page
function goToAddPage(url) {
    window.location.href = "addBar.html"
}

// Function to go from add your experience page to homepage
function goToHomePage(url) {
    window.location.href = "home.html"
}

// Function to check if users have selected values from dropdowns before they submit
function validate() {
    event.preventDefault(); 
    var bar_name = document.getElementById("bars");
    var accepted = document.getElementById("get-in");
    if(bar_name.selectedIndex <= 0) {
        alert("Please Select a Bar");
    } else if(accepted.selectedIndex <= 0) {
        alert("Please Select if you were Accepted or Rejected");
    } else {
        openPopup();
    }
}

// Function to open popup after user adds bar experience
function openPopup() {
    let popup = document.getElementById("popup");
    popup.classList.add("open-popup")
}

// Function that updates amount of minutes as user drags time slider
function updateTimeSlider() {
    const waitMinutesElement = document.getElementById("wait-minutes");
    const sliderElement = document.getElementById("slider");

    // Get the selected time interval from the slider's value
    const selectedTime = sliderElement.value;

    // Update the text content of the waitMinutesElement
    waitMinutesElement.textContent = (selectedTime === "60") ? "60+" : selectedTime;
}