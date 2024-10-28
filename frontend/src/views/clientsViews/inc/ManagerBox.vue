<template>
    <button class="box" @click="handleClick">
        <img :src="icon" alt="icon" class="box-icon" />
        <p class="box-label">{{ label }}</p>
    </button>
</template>

<script>
export default {
    name: 'ManagerBox',
    props: {
        label: String,
        icon: String,
    },
    methods: {
        handleClick() {
            this.$emit('selectSection', this.label); // Emit the label when button is clicked
        },
    },
};
</script>

<style scoped>
.box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    cursor: pointer;
    width: 165px;
    height: 140px;
    border: none;
    /* Removes default button border */
    outline: none;
    /* Removes outline on focus */
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.box:active {
    transform: translateY(0);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.box-icon {
    width: 50px;
    height: 50px;
    margin-bottom: 15px;
}

.box-label {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
}
</style>
