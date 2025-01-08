const wrapper = document.querySelector(".sliderWrapper");
const menuItems = document.querySelectorAll(".menuItem");

const products = [
  {
    id: 1,
    title: "Brilliant Stars Booster Pack",
    price: 44.99,
    description: "This Build & Battle Box includes a 40-card deck (which contains one of four exclusive foil promo cards) and four booster packs from Pokémon TCG: Sword & Shield—Brilliant Stars. The deck inside comes ready to play, and you can enhance it with the cards you find in the booster packs!",
    colors: [
        {
            title: "Brilliant Stars Booster Pack",
            code: "white",
            price: 44.99,
            img: "./img/pack1.png",
        },
        {
            title: "Charizard Pack",
            code: "orange",
            price: 7.49,
            img: "./img/charizard.png",
        },
        {
            title: "Arceus Pack",
            code: "gold",
            price: 10.55,
            img: "./img/arceus.png",
        },
        {
            title: "Whimsicott Pack",
            code: "#76604C",
            price: 9.49,
            img: "./img/whimsicot.png",
        },
        {
            title: "Shaymin Pack",
            code: "green",
            price: 9.49,
            img: "./img/shaymin.png",
        },
    ],
  },
  {
    id: 2,
    title: "Lost Origin Booster Pack",
    price: 32.75,
    description: "This Build & Battle Box includes a 40-card deck (which contains one of four exclusive foil promo cards) and four booster packs from Pokémon TCG: Sword & Shield—Lost Origin. The deck inside comes ready to play, and you can enhance it with the cards you find in the booster packs!",
    colors: [
        {
            title: "Lost Origin Booster Pack",
            code: "white",
            price: 32.75,
            img: "./img/pack2.png",
        },
        {
            title: "Hisuian Pack",
            code: "#ad1a0c",
            price: 10.25,
            img: "./img/hisuain.png",
        },
        {
            title: "Giratina Pack",
            code: "maroon",
            price: 10.25,
            img: "./img/gira.png",
        },
        {
            title: "Enamorous Pack",
            price: 10.25,
            code: "pink",
            img: "./img/Ena.png",
        },
        {
            title: "Shiny Gardevior Pack",
            price: 12.25,
            code: "skyblue",
            img: "./img/gard.png",
        },
    ],
  },
  {
    id: 3,
    title: "Paldean Fates Booster Pack",
    price: 21.99,
    description: "The spotlight glistens on Shiny Pokémon making their fated return to the Pokémon TCG! Shiny Pikachu blazes the path forward as Tinkaton, Ceruledge, Dondozo, and more than 100 other Shiny Pokémon follow. Meanwhile, Great Tusk and Iron Treads appear as Ancient and Future Pokémon ex, and Charizard, Forretress, and Espathra show off their own unique skills as Shiny Tera Pokémon ex. Shed some light and discover sparkling wonders in the Scarlet & Violet—Paldean Fates expansion!",
    colors: [
        {
            title: "Paldean Fates Booster Pack",
            price: 21.99,
            code: "white",
            img: "./img/pac3.png",
        },
        {
            title: "Pikachu Pack",
            price: 12.00,
            code: "yellow",
            img: "./img/pika.png",
        },
        {
            title: "Shiny Ceruledge Pack",
            price: 12.25,
            code: "purple",
            img: "./img/sword.png",
        },
        {
            title: "Shiny Dondozo Pack",
            price: 12.25,
            code: "skyblue",
            img: "./img/whale.png",
        },
        {
            title: "Shiny Tinkaton Pack",
            price: 12.25,
            code: "pink",
            img: "./img/hammer.png",
        },
    ],
  },
  {
    id: 4,
    title: "Scarlet & Violet Obsidian Flames",
    price: 27.99,
    description: "Red-hot embers illuminate the pitch-black night and sparks flare into an inferno as Charizard ex surges forth with newfound powers of darkness! The glittering Terastal phenomenon imbues some Pokémon ex like Tyranitar, Eiscue, and Vespiquen with different types than usual, while Dragonite ex and Greedent ex show mastery of their own inner strengths. Not to be outdone, Revavroom ex, Melmetal ex, and more Pokémon promise to change the course of battle in the Scarlet & Violet—Obsidian Flames expansion!",
    colors: [
        {
            title: "Scarlet & Violet Obsidian Flames",
            price: 27.99,
            code: "white",
            img: "./img/pack4.png",
        },
        {
            title: "Charizard Pack",
            price: 12.95,
            code: "orange",
            img: "./img/test.png",
        },
        {
            title: "Tyranitar Pack",
            price: 12.95,
            code: "darkgreen",
            img: "./img/test2.png",
        },
        {
            title: "Dragonite Pack",
            price: 12.95,
            code: "darkyellow",
            img: "./img/test3.png",
        },
        {
            title: "Revavroom Pack",
            price: 12.95,
            code: "silver",
            img: "./img/test4.png",
        },
    ],
  },
];


let chosenProduct = products[0];

const currentProductImg = document.querySelector(".productImg");
const currentProductTitle = document.querySelector(".productTitle");
const currentProductPrice = document.querySelector(".productPrice");
const currentProductDescription = document.querySelector(".productDesc");
const currentProductColors = document.querySelectorAll(".color");
const currentProductQuantities = document.querySelectorAll(".quantity");

menuItems.forEach((item, index) => {
    item.addEventListener("click", () => {
        // change the current slide
        wrapper.style.transform = `translateX(${-102 * index}vw)`

        // change the chosen product
        chosenProduct = products[index]

        // change texts of currentProduct
        currentProductTitle.textContent = chosenProduct.title;
        currentProductPrice.textContent = "$ " + chosenProduct.price;
        currentProductImg.src = chosenProduct.colors[0].img;
        currentProductDescription.textContent = chosenProduct.description;

        // assigning colors
        currentProductColors.forEach((color, index) => {
            color.style.backgroundColor = chosenProduct.colors[index].code;
        })
    });
});

// changes the product depending on which color was picked
currentProductColors.forEach((color, index) => {
    color.addEventListener("click", ()=> {
        currentProductImg.src = chosenProduct.colors[index].img;
        currentProductTitle.textContent = chosenProduct.colors[index].title;
        currentProductPrice.textContent = "$ " + chosenProduct.colors[index].price;
    })
})

// Quantity button hover
currentProductQuantities.forEach((quantity, index) => {
    quantity.addEventListener("click", () => {
        currentProductQuantities.forEach((quantity) => {
            quantity.style.backgroundColor = "white";
            quantity.style.color = "black";
        });
        quantity.style.backgroundColor = "black";
        quantity.style.color = "white";
    });
});

const productButton = document.querySelector(".productButton");
const payment = document.querySelector(".payment");
const close = document.querySelector(".close");

productButton.addEventListener("click", ()=> {
    payment.style.display = "flex";
})

close.addEventListener("click", () => {
    payment.style.display = "none";
})
