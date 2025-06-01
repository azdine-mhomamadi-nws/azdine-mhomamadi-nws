const API_URL="https://pokeapi.co/api/v2/pokemon?limit=99";
let allPokemons = []
const

// Récupère les 99 premiers Pokémon
async function fetchPokemons () {
    try {
      const reponse = await fetch("https://pokeapi.co/api/v2/pokemon?limit=99");
      if (!reponse.ok) throw new Error("Erreur HTTP : " + reponse.status);
      const data = await reponse.json;
    }}

// correction du prof 

class Pokemon {
    constructor(name,image,types){
        this.name = name
        this.image = image
        this.types = types
    }
}

async function fetchPokemons(url) {
    const res = await fetch(url);
    const data = await res.json();

    return new Pokemons(
        data.name,
        data.sprites.front_default,
        data.types.map((t)=>t.type.name)
}

async function loadPokemons() {
    try{
        const res = await fetch(API_URL);
        const data = await res.json();

        const detailsPromises=data.results.map((poke))=>
        fetchPokemonDetails(poke.url);

    ); 

    allPokemons = await Promise.all(detailsPromises);

    dis

    }
}
