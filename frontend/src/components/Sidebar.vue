<template>
    <div class="sidebar" :class="{ 'sidebar-closed': !isSidebarOpen }">
        <!-- Toggle Button for Sidebar -->
        <button class="toggle-button" @click="$emit('toggleSidebar')" aria-label="Toggle Sidebar">
            <i :class="isSidebarOpen ? 'fas fa-angle-left' : 'fas fa-angle-right'"></i>
        </button>

        <div class="menu">
            <button @click="$emit('setActiveTab', 'profile')" :class="{ active: activeTab === 'profile' }">
                <i class="fas fa-user"></i> <span v-if="isSidebarOpen">Profile</span>
            </button>
            <button @click="$emit('setActiveTab', 'salary')" :class="{ active: activeTab === 'salary' }">
                <i class="fas fa-dollar-sign"></i> <span v-if="isSidebarOpen">Salary</span>
            </button>
            <button @click="$emit('setActiveTab', 'calendar')" :class="{ active: activeTab === 'calendar' }">
                <i class="fas fa-calendar"></i> <span v-if="isSidebarOpen">Calendar</span>
            </button>
            <button @click="$emit('setActiveTab', 'logout')" :class="{ active: activeTab === 'logout' }">
                <i class="fas fa-sign-out-alt"></i> <span v-if="isSidebarOpen">Logout</span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

// Props for controlling sidebar state and active tab
const props = defineProps({
    isSidebarOpen: Boolean,
    activeTab: String // Include activeTab prop to manage active state in sidebar
});
</script>

<style scoped>

.sidebar {
    width: 250px; /* Default sidebar width */
    background-color: #34495e; /* Darker blue-gray background */
    display: flex;
    flex-direction: column;
    padding: 20px;
    padding-left: 60px; /* Shift sidebar contents to the right */
    border-right: 2px solid white;
    transition: width 0.3s ease;
    position: relative;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}
.toggle-sidebar {
    position: absolute;
    top: 20px;
    left: 40px; /* Adjust this value to move the toggle button to the right */
    font-size: 24px;
    color: white;
    cursor: pointer;
    z-index: 1000; /* Ensure the toggle button is on top */
}


.sidebar-closed {
    width: 60px; /* Collapsed width */
}

.toggle-button {
    background-color: #e74c3c; /* Bright red background */
    border: none; /* No border */
    border-radius: 8px; /* Rounded corners */
    color: white; /* Text color */
    font-size: 24px; /* Icon size */
    cursor: pointer; /* Pointer cursor on hover */
    padding: 10px 15px; /* Padding for button */
    margin-bottom: 20px; /* Space below button */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth transition */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Subtle shadow effect */
    display: flex; /* Flexbox to align icon */
    align-items: center; /* Center icon vertically */
}

.toggle-button:hover {
    background-color: #c0392b; /* Darker red on hover */
    transform: scale(1.05); /* Slight scale effect on hover */
}

.menu {
    display: flex;
    flex-direction: column;
}

.menu button {
    display: flex;
    align-items: center;
    padding: 15px;
    margin-bottom: 10px;
    background-color: #2c3e50; /* Darker background for buttons */
    color: white; /* Button text color */
    border: none; /* No border */
    border-radius: 8px; /* Rounded corners */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition */
    font-size: 16px; /* Font size */
}

.menu button:hover {
    background-color: #1abc9c; /* Lighter color on hover */
    transform: translateY(-2px); /* Slight upward movement on hover */
}

.menu button.active {
    background-color: #e74c3c; /* Active button background color */
    border-radius: 8px; /* Rounded corners */
}
</style>
