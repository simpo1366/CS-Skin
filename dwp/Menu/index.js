const data = [{
    itemNamea: 'item 1',
    itemPrice: 10,
},
{
    itemNamea: 'item 2',
    itemPrice: 10,
},
{
    itemNamea: '',
    itemPrice: 999,
},
{
    itemNamea: 'halo',
    itemPrice: 999,
},
{
    itemNamea: 'halo',
    itemPrice: 999,
},
{
    itemNamea: 'halo',
    itemPrice: 999,
},
{
    itemNamea: 'halo',
    itemPrice: 999,
},
{
    itemNamea: 'halo',
    itemPrice: 999,
},

{
    itemNamea: 'halo',
    itemPrice: 999,
},
{
    itemNamea: 'halo',
    itemPrice: 999,
},


]

const gridContainer = document.querySelector(".grid-container")
let htmlString = ''
for (let i = 0; i < data.length; i++) {
    htmlString += `<div class="grid-item">${data[i].itemNamea} price = ${data[i].itemPrice}</div>`
}
gridContainer.innerHTML = htmlString