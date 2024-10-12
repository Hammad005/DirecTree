// Function to select an element by its selector
function select(selector) {
    return document.querySelector(selector);
  }
  
  // Select the preloader element
  let preloader = select('#preloader');
  
  // If preloader exists, remove it once the window loads
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  };
  document.getElementById('liveToastBtn').addEventListener('click', function () {
    var toastElement = document.getElementById('liveToast');
    var toast = new bootstrap.Toast(toastElement);
    toast.show();
  });
