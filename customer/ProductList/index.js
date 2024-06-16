const data = [{
    itemName:'Headshot',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJegJK6d2yq5ODmOPLO7TdmVRd4cJ5nqfF8dWi0FfjrRFlYGyhI9DEJAc8Z13TrALswey508S-v8_JmyAw73Uk-z-DyPm3Zsr8',
    itemAlt: '',
    itemPrice:99.80,
    itemFloat:0.41,
},{
    itemName:'BloodSport',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhnwMzJemkV0966m4-PhOf7Ia_ummJW4NE_2LyV89Wt0QewqBE6Z2-lcY6UJlRrMF7SqQTvyO7shsK5v5idn3Rn6D5iuyjFoprsug',
    itemAlt: '',
    itemPrice:400.60,
    itemFloat:0.71,
},{
    itemName:'Wild Fire',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhjxszFJTwT09S5g4yCmfDLP7LWnn8f6pIl2-yYp9SnjA23-BBuNW-iLI-XJgFsZQyG_VW2lOq918e8uszLn2wj5HeAvkVdtQ',
    itemAlt: '',
    itemPrice:120.00,
    itemFloat:0.31,
},{
    itemName:'Emphorosaur-S',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpou-6kejhz2v_Nfz5H_uO1gb-Gw_alIITXk25V4ct2te_T8ILvkWu5rhc1JjTtIobBcwA-ZV-G_lHvwuzr15fq75WamHRm6Scj4XiJmB3hhB8ea-FnhOveFwthv4bIjg',
    itemAlt: '',
    itemPrice:14.40,
    itemFloat:0.81,
},{
    itemName:'Headshot',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJegJK6d2yq5ODmOPLO7TdmVRd4cJ5nqfF8dWi0FfjrRFlYGyhI9DEJAc8Z13TrALswey508S-v8_JmyAw73Uk-z-DyPm3Zsr8',
    itemAlt: '',
    itemPrice:50.60,
    itemFloat:0.95,
},{
    itemName:'Headshot',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJegJK6d2yq5ODmOPLO7TdmVRd4cJ5nqfF8dWi0FfjrRFlYGyhI9DEJAc8Z13TrALswey508S-v8_JmyAw73Uk-z-DyPm3Zsr8',
    itemAlt: '',
    itemPrice:70.89,
    itemFloat:0.61,
},{
    itemName:'Headshot',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJegJK6d2yq5ODmOPLO7TdmVRd4cJ5nqfF8dWi0FfjrRFlYGyhI9DEJAc8Z13TrALswey508S-v8_JmyAw73Uk-z-DyPm3Zsr8',
    itemAlt: '',
    itemPrice:100.80,
    itemFloat:0.01,
},{
    itemName:'Headshot',
    itemSrc: 'https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXH5ApeO4YmlhxYQknCRvCo04DEVlxkKgpot7HxfDhjxszJegJK6d2yq5ODmOPLO7TdmVRd4cJ5nqfF8dWi0FfjrRFlYGyhI9DEJAc8Z13TrALswey508S-v8_JmyAw73Uk-z-DyPm3Zsr8',
    itemAlt: '',
    itemPrice:30.70,
    itemFloat:0.01,
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
                        <figcaption>${data[i].itemAlt} ${data[i].itemName}</figcaption><p>Float Value: ${data[i].itemFloat} | ${float}</p><p>RM${data[i].itemPrice.toFixed(2)}</p><button class="addCartBttn"><i class="fa-solid fa-cart-shopping"></i></button>
                    </div>`
}

gridContainer.innerHTML = htmlString

