// Function to sort items
function sortItems(itemCategory, itemSubcategory = 'Any') {
    let sortedItems;
    if (itemCategory === 'Any') {
        sortedItems = items; //display all items
    } else if (itemSubcategory === 'Any') {
        sortedItems = items.filter(items => items.itemCategory === itemCategory);
    } else {
        sortedItems = items.filter(items => items.itemCategory === itemCategory && items.itemSubcategory === itemSubcategory);
    }
    renderItems(sortedItems);
}

//side bar function
function openNav() {
    document.getElementById("sidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("backdrop").style.display = "block";
    document.querySelector('.openbtn').classList.add('hidden');
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("backdrop").style.display = "none";
    document.querySelector('.openbtn').classList.remove('hidden');
}

// Close the sidebar if clicking outside of it
document.getElementById("backdrop").addEventListener("click", closeNav);



// //searchbar functions
// document.addEventListener("DOMContentLoaded", () => {
    
//     function sortItems(itemCategory, itemSubcategory = 'Any') {
//         let sortedItems;
        
//         if (itemCategory === 'Any') {
//             sortedItems = items; // Display all items
//         } else if (itemSubcategory === 'Any') {
//             sortedItems = items.filter(item => item.itemCategory === itemCategory);
//         } else {
//             sortedItems = items.filter(item => item.itemCategory === itemCategory && item.itemSubcategory === itemSubcategory);
//         }
        
//         renderItems(sortedItems);
//     }

//     // // Function to search items
//     // function searchItems(query) {

//     //     let filteredItems;
//     //     let searchQuery;
//     //     searchQuery = query.toLowerCase();
//     //     filteredItems = items.filter(item => item.itemName.toLowerCase().includes(searchQuery) ||
//     //     item.itemCategory.toLowerCase().includes(searchQuery) ||
//     //     item.itemSubcategory.toLowerCase().includes(searchQuery));
//     //     renderItems(filteredItems);/*searchItems(query) function now checks if the search query matches any part of the itemName, itemCategory, or itemSubcategory.*/
//     // }

//     // Example for main categories
//     const categoryButtons = document.querySelectorAll(".category-btn");
//     categoryButtons.forEach(button => {
//         button.addEventListener("click", (event) => {
//             const itemCategory = event.target.dataset.category;
//             sortItems(itemCategory, 'Any');
//         });
//     });

//     // Example for subcategories
//     const subcategoryButtons = document.querySelectorAll(".subcategory-btn");
//     subcategoryButtons.forEach(button => {
//         button.addEventListener("click", (event) => {
//             const itemCategory = event.target.dataset.category;
//             const itemSubcategory = event.target.dataset.subcategory;
//             sortItems(itemCategory, itemSubcategory);
//         });
//     });

//     // Event listener for the search bar
//     // const searchBar = document.getElementById("searchBar");
//     // searchBar.addEventListener("input", (event) => {
//     //     const searchQuery = event.target.value;
//     //     searchItems(searchQuery);
//     // });

//     // Initial render
//     //renderItems(items);
// });

//toggle button colours function(retain button colors)
var currentButton = null; // Track the currently yellow button

function toggleColor(button) {
  // If there is a currently orange button, change it back to default color
  if (currentButton && currentButton !== button) {
    currentButton.style.backgroundColor = "#f1f1f1"; // Change back to initial color
    currentButton.style.color = "black"; // Change text color back to white
  }

  // Toggle the color of the clicked button
  if (button.style.backgroundColor === "orange") {
    button.style.backgroundColor = "#f1f1f1"; // Change back to initial color
    button.style.color = "black"; // Change text color back to white
    currentButton = null; // No button is currently yellow
  } else {
    button.style.backgroundColor = "orange"; // Change background color to yellow
    button.style.color = "black"; // Change text color to black
    currentButton = button; // Update the currently yellow button
  }
}
function addToWishlist(id) {
  // Add JavaScript code to handle the trade action
  alert(`Product ${id} Added to Wishlist!`);
}
//simpo write
function addToCart(id) {
    // Add JavaScript code to handle the trade action
    alert(`Product ${id} Added to cart!`);
}
