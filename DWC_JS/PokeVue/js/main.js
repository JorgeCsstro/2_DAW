const app = Vue.createApp({
    data() {
        return {
            randomNumbersLeft: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
            randomNumbersRight: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
            draggedPokemon: null,
            draggedFrom: null,
            centerPokemons: [],
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
        
                if (this.savedPokemons[pokemonId]) {
                    console.log(`Using cached data for ${this.savedPokemons[pokemonId].name}`);
                    this.placePokemonInCenter(this.savedPokemons[pokemonId]);
                    return;
                }
        
                const apiUrl = `https://pokeapi.co/api/v2/pokemon/${pokemonId}`;
                
                try {
                    const response = await fetch(apiUrl);
                    const data = await response.json();
                    
                    const hp = data.stats[0].base_stat;
                    const attack = data.stats[1].base_stat;
                    const defense = data.stats[2].base_stat;
                    const speed = data.stats[5].base_stat;
                    
                    let allMoves = data.moves.map(move => move.move.url);
                    let selectedMoves = [];
        
                    while (selectedMoves.length < 4 && allMoves.length > 0) {
                        let randomIndex = Math.floor(Math.random() * allMoves.length);
                        let moveUrl = allMoves[randomIndex];
                        
                        const moveResponse = await fetch(moveUrl);
                        const moveData = await moveResponse.json();
                        
                        let power = moveData.past_values.length > 0 ? moveData.past_values[0].power : moveData.power;
                        let accuracy = moveData.accuracy;
                        let movePP = moveData.past_values.length > 0 ? moveData.past_values[0].pp : moveData.pp;
                        let remainMovePP = movePP;
        
                        // Replace null values with 0
                        power = power ?? 0;
                        accuracy = accuracy ?? 0;
                        movePP = movePP ?? 0;
                        remainMovePP = remainMovePP ?? 0;
        
                        // Ensure move has power greater than 1
                        if (power > 1) {
                            selectedMoves.push({
                                name: (moveData.name).toUpperCase(),
                                accuracy: accuracy,
                                power: power,
                                movePP: movePP,
                                remainMovePP: remainMovePP
                            });
                        }
        
                        // Remove move from list to avoid duplicates
                        allMoves.splice(randomIndex, 1);
                    }
                    
                    let pokemonEntry = {
                        id: this.draggedPokemon,
                        src: this.draggedFrom === 'right'
                            ? `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${this.draggedPokemon}.png`
                            : `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/${this.draggedPokemon}.png`,
                        class: this.draggedFrom === 'right' ? 'overlay-image-right' : 'overlay-image-left',
                        name: data.name,
                        moves: selectedMoves,
                        stats: {
                            hp,
                            attack,
                            defense,
                            speed
                        }
                    };
        
                    this.savedPokemons[pokemonId] = pokemonEntry;
                    this.placePokemonInCenter(pokemonEntry);
                } catch (error) {
                    console.error("Error fetching Pokémon data:", error);
                }
            }
        },

        placePokemonInCenter(pokemonEntry) {
            this.centerPokemons = this.centerPokemons.filter(pokemon => pokemon.class !== pokemonEntry.class);
            this.centerPokemons.push(pokemonEntry);
            this.updateBattleMoves(pokemonEntry.moves);
            this.draggedPokemon = null;
            this.draggedFrom = null;
        },

        updateBattleMoves(moves) {
            const moveButtons = document.querySelectorAll('.fight-buttons button');
            moveButtons.forEach((button, index) => {
                if (moves[index]) {
                    button.textContent = `${moves[index].name}`;
                    button.onclick = () => this.useMove(moves, index);
                    button.onmouseenter = () => this.displayMoveStats(moves[index]);
                    button.onmouseleave = () => this.clearMoveStats();
                } else {
                    button.textContent = "-";
                    button.onclick = null;
                    button.onmouseenter = null;
                    button.onmouseleave = null;
                }
            });
        },

        displayMoveStats(move) {
            document.querySelector('.movePP').textContent = `MV PP: ${move.remainMovePP}/${move.movePP}`;
            document.querySelector('.power').textContent = `Power: ${move.power ? move.power : 'N/A'}`;
            document.querySelector('.acc').textContent = `ACC: ${move.accuracy ? move.accuracy : 'N/A'}`;
        },

        clearMoveStats() {
            document.querySelector('.movePP').textContent = "MV PP: -/-";
            document.querySelector('.power').textContent = "Power: -";
            document.querySelector('.acc').textContent = "ACC: -";
        },

        useMove(moves, index) {
            if (this.centerPokemons.length === 0) {
                console.log("No Pokémon in the center to use a move!");
                return;
            }
            
            let activePokemon = this.centerPokemons[0];
            let move = moves[index];
        
            if (move.movePP === 0) {
                // Infinite move (PP never decreases)
                console.log(`${move.name} used! (Infinite PP)`);
            } else if (move.remainMovePP > 0) {
                // Normal move usage
                move.remainMovePP -= 1;
                console.log(`${move.name} used! Remaining PP: ${move.remainMovePP}/${move.movePP}`);
                document.querySelector('.movePP').textContent = `MV PP: ${move.remainMovePP}/${move.movePP}`;
            } else {
                console.log(`${move.name} has no PP left!`);
            }
        }
        ,

        handleDragOver(event) {
            event.preventDefault();
        }
    }
});
