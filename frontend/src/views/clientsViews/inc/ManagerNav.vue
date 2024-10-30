<template>
    <nav class="navbar">
        <div class="name">
            <div class="logo"><img src="@/assets/logo/chefIcon.png" alt=""></div>
            <h1>Restaurant
                <br>Manager
            </h1>
        </div>
        <button class="logout-button" @click="logout">Log Out</button>
    </nav>
</template>

<script>
export default {
    name: 'NavBar',
    methods: {
        logout() {
            alert('Logging out...');
        },
    },
};
</script>

<style scoped>
.navbar {
    background: linear-gradient(135deg, #f9e8b2, #e8a958);
}

.name {
    display: flex;
}

.logo img {
    width: 100%;
}

.logo {
    width: 10%;
}

.name h1 {
    margin: 10px;
    color: #000000;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 10px 20px;
    background-color: #8b0000;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    height: 200px;
}

.logout-button {
    background-color: white;
    color: #8b0000;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2), 0 4px 20px rgba(0, 0, 0, 0.15);
}

.logout-button:hover {
    background-color: #ffddd5;
}
</style>
