<template>
    <div>
        <!-- Navigation and Manager Boxes -->
        <div class="navbar">
            <h1>Restaurant Manager</h1>
            <button class="logout-button" @click="logout">Log Out</button>
        </div>

        <div class="manager-boxes">
            <ManagerBox v-for="(box, index) in managerBoxes" :key="index" :label="box.label" :icon="box.icon"
                @click="selectManagerBox(box.component)" />
        </div>

        <!-- Display the selected component -->
        <div class="content">
            <component :is="selectedComponent" />
        </div>
    </div>
</template>

<script>
import ManagerBox from './ManagerBox.vue';
import Meals from '../ManagerItems/Meals.vue';
import Team from '../ManagerItems/Team.vue';
// Import other components like Screens, Promotions, Orders

export default {
    name: 'ManagerDashboard',
    components: {
        ManagerBox,
        Meals,
        Team,
        // Import other components here
    },
    data() {
        return {
            selectedComponent: 'Meals', // Default component to show on load
            managerBoxes: [
                { label: 'Meals', icon: 'meals-icon.png', component: 'Meals' },
                { label: 'Team', icon: 'team-icon.png', component: 'Team' },
                { label: 'Screens', icon: 'screens-icon.png', component: 'Screens' },
                { label: 'Promotions', icon: 'promotions-icon.png', component: 'Promotions' },
                { label: 'Orders', icon: 'orders-icon.png', component: 'Orders' },
            ],
        };
    },
    methods: {
        selectManagerBox(componentName) {
            this.selectedComponent = componentName;
        },
        logout() {
            // Logic for logging out
            console.log('Logged out');
        }
    },
};
</script>

<style scoped>
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #ff4d4d;
    padding: 10px;
    color: white;
}

.logout-button {
    background-color: #fff;
    color: #ff4d4d;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.manager-boxes {
    display: flex;
    justify-content: space-around;
    margin: 20px 0;
}

.content {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}
</style>
