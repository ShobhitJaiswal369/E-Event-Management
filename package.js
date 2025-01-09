document.addEventListener('DOMContentLoaded', () => {
    const pricingBoxes = document.querySelectorAll('.price .box');
  
    pricingBoxes.forEach(box => {
      box.addEventListener('click', () => {
        const packageTitle = box.getAttribute('data-title');
        sessionStorage.setItem('package', packageTitle);
      });
    });
  });
  