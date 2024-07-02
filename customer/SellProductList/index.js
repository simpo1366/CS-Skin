const data = [{
    itemName:'Light Rail',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposr-kLAtl7PTbTjlH7du6kb-Oj_jLPr7Vn35cpsclibGYotimjlLhrRZvYWH0ItfBJwU3aFmBq1C8xei-g5a1vZvLnXV9-n5168m83oM',
    itemAlt: '',
    itemPrice:3.20,
    itemFloat:0.41,
},{
    itemName:'Ticket To Hell',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpoo6m1FBRp3_bGcjhQ09-jq5WYh8jgPITZk2dd18h0juDU-ML02wHh80Nqa2HwJoXAJ1c3N1CE-lW6wOq5gJ_o6pjBzCRluScm4y6JgVXp1o_PXmgb',
    itemAlt: '',
    itemPrice:1.60,
    itemFloat:0.61,
},{
    itemName:'PAW',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot621FAZt7PLfYQJS7cumlZe0mvLwOq7c2D8D7sQli7GXrd2i2FW2r0Y_MDr7coWXJgM3YQqE-FW3xLvthse76ZnXiSw0Dp2Yjv0',
    itemAlt: '',
    itemPrice:120.00,
    itemFloat:0.15,
},
{
    itemName:'Akoben',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgposbupIgthwczbYQJF7dC_mL-KnPj2NrXum25V4dB8xLDHpo6j3Aax_kRpamDwdtOWJFA_ZlrU8gS5kri91JG9vpzPwXcx6HM8pSGKPYG_MWo',
    itemAlt: '',
    itemPrice:1.89,
    itemFloat:0.42,
}
]

const gridContainer = document.querySelector(".grid-container")
let htmlString = ''
let float
for (let i = 0; i < data.length; i++) {
    if(data[i].itemFloat <= 0.9) float = 'BS'
    if(data[i].itemFloat <= 0.7) float = 'WW'
    if(data[i].itemFloat <= 0.5) float = 'FT'
    if(data[i].itemFloat <= 0.3) float = 'MW'
    if(data[i].itemFloat <= 0.1) float = 'FN'
    htmlString += `<div class="grid-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <figure class="weapon"><img src=${data[i].itemSrc} alt=${data[i].itemAlt}></figure>
                        <figcaption>${data[i].itemAlt} ${data[i].itemName}</figcaption><p>Float Value: ${data[i].itemFloat} | ${float}</p><p>RM${data[i].itemPrice.toFixed(2)}</p><button class="addCartBttn"><i class="fa-solid fa-sack-dollar"></i></button>
                    </div>`
}

gridContainer.innerHTML = htmlString

