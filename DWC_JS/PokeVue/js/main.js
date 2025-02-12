const app = Vue.createApp({
    data() {
        return {
            allPokemons: [],
            selectedPokemonsLeft: [],
            selectedPokemonsRight: [],
            selectedPokemonsInModal: { player1: [], player2: [] },
            draggedPokemon: null,
            draggedFrom: null,
            centerPokemons: [],
            savedPokemons: {},
            showWelcomeModal: true,
            showPvEModal: false,
            showPvPModal: false,
            currentMode: null
        };
    },

    methods: {
        generateRandomNumbers() {
            return Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1);
        },

        async fetchAllPokemons() {
            try {
                const response = await fetch('https://pokeapi.co/api/v2/pokemon?limit=151');
                const data = await response.json();
                this.allPokemons = data.results.map((pokemon, index) => ({
                    id: index + 1,
                    name: pokemon.name
                }));
            } catch (error) {
                console.error("Error fetching all Pokémon:", error);
            }
        },

        openWelcomeModal() {
            this.showWelcomeModal = true;
            document.getElementById('welcomeModal').style.display = 'block';
        },

        closeWelcomeModal() {
            this.showWelcomeModal = false;
            document.getElementById('welcomeModal').style.display = 'none';
        },

        openPvEModal() {
            this.showPvEModal = true;
            document.getElementById('pveModal').style.display = 'block';
        },

        closePvEModal() {
            this.showPvEModal = false;
            document.getElementById('pveModal').style.display = 'none';
        },

        openPvPModal() {
            this.showPvPModal = true;
            document.getElementById('pvpModal').style.display = 'block';
        },

        closePvPModal() {
            this.showPvPModal = false;
            document.getElementById('pvpModal').style.display = 'none';
        },

        startPvE() {
            this.currentMode = 'pve';
            this.closeWelcomeModal();
            this.openPvEModal();
        },

        startPvP() {
            this.currentMode = 'pvp';
            this.closeWelcomeModal();
            this.openPvPModal();
        },

        isSelected(pokemon, player) {
            if (player) {
                return this.selectedPokemonsInModal[player].some(p => p.id === pokemon.id);
            }
            return this.selectedPokemonsInModal.player1.some(p => p.id === pokemon.id) ||
                   this.selectedPokemonsInModal.player2.some(p => p.id === pokemon.id);
        },

        selectPokemon(pokemon, player = 'player1') {
            if (this.isSelected(pokemon, player)) {
                // Deselect if already selected
                this.selectedPokemonsInModal[player] = this.selectedPokemonsInModal[player].filter(p => p.id !== pokemon.id);
            } else if (this.selectedPokemonsInModal[player].length < 5) {
                // Select if less than 5 are selected
                this.selectedPokemonsInModal[player].push(pokemon);
            }

            // If 5 Pokémon are selected for both players in PvP mode, close the modal
            if (this.currentMode === 'pvp' && 
                this.selectedPokemonsInModal.player1.length === 5 && 
                this.selectedPokemonsInModal.player2.length === 5) {
                this.selectedPokemonsLeft = [...this.selectedPokemonsInModal.player1];
                this.selectedPokemonsRight = [...this.selectedPokemonsInModal.player2];
                this.closePvPModal();
            }

            // If 5 Pokémon are selected in PvE mode, close the modal
            if (this.currentMode === 'pve' && this.selectedPokemonsInModal.player1.length === 5) {
                this.selectedPokemonsLeft = [...this.selectedPokemonsInModal.player1];
                this.closePvEModal();
            }
        },

        handleDragStart(pokemonId, side) {
            this.draggedPokemon = pokemonId;
            this.draggedFrom = side;
        },

        async handleDrop(event) {
            event.preventDefault();
            if (!this.draggedPokemon) return;

            const pokemonId = this.draggedPokemon;
            if (this.savedPokemons[pokemonId]) {
                console.log(`Using cached data for ${this.savedPokemons[pokemonId].name}`);
                return this.placePokemonInCenter(this.savedPokemons[pokemonId]);
            }

            try {
                const data = await this.fetchPokemonData(pokemonId);
                this.savedPokemons[pokemonId] = data;
                this.placePokemonInCenter(data);
            } catch (error) {
                console.error("Error fetching Pokémon data:", error);
            }
        },

        async fetchPokemonData(pokemonId) {
            const response = await fetch(`https://pokeapi.co/api/v2/pokemon/${pokemonId}`);
            const data = await response.json();

            const stats = {
                hp: data.stats[0].base_stat,
                attack: data.stats[1].base_stat,
                defense: data.stats[2].base_stat,
                speed: data.stats[5].base_stat
            };

            const selectedMoves = await this.fetchPokemonMoves(data.moves);
            return {
                id: pokemonId,
                src: this.getPokemonSpriteUrl(pokemonId, this.draggedFrom),
                class: this.draggedFrom === 'right' ? 'overlay-image-right' : 'overlay-image-left',
                name: data.name,
                moves: selectedMoves,
                stats
            };
        },

        async fetchPokemonMoves(movesList) {
            let allMoves = movesList.map(move => move.move.url);
            let selectedMoves = [];

            while (selectedMoves.length < 4 && allMoves.length > 0) {
                let randomIndex = Math.floor(Math.random() * allMoves.length);
                let moveUrl = allMoves.splice(randomIndex, 1)[0];

                try {
                    const moveData = await this.fetchMoveData(moveUrl);
                    if (moveData.power > 1) {
                        selectedMoves.push(moveData);
                    }
                } catch (error) {
                    console.error("Error fetching move data:", error);
                }
            }
            return selectedMoves;
        },

        async fetchMoveData(moveUrl) {
            const response = await fetch(moveUrl);
            const data = await response.json();
            return {
                name: data.name.toUpperCase(),
                accuracy: data.accuracy ?? 0,
                power: data.past_values[0]?.power ?? data.power ?? 0,
                movePP: data.past_values[0]?.pp ?? data.pp ?? 0,
                remainMovePP: data.past_values[0]?.pp ?? data.pp ?? 0
            };
        },

        getPokemonSpriteUrl(pokemonId, side) {
            return side === 'right' 
                ? `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokemonId}.png`
                : `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/${pokemonId}.png`;
        },

        placePokemonInCenter(pokemonEntry) {
            this.centerPokemons = this.centerPokemons.filter(pokemon => pokemon.class !== pokemonEntry.class);
            this.centerPokemons.push(pokemonEntry);
            this.updateBattleMoves(pokemonEntry.moves);
            this.draggedPokemon = null;
            this.draggedFrom = null;
        },

        updateBattleMoves(moves) {
            document.querySelectorAll('.fight-buttons button').forEach((button, index) => {
                if (moves[index]) {
                    button.textContent = moves[index].name;
                    button.onclick = () => this.useMove(moves, index);
                    button.onmouseenter = () => this.displayMoveStats(moves[index]);
                    button.onmouseleave = () => this.clearMoveStats();
                } else {
                    button.textContent = "-";
                    button.onclick = null;
                }
            });
        },

        displayMoveStats(move) {
            document.querySelector('.movePP').textContent = `MV PP: ${move.remainMovePP}/${move.movePP}`;
            document.querySelector('.power').textContent = `Power: ${move.power || 'N/A'}`;
            document.querySelector('.acc').textContent = `ACC: ${move.accuracy || 'N/A'}`;
        },

        clearMoveStats() {
            document.querySelector('.movePP').textContent = "MV PP: -/-";
            document.querySelector('.power').textContent = "Power: -";
            document.querySelector('.acc').textContent = "ACC: -";
        },

        useMove(moves, index) {
            if (!this.centerPokemons.length) {
                console.log("No Pokémon in the center to use a move!");
                return;
            }

            let move = moves[index];
            if (move.movePP === 0 || move.remainMovePP > 0) {
                move.remainMovePP = move.movePP === 0 ? move.remainMovePP : move.remainMovePP - 1;
                console.log(`${move.name} used! Remaining PP: ${move.remainMovePP}/${move.movePP}`);
                this.displayMoveStats(move);
            } else {
                console.log(`${move.name} has no PP left!"`);
            }
        },

        handleDragOver(event) {
            event.preventDefault();
        }
    },

    mounted() {
        this.fetchAllPokemons();
        this.openWelcomeModal();
    }
});