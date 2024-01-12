// JavaScript

const swiper = document.querySelector('#swiper');
const network = document.querySelector('#network');
const no = document.querySelector('#no');

// Local paths to your images
const localImagePaths = [
    '1.jpg',
    '2.jpg',
    '3.jpg',
    '4.jpg',
    '5.jpg'
];

// Constants
const urls = localImagePaths.map(path => `file://${path}`);

// Variables
let cardCount = 0;

function appendNewCard() {
    const card = new Card({
        imageUrl: urls[cardCount % 5],
        onDismiss: appendNewCard,
        onNetwork: () => {
            network.style.animationPlayState = 'running';
            network.classList.toggle('trigger');
        },
        onNo: () => {
            no.style.animationPlayState = 'running';
            no.classList.toggle('trigger');
        }
    });

    swiper.append(card.element);
    cardCount++;

    const cards = swiper.querySelectorAll('.card:not(.dismissing)');
    cards.forEach((card, index) => {
        card.style.setProperty('--i', index);
    });
}

// First 5
for (let i = 0; i < 5; i++) {
    appendNewCard();
}

