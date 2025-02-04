const app = Vue.createApp({
    data() {
        return {
            randomNumbersLeft: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
            randomNumbersRight: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
            draggedPokemon: null,
            draggedFrom: null,
            centerPokemons: [] // Array to store Pokémon in the center
        };
    },

    methods: {
        handleDragStart(pokemonId, side) {
            this.draggedPokemon = pokemonId;
            this.draggedFrom = side;
        },

        handleDrop(event) {
            event.preventDefault();
            
            if (this.draggedPokemon) {
                const apiUrl = `https://pokeapi.co/api/v2/pokemon/${this.draggedPokemon}`;
                
                // Fetch the Pokémon name from the API
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        let pokemonEntry = {
                            id: this.draggedPokemon,
                            src: this.draggedFrom === 'right' 
                                ? `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${this.draggedPokemon}.png`
                                : `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/${this.draggedPokemon}.png`,
                            class: this.draggedFrom === 'right'
                                ? 'overlay-image-right'
                                : 'overlay-image-left',
                            name: data.name // Store the Pokémon's name from the API
                        };
                        
                        // Remove any existing Pokémon of the same type (left or right)
                        this.centerPokemons = this.centerPokemons.filter(pokemon => pokemon.class !== pokemonEntry.class);
                        
                        // Add the new Pokémon
                        this.centerPokemons.push(pokemonEntry);
                        
                        // Reset drag state
                        this.draggedPokemon = null;
                        this.draggedFrom = null;
                    })
                    .catch(error => console.error("Error fetching Pokémon data:", error));
            }
        },

        handleDragOver(event) {
            event.preventDefault();
        }
    }
});