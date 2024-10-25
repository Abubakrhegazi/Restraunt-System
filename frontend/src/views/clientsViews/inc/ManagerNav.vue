<template>
    <nav class="navbar">
        <h1>Restaurant Manager</h1>
        <button class="logout-button" @click="logout">Log Out</button>
    </nav>
</template>

<script>
export default {
    name: 'NavBar',
    methods: {
        logout() {
            // You can add logic for log out, for now it just alerts
            alert('Logging out...');
        },
    },
};
</script>

<style scoped>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #f44d43;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.logout-button {
    background-color: white;
    color: #f44d43;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.logout-button:hover {
    background-color: #ffddd5;
}
</style>
