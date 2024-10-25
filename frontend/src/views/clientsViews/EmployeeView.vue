<template>
    <div class="employee-view">
        <!-- Sidebar Toggle Button -->
        <div class="toggle-sidebar">
            <i class="fas" :class="isSidebarOpen ? 'fa-times' : 'fa-bars'" @click="toggleSidebar"></i>
        </div>

        <!-- Sidebar for Tab Navigation -->
        <Sidebar :isSidebarOpen="isSidebarOpen" @setActiveTab="setActiveTab" />

        <!-- Content Area -->
        <div class="content" :class="{ 'content-sidebar-closed': !isSidebarOpen }">
            <!-- Customer Profile Tab -->
            <div v-if="activeTab === 'profile'" class="tab-content">
                <h2>Customer Profile</h2>
                <img :src="customer.image" alt="Employee Profile" class="profile-image" />
                <p>Name: {{ customer.name }}</p>
                <p>Email: {{ customer.email }}</p>
                <p>Phone: {{ customer.phone }}</p>
            </div>

            <!-- Account Balance Tab -->
            <div v-if="activeTab === 'balance'" class="tab-content">
                <h2>Account Balance</h2>
                <p>Current Balance: \${{ accountBalance }}</p>
                <p>Next Payday: {{ nextPayday }}</p>
                <button @click="addFunds(10)">Add $10</button>
                <button @click="deductFunds(10)">Deduct $10</button>
            </div>

            <!-- Calendar Tab -->
            <div v-if="activeTab === 'calendar'" class="tab-content">
                <h2>Calendar</h2>
                <p>Employee can view their schedule here.</p>
                <!-- Calendar content can go here -->
            </div>

            <!-- Logout Tab -->
            <div v-if="activeTab === 'logout'" class="tab-content">
                <h2>Logout</h2>
                <button @click="logout">Click here to Logout</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Sidebar from '@/components/Sidebar.vue'; // Import Sidebar component

// State to track active tab
const activeTab = ref('profile');

// State to track if the sidebar is open
const isSidebarOpen = ref(true);

// Customer data including profile image
const customer = ref({
    name: 'John Doe',
    email: 'john.doe@example.com',
    phone: '123-456-7890',
    image: 'https://via.placeholder.com/150' // Profile image URL
});

// Account balance and payday
const accountBalance = ref(100);
const nextPayday = ref('15th of every month'); // Example payday

// Methods to add and deduct funds
const addFunds = (amount) => {
    accountBalance.value += amount;
};

const deductFunds = (amount) => {
    if (accountBalance.value >= amount) {
        accountBalance.value -= amount;
    } else {
        alert('Insufficient funds');
    }
};

// Function to log out
const logout = () => {
    alert('You have logged out successfully');
};

// Function to toggle the sidebar visibility
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

// Function to set active tab
const setActiveTab = (tab) => {
    activeTab.value = tab;
};
</script>

<style scoped>
.employee-view {
    display: flex;
    height: 100vh;
    background-color: #333;
    color: white;
    font-family: Arial, sans-serif;
}

.content {
    flex: 1;
    padding: 20px;
    background-color: #222;
    border-radius: 8px;
    margin-left: 250px;
    transition: margin-left 0.3s ease;
}

.content-sidebar-closed {
    margin-left: 0;
}

.tab-content {
    background-color: #1a1a1a;
    padding: 20px;
    border-radius: 8px;
    color: white;
}

.profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 2px solid white;
    margin-bottom: 20px;
}

button {
    padding: 10px;
    background-color: #333;
    color: white;
    border: 2px solid white;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #555;
}

.toggle-sidebar {
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 24px;
    color: white;
    cursor: pointer;
}
</style>
