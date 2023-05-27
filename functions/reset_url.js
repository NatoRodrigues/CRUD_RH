function closeErrorMessage() {
    document.querySelector("#error-message").style.display = "none"; // Hide the error message
    var url = window.location.href.split("?")[0]; // Get the current URL without query parameters
    history.replaceState(null, null, url); // Reset the URL without reloading the page
  }
  