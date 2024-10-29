<template>
    <div class="screens-section">
        <h2>Select a Screen</h2>
        <div class="screens-container">
            <div class="screen-option" @click="goToCashier">
                <h3>Cashier Screen</h3>
            </div>
            <div class="screen-option" @click="goToChef">
                <h3>Chef's Screen</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        goToCashier() {
            // Route to Cashier Screen
            this.$router.push({ name: 'cashier' }); // Adjust the route name as per your router configuration
        },
        goToChef() {
            // Route to Chef's Screen
            this.$router.push({ name: 'chef' }); // Adjust the route name as per your router configuration
        },
    },
};
</script>

<style scoped>
.screens-section {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
}

.screens-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    /* Space between options */
}

.screen-option {
    background-color: #007bff;
    color: white;
    padding: 30px;
    border-radius: 8px;
    cursor: pointer;
    transition: transform 0.3s ease, background-color 0.3s ease;
    width: 150px;
    /* Fixed width for the options */
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.screen-option:hover {
    transform: translateY(-10px);
    background-color: #0056b3;
}
</style>
