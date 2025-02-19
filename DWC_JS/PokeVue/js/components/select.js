const PokemonSelection = {
    template: `
        <div class="pokemon-selection">
            <h2>Select Pokémon</h2>
            <div v-for="pokemon in allPokemons" :key="pokemon.id" class="pokemon-item">
                <img :src="getPokemonImage(pokemon.id)" alt="Pokemon">
                <p>{{ pokemon.name }}</p>
                <button @click="selectPokemon(pokemon.id)">Select</button>
            </div>
            <button @click="confirmSelection">Confirm</button>
        </div>
    `,
    props: {
        allPokemons: Array,
        side: String
    },
    methods: {
        getPokemonImage(id) {
            return `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/${id}.png`;
        },
        selectPokemon(id) {
            this.$emit('select-pokemon', id);
        },
        confirmSelection() {
            this.$emit('confirm-selection');
        }
    }
};