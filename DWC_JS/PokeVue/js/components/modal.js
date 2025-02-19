const StartModal = {
    template: `
        <div class="start-modal">
            <div class="modal-content">
                <h2>Choose Mode</h2>
                <button @click="choosePVE">PVE</button>
                <button @click="choosePVP">PVP</button>
            </div>
        </div>
    `,
    methods: {
        choosePVE() {
            this.$emit('choose-mode', 'PVE');
        },
        choosePVP() {
            this.$emit('choose-mode', 'PVP');
        }
    }
};