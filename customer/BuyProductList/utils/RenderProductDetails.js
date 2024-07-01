document.addEventListener("DOMContentLoaded", function () {
  const product = document.querySelectorAll(".grid-item");
  product.forEach((e) =>
    e.addEventListener("click", function () {
      
      const modalBody = document.querySelector(".modal-body");

      fetch(`../../customer/ProductDetails/index.php?id=${e.dataset.productid}`)
        .then((response) => {
          if (!response.ok) {
            throw new Error(
              "Network response was not ok " + response.statusText
            );
          }
          return response.text();
        })
        .then((data) => {
          modalBody.innerHTML = data; 
        })
        .catch((error) => {
          console.error("There was a problem with the fetch operation:", error);
          modalBody.innerHTML = "<p>Error loading content.</p>";
        });
    })
  );
  function updateFloatBar() {
    
        const floatBar = document.getElementById('float-bar');
        const floatLabel = document.getElementById('float-label');
        const floatValue = floatLabel.dataset.float;
        const floatPointer = document.getElementById('float-pointer');
        const percentage = floatValue * 100;

        floatBar.style.width = percentage + '%';
        floatLabel.textContent = floatValue.toFixed(1);
        floatPointer.style.left = `calc(${percentage}% - 10px)`;

        if (floatValue <= 0.9)
            floatBar.style.backgroundColor = '#ff0000'; // Battle-Scarred (Red)
        if (floatValue <= 0.7)
            floatBar.style.backgroundColor = '#ffbf00'; // Well-Worn (Orange)
        if (floatValue <= 0.5)
            floatBar.style.backgroundColor = 'rgb(252, 252, 6)'; // Field-Tested (yellow)
        if (floatValue <= 0.3)
            floatBar.style.backgroundColor = '#a3a3ff'; // Minimal Wear (Blue)
        if (floatValue <=0.1)
            floatBar.style.backgroundColor ='#4caf50' ; // Factory New (Green)
}
updateFloatBar();
});
