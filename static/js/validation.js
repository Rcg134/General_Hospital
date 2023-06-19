/** @format */

function allowNumbersOnly(event) {
  // Get the event and input value
  event = event || window.event;
  var input = event.target || event.srcElement;

  // Get the key code of the pressed key
  var keyCode = event.keyCode ? event.keyCode : event.which;

  // Allow navigation and editing keys
  if (
    keyCode === 8 || // Backspace
    keyCode === 9 || // Tab
    keyCode === 46 || // Delete
    keyCode === 37 || // Left arrow
    keyCode === 39 || // Right arrow
    keyCode === 36 || // Home
    keyCode === 35 || // End
    keyCode === 116 // F5 (refresh)
  ) {
    return true;
  }

  // Allow digits 0-9
  if (keyCode >= 48 && keyCode <= 57) {
    return true;
  }

  // Prevent input for non-numeric characters
  event.preventDefault();
  return false;
}
