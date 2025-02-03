
const app = Vue.createApp({
  data() {
      return {
          randomNumbersLeft: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
          randomNumbersRight: Array.from({ length: 5 }, () => Math.floor(Math.random() * 151) + 1),
          draggedPokemon: null
      };
  },

  methods: {
      handleDragStart(pokemonId) {
          this.draggedPokemon = pokemonId;
      },

      handleDrop(event) {
          event.preventDefault();
      },

      handleDragOver(event) {
          event.preventDefault();
      }
  },
});
