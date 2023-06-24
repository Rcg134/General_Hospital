/** @format */

// Function to save field data to local storage
saveFieldDataToLocalStorage = (fieldId, value) => {
  const savedData = loadSavedDataFromLocalStorage() || {};
  savedData[fieldId] = value;
  localStorage.setItem("savedData", JSON.stringify(savedData));
};

// Function to load field data from local storage
loadFieldDataFromLocalStorage = (fieldId) => {
  const savedData = loadSavedDataFromLocalStorage();
  return savedData ? savedData[fieldId] : null;
};

// Function to load saved data from local storage
loadSavedDataFromLocalStorage = () => {
  const savedData = localStorage.getItem("savedData");
  return savedData ? JSON.parse(savedData) : null;
};

// Event listener to capture changes in the form fields
document.addEventListener("input", function (event) {
  const target = event.target;
  const fieldId = target.id;
  const value = target.value;
  saveFieldDataToLocalStorage(fieldId, value);
});

// Initialize the form with saved data (if available)
window.addEventListener("DOMContentLoaded", function () {
  const savedData = loadSavedDataFromLocalStorage();
  if (savedData) {
    for (const fieldId in savedData) {
      const field = document.getElementById(fieldId);
      if (field) {
        field.value = savedData[fieldId];
      }
    }
  }
});

function animateSection(sectionId) {
  var section = document.querySelector(sectionId);
  section.classList.add("slide-in");
  setTimeout(function () {
    section.classList.remove("slide-in");
  }, 500);
}

function submitForm(event) {
  event.preventDefault();
  // Handle form submission here
  // You can use JavaScript or make an AJAX request to submit the form data
}

window.addEventListener("scroll", function () {
  var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
  var scrollButton = document.querySelector(".scroll-to-top");

  if (scrollPosition > 200) {
    scrollButton.classList.add("show");
  } else {
    scrollButton.classList.remove("show");
  }
});


function showImage(src) {
  document.getElementById('zoomed-image-overlay').style.display = 'block';
  var zoomedImage = document.getElementById('zoomed-image');
  zoomedImage.src = src;
  document.getElementById('zoomed-image-overlay').style.display = 'flex';
}

function hideImage() {
  document.getElementById('zoomed-image-overlay').style.display = 'none';
}