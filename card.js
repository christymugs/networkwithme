class Card{
    constructor({
        imageUrl,
    }){
        this.imageUrl = imageUrl
        this.#init()
    }

    #init = () =>{
        const card = document.createElement('div');
        card.classList.add('card');
        const img = document.createElement('img')
        img.src = this.imageUrl;
        card.append(img);
        this.element = card;
    }
}