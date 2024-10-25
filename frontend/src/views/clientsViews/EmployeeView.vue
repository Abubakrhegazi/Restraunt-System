<template>
    <div class="employee-view">
        <Sidebar :isSidebarOpen="isSidebarOpen" @setActiveTab="setActiveTab" @toggleSidebar="toggleSidebar" />

        <div class="content" :class="{ 'content-sidebar-closed': !isSidebarOpen }">
            <div class="toggle-sidebar" @click="toggleSidebar">
                <i class="fas" :class="isSidebarOpen ? 'fa-angle-left' : 'fa-angle-right'"></i>
            </div>

            <div v-if="activeTab === 'profile'" class="tab-content">
                <h2>Employee Profile</h2>
                <img :src="customer.image" alt="Employee Profile" class="profile-image" />
                <p>Name: {{ customer.name }}</p>
                <p>Email: {{ customer.email }}</p>
                <p>Phone: {{ customer.phone }}</p>
            </div>

            <div v-if="activeTab === 'salary'" class="tab-content">
                <h2>Salary</h2>
                <p>Current Salary: \${{ currentSalary }}</p>
                <p>Next Salary Day: {{ nextSalaryDay }}</p>
            </div>

            <div v-if="activeTab === 'calendar'" class="tab-content">
                <h2>Calendar</h2>
                <p>Employee can view their schedule here.</p>
            </div>

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

const activeTab = ref('profile');
const isSidebarOpen = ref(true);
const customer = ref({
    name: 'John Doe',
    email: 'john.doe@example.com',
    phone: '123-456-7890',
    image: 'https://via.placeholder.com/150'
});
const currentSalary = ref(50000); // Example current salary
const nextSalaryDay = ref('15th of every month');

const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
};

const setActiveTab = (tab) => {
    activeTab.value = tab;
};

const logout = () => {
    alert('You have logged out successfully');
};
</script>

<style scoped>
.employee-view {
    display: flex;
    height: 100vh;
    background-color: #f4f4f9; /* Light gray for a softer background */
    color: #333; /* Dark text color */
    font-family: 'Roboto', sans-serif; /* Modern font */
}

.content {
    flex: 1;
    padding: 30px;
    background-color: #ffffff; /* White background */
    border-radius: 12px; /* Slightly rounded corners */
    transition: margin-left 0.3s ease;
    overflow-y: auto;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.content-sidebar-closed {
    margin-left: 80px; /* Adjust for collapsed sidebar */
}

.tab-content {
    background-color: #ffebee; /* Light pink for tab content background */
    padding: 20px;
    border-radius: 12px;
    color: #333; /* Dark text for contrast */
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 4px solid #e74c3c; /* Thicker red border */
    margin-bottom: 20px;
    transition: transform 0.3s; /* Hover effect */
}

.profile-image:hover {
    transform: scale(1.05); /* Slightly enlarge on hover */
}

button {
    padding: 12px;
    background-color: #e74c3c; /* Bright red for buttons */
    color: white;
    border: none; /* No border */
    border-radius: 8px; /* Rounded corners */
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
    font-weight: 500; /* Bold text for visibility */
}

button:hover {
    background-color: #c0392b; /* Darker red for hover */
    transform: translateY(-2px); /* Slight upward movement */
}
</style>
