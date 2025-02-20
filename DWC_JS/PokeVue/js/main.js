const StartModal = {
    data() {
        return {
            step: 'mode', // 'mode', 'select-left', 'select-right'
            selectedPokemonsLeft: [],
            selectedPokemonsRight: [],
            allPokemons: [],
            mode: null,
        };
    },
    async created() {
        const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=151');
        const data = await response.json();
        this.allPokemons = data.results.map((pokemon, index) => ({
            id: index + 1,
            name: pokemon.name,
            image: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${index + 1}.png`
        }));
    },
    template: `
        <div class="start-modal">
            <div v-if="step === 'mode'" class="modal-content">
                <h2>Choose Mode</h2>
                <button class="mode-btn" @click="chooseMode('PVE')">PVE</button>
                <button class="mode-btn" @click="chooseMode('PVP')">PVP</button>
            </div>

            <div v-else class="modal-content">
                <h2>{{ step === 'select-left' ? 'Select Pokémon for Left Side' : 'Select Pokémon for Right Side' }}</h2>
                <div class="pokemon-grid">
                    <div v-for="pokemon in allPokemons" 
                        :key="pokemon.id" 
                        class="pokemon-item"
                        :class="{
                            selected: currentSelection.includes(pokemon), 
                            disabled: isPokemonDisabled(pokemon)
                        }"
                        @click="selectPokemon(pokemon)">
                        <img :src="pokemon.image" :alt="pokemon.name">
                        <p>{{ pokemon.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    `,
    computed: {
        currentSelection() {
            return this.step === 'select-left' ? this.selectedPokemonsLeft : this.selectedPokemonsRight;
        }
    },
    methods: {
        chooseMode(mode) {
            this.mode = mode;
            this.step = 'select-left';
        },
        isPokemonDisabled(pokemon) {
            return this.step === 'select-right' && this.selectedPokemonsLeft.some(p => p.id === pokemon.id);
        },
        selectPokemon(pokemon) {
            if (this.isPokemonDisabled(pokemon)) return; // Prevent selecting disabled Pokémon
    
            let selectionArray = this.step === 'select-left' ? this.selectedPokemonsLeft : this.selectedPokemonsRight;
    
            if (selectionArray.length < 5 && !selectionArray.some(p => p.id === pokemon.id)) {
                selectionArray.push(pokemon);
            }
    
            if (selectionArray.length === 5) {
                this.autoProceed();
            }
        },
        autoProceed() {
            if (this.mode === 'PVP' && this.step === 'select-left') {
                this.step = 'select-right';  // Move to right-side selection
            } else {
                this.$emit('select-pokemons', { 
                    mode: this.mode,   // 🔹 Include mode in the emitted event
                    left: this.selectedPokemonsLeft, 
                    right: this.selectedPokemonsRight 
                });
                this.$emit('close-modal');
            }
        }
        
    }
};


// --- MAIN ---

const app = Vue.createApp({
    components: {
        'start-modal': StartModal
    },
    data() {
        return {
            showStartModal: true,
            mode: null,
            allPokemons: [],
            selectedPokemonsLeft: [],
            selectedPokemonsRight: [],
            randomNumbersLeft: [],
            randomNumbersRight: [],
            draggedPokemon: null,
            draggedFrom: null,
            centerPokemons: [],
            savedPokemons: {},
            pokemonsData: {},
            hoveredPokemonId: null,
            activePokemonLeft: null,  // NEW: Store active Pokémon for the left side
            activePokemonRight: null  // NEW: Store active Pokémon for the right side
        };
    },
    
    computed: {
        leftPokemonName() {
            return this.activeLeftPokemon ? this.activeLeftPokemon.name : '???';
        },
        rightPokemonName() {
            return this.activeRightPokemon ? this.activeRightPokemon.name : '???';
        },
        leftPokemonHP() {
            return this.activeLeftPokemon ? `${this.activeLeftPokemon.stats.currHP}/${this.activeLeftPokemon.stats.maxHP}` : '--/--';
        },
        rightPokemonHP() {
            return this.activeRightPokemon ? `${this.activeRightPokemon.stats.currHP}/${this.activeRightPokemon.stats.maxHP}` : '--/--';
        },
        leftHPBarStyle() {
            if (!this.activeLeftPokemon) return { width: '0%' };
            return { width: `${(this.activeLeftPokemon.stats.currHP / this.activeLeftPokemon.stats.maxHP) * 100}%` };
        },
        rightHPBarStyle() {
            if (!this.activeRightPokemon) return { width: '0%' };
            return { width: `${(this.activeRightPokemon.stats.currHP / this.activeRightPokemon.stats.maxHP) * 100}%` };
        }
    },        
    async created() {
        await this.fetchAllPokemons();
    },
    methods: {
        async fetchAllPokemons() {
            const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=151');
            const data = await response.json();
            this.allPokemons = data.results.map((pokemon, index) => ({
                id: index + 1,
                name: pokemon.name
            }));
        },
        chooseMode(mode) {
            this.mode = mode;
            this.showStartModal = false;
            if (mode === 'PVE') {
                this.showPokemonSelection('left');
            } else if (mode === 'PVP') {
                this.showPokemonSelection('left');
            }
        },

        async fetchSelectedPokemonsData(pokemonIds) {
            for (const id of pokemonIds) {
                const apiUrl = `https://pokeapi.co/api/v2/pokemon/${id}`;
                try {
                    const response = await fetch(apiUrl);
                    const data = await response.json();
        
                    let selectedMoves = [];
                    let allMoves = data.moves.map(move => move.move.url);
        
                    while (selectedMoves.length < 4 && allMoves.length > 0) {
                        let randomIndex = Math.floor(Math.random() * allMoves.length);
                        let moveUrl = allMoves[randomIndex];
        
                        const moveResponse = await fetch(moveUrl);
                        const moveData = await moveResponse.json();
        
                        let power = moveData.past_values.length > 0 ? moveData.past_values[0].power : moveData.power;
                        let accuracy = moveData.accuracy;
                        let movePP = moveData.past_values.length > 0 ? moveData.past_values[0].pp : moveData.pp;
                        let remainMovePP = movePP;
        
                        power = power ?? 0;
                        accuracy = accuracy ?? 0;
                        movePP = movePP ?? 0;
                        remainMovePP = remainMovePP ?? 0;
        
                        if (power > 1) {
                            selectedMoves.push({
                                name: moveData.name.toUpperCase(),
                                accuracy: accuracy,
                                power: power,
                                movePP: movePP,
                                remainMovePP: remainMovePP
                            });
                        }
        
                        allMoves.splice(randomIndex, 1);
                    }
        
                    this.pokemonsData[id] = {
                        id,
                        src: `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${id}.png`,
                        name: data.name.toUpperCase(),
                        stats: {
                            maxHP: data.stats[0].base_stat,
                            currHP: data.stats[0].base_stat,
                            ATK: data.stats[1].base_stat,
                            DEF: data.stats[2].base_stat,
                            SPD: data.stats[5].base_stat
                        },
                        moves: selectedMoves
                    };
        
                } catch (error) {
                    console.error(`Error fetching Pokémon data for ID ${id}:`, error);
                }
            }
        },        

        async handleSelectedPokemons({ mode, left, right }) {
            this.mode = mode;  // 🔹 Store the selected mode
        
            this.selectedPokemonsLeft = left.map(pokemon => pokemon.id);
            this.randomNumbersLeft = [...this.selectedPokemonsLeft];
        
            if (this.mode === 'PVE') {
                // Generate 5 random Pokémon for the right side
                let randomIds = [];
                while (randomIds.length < 5) {
                    let randomId = Math.floor(Math.random() * 151) + 1;
                    if (!randomIds.includes(randomId) && !this.randomNumbersLeft.includes(randomId)) {
                        randomIds.push(randomId);
                    }
                }
                this.selectedPokemonsRight = randomIds.map(id => 
                    this.allPokemons.find(pokemon => pokemon.id === id)
                );
                this.randomNumbersRight = [...randomIds];
            } else {
                // PvP mode: Right side was selected by the second player
                this.selectedPokemonsRight = right.map(pokemon => pokemon.id);
                this.randomNumbersRight = [...this.selectedPokemonsRight];
            }
        
            await this.fetchSelectedPokemonsData(this.selectedPokemonsLeft);
            await this.fetchSelectedPokemonsData(this.selectedPokemonsRight);
        
            this.activeLeftPokemon = this.pokemonsData[this.selectedPokemonsLeft[0]];
            this.activeRightPokemon = this.pokemonsData[this.selectedPokemonsRight[0]];
        
            this.showStartModal = false;
        },        

        handleDragStart(pokemonId, side) {
            this.draggedPokemon = pokemonId;
            this.draggedFrom = side;
        },
        handleDrop(event) {
            event.preventDefault();
            if (this.draggedPokemon) {
                const pokemonId = this.draggedPokemon;
                const pokemonEntry = {
                    ...this.pokemonsData[pokemonId],
                    src: this.draggedFrom === 'right' 
                        ? `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokemonId}.png`
                        : `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/${pokemonId}.png`,
                    class: this.draggedFrom === 'right' ? 'overlay-image-right' : 'overlay-image-left'
                };
                
                this.placePokemonInCenter(pokemonEntry);
            }
        },
        placePokemonInCenter(pokemonEntry) {
            this.centerPokemons = this.centerPokemons.filter(pokemon => pokemon.class !== pokemonEntry.class);
            this.centerPokemons.push(pokemonEntry);
        
            // Determine if the Pokémon is from the left or right
            if (this.draggedFrom === 'left') {
                this.activePokemonLeft = pokemonEntry;
            } else if (this.draggedFrom === 'right') {
                this.activePokemonRight = pokemonEntry;
            }
        
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
        },
        showStats(pokemonId) {
            this.hoveredPokemonId = pokemonId;
        },
        hideStats() {
            this.hoveredPokemonId = null;
        },
        handleDragOver(event) {
            event.preventDefault();
        }
    }
});

app.mount('#app');