// Close Side Menu
var menuHolder = document.getElementById('menuHolder');
var siteBrand = document.getElementById('siteBrand');

function menuToggle() {
  const menuHolder = document.querySelector("#menuHolder");
  if (menuHolder.classList.contains("drawMenu")) {
    menuHolder.classList.remove("drawMenu");
    document.removeEventListener("click", clickOutsideMenu);
  } else {
    menuHolder.classList.add("drawMenu");
    document.addEventListener("click", clickOutsideMenu);
  }
}

function clickOutsideMenu(event) {
  const menuHolder = document.querySelector("#menuHolder");
  if (!menuHolder.contains(event.target)) {
    menuHolder.classList.remove("drawMenu");
    document.removeEventListener("click", clickOutsideMenu);
  }
}

var closeButton = document.getElementById('closeButton');
closeButton.addEventListener('click', function () {
  menuHolder.classList.remove("drawMenu");
});

var menuDrawer = document.querySelector('#menuDrawer');

$(document).ready(function () {
  function updateButtonVisibility() {
    if ($(window).width() < 767) {
      $('a.buttonReg').removeClass('d-none');
    } else {
      $('a.buttonReg').addClass('d-none');
    }
  }

  // Update button visibility on initial page load
  updateButtonVisibility();

  // Update button visibility on window resize
  $(window).on('resize', function () {
    updateButtonVisibility();
  });
});

// If Freelancer has applied change disable button
document.addEventListener("DOMContentLoaded", function () {
  const applyButtons = document.querySelectorAll("button#buttonApply");
  applyButtons.forEach((button) => {
    if (button.textContent === "Applied") {
      button.disabled = true;
    }
  });
});




