// Array holding the paths of the images to be displayed in the slideshow
const images = ["image-1.jpg", "image-2.jpg", "image-3.jpg"];

// Variables to keep track of the current image index, the playing state, and the interval
let currentIndex = 0; // Starts with the first image
let playing = false; // Initially, the slideshow is not playing
let interval; // Will be used to store the setInterval for changing images

// DOM elements for the image display, play/pause button, loop checkbox, and image change time select box
const slideshowImage = document.getElementById("slideshow-image");
const playPauseButton = document.getElementById("play-pause");
const loopCheckbox = document.getElementById("loop");
const changeTimeSelect = document.getElementById("change-time");

// Function to update the slideshow image and handle looping
function updateImage() {
    slideshowImage.src = images[currentIndex]; // Updates the src attribute of the image element to the current image
    currentIndex = (currentIndex + 1) % images.length; // Increments the index to show the next image, loops back to 0 at the end
    if (currentIndex === 0 && !loopCheckbox.checked) { // Checks if the slideshow has reached the end and if loop is not enabled
        clearInterval(interval); // Stops the slideshow
        playPauseButton.textContent = "Play"; // Changes button text to "Play"
    }
}

// Function to toggle the play and pause states of the slideshow
function togglePlayPause() {
    if (playing) { // If the slideshow is currently playing
        clearInterval(interval); // Stop the slideshow
        playPauseButton.textContent = "Play"; // Update the button text to "Play"
    } else { // If the slideshow is paused
        interval = setInterval(updateImage, parseInt(changeTimeSelect.value)); // Start the slideshow with the interval selected by the user
        playPauseButton.textContent = "Pause"; // Update the button text to "Pause"
    }
    playing = !playing; // Toggle the playing state
}

// Event listeners for the play/pause button and change in image display duration
playPauseButton.addEventListener("click", togglePlayPause); // Listens for click on play/pause button to toggle slideshow state
changeTimeSelect.addEventListener("change", () => { // Listens for changes in the image change time select box
    if (playing) { // If the slideshow is currently playing
        clearInterval(interval); // Stop the current interval
        interval = setInterval(updateImage, parseInt(changeTimeSelect.value)); // Start a new interval with the new selected duration
    }
});
