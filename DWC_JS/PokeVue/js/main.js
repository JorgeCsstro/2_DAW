const app = Vue.createApp({
    data() {
        return {
            randomNumbersLeft: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
            randomNumbersRight: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
            draggedPokemon: null,
            draggedFrom: null,
            centerPokemons: [], // Array to store Pokémon in the center
            savedPokemons: {}
        };
    },

    methods: {
        handleDragStart(pokemonId, side) {
            this.draggedPokemon = pokemonId;
            this.draggedFrom = side;
        },

        async handleDrop(event) {
            event.preventDefault();
        
            if (this.draggedPokemon) {
                const pokemonId = this.draggedPokemon;
        
                // Check if Pokémon is already saved
                if (this.savedPokemons[pokemonId]) {
                    console.log(`Using cached moves for ${this.savedPokemons[pokemonId].name}`);
                    this.placePokemonInCenter(this.savedPokemons[pokemonId]);
                    return;
                }
        
                const apiUrl = `https://pokeapi.co/api/v2/pokemon/${pokemonId}`;
        
                try {
                    const response = await fetch(apiUrl);
                    const data = await response.json();
        
                    let allMoves = data.moves.map(move => move.move.url);
                    let selectedMoves = [];
        
                    if (allMoves.length > 0) {
                        for (let i = 0; i < Math.min(4, allMoves.length); i++) {
                            let randomIndex = Math.floor(Math.random() * allMoves.length);
                            let moveUrl = allMoves[randomIndex];
        
                            const moveResponse = await fetch(moveUrl);
                            const moveData = await moveResponse.json();
        
                            selectedMoves.push({
                                name: moveData.name,
                                accuracy: moveData.accuracy,
                                power: moveData.past_values.length > 0 ? moveData.past_values[0].power : moveData.power,
                                maxPP: moveData.past_values.length > 0 ? moveData.past_values[0].pp : moveData.pp,
                                currentPP: moveData.past_values.length > 0 ? moveData.past_values[0].pp : moveData.pp // Start at max PP
                            });
        
                            allMoves.splice(randomIndex, 1);
                        }
                    }
        
                    let pokemonEntry = {
                        id: this.draggedPokemon,
                        src: this.draggedFrom === 'right'
                            ? `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${this.draggedPokemon}.png`
                            : `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/${this.draggedPokemon}.png`,
                        class: this.draggedFrom === 'right' ? 'overlay-image-right' : 'overlay-image-left',
                        name: data.name,
                        moves: selectedMoves
                    };
        
                    this.savedPokemons[pokemonId] = pokemonEntry;
                    this.placePokemonInCenter(pokemonEntry);
        
                } catch (error) {
                    console.error("Error fetching Pokémon data:", error);
                }
            }
        },

        placePokemonInCenter(pokemonEntry) {
            // Remove existing Pokémon from the same side
            this.centerPokemons = this.centerPokemons.filter(pokemon => pokemon.class !== pokemonEntry.class);
            this.centerPokemons.push(pokemonEntry);

            // Update the battle UI with moves
            this.updateBattleMoves(pokemonEntry.moves);

            // Reset drag state
            this.draggedPokemon = null;
            this.draggedFrom = null;
        },

        updateBattleMoves(moves) {
            const moveButtons = document.querySelectorAll('.fight-buttons button');
        
            moveButtons.forEach((button, index) => {
                if (moves[index]) {
                    button.textContent = `${moves[index].name}`;
                    button.onclick = () => this.useMove(moves, index);
                } else {
                    button.textContent = "-";
                    button.onclick = null;
                }
            });
        },

        useMove(moves, index) {
            if (moves[index].currentPP > 0) {
                moves[index].currentPP -= 1; // Reduce PP by 1
                console.log(`${moves[index].name} used! PP left: ${moves[index].currentPP}`);
                
                // Update the battle UI
                this.updateBattleMoves(moves);
            } else {
                console.log(`${moves[index].name} has no PP left!`);
            }
        },

        handleDragOver(event) {
            event.preventDefault();
        }
    }
});
