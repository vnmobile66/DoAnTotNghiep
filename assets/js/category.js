// Mobile show filter and sort
// Button
let sortbtn = document.querySelector("#mobile-sort-title");
let filterbtn = document.querySelector("#mobile-filter-btn");
// Box
let listSort = document.querySelector(".mobile-sort-list");
let listFilter = document.querySelector(".mobile-filter-list");
// Function
sortbtn.addEventListener("click", ()=>{
    listSort.classList.toggle("show-sort");
})
filterbtn.addEventListener("click", ()=>{
    listFilter.classList.toggle("show-filter");
})
// Price
// chua lam xong