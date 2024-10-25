<template>
    <div class="employee-view">
        <!-- Sidebar Toggle Button -->
        <div class="toggle-sidebar" @click="toggleSidebar">
            <i class="fas fa-bars"></i>
        </div>

        <!-- Sidebar for Tab Navigation -->
        <Sidebar :isSidebarOpen="isSidebarOpen" :activeTab="activeTab" @setActiveTab="setActiveTab" />

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
                <h2>Employee Information</h2>
                <p><strong>Position:</strong> {{ employeePosition }}</p>
                <p><strong>Salary:</strong> ${{ salary }}</p>
                <p><strong>Next Payday:</strong> {{ nextPayday }}</p>
                <p><strong>Working Days This Month:</strong></p>
                <ul>
                    <li v-for="day in workingDays" :key="day">{{ day }}</li>
                </ul>
            </div>

            <!-- Calendar Tab -->
            <div v-if="activeTab === 'calendar'" class="tab-content">
                <h2>Employee Schedule</h2>
                <vue-cal
                    :events="events"
                    @cell-click="addEvent"
                    :time="false"
                    :disable-views="['days']"
                    :view="'month'"
                    locale="en"
                />
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
import Sidebar from '@/components/Sidebar.vue';
import 'vue-cal/dist/vuecal.css';  // Import Vue Cal's CSS
import VueCal from 'vue-cal';      // Import Vue Cal component

// Register Vue Cal as a component
const components = { VueCal };

// State to track active tab
const activeTab = ref('calendar');

// State to track if the sidebar is open
const isSidebarOpen = ref(true);

// Customer data including profile image
const customer = ref({
    name: 'John Doe', // Example name
    email: 'john.doe@example.com', // Example email
    phone: '123-456-7890', // Example phone number
    image: 'https://via.placeholder.com/150' // Example profile image URL
});

// Events array to store employee schedule
const events = ref([
    { start: '2024-10-01', end: '2024-10-01', title: 'Shift - 9:00 AM to 5:00 PM' },
    { start: '2024-10-03', end: '2024-10-03', title: 'Shift - 1:00 PM to 9:00 PM' },
]);

// Function to log out
const logout = () => {
    alert('You have logged out successfully');
};

// Function to toggle the sidebar visibility
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

// Function to add an event on a clicked day (Optional, for event creation)
const addEvent = (date) => {
    events.value.push({
        start: date,
        end: date,
        title: 'New Shift'
    });
    alert(`Added shift on ${date}`);
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
    z-index: 1000; /* Ensure the toggle button is on top */
}
</style>
