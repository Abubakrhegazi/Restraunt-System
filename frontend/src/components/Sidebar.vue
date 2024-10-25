<template>
    <div class="sidebar" :class="{ 'sidebar-closed': !isSidebarOpen }">
        <button @click="$emit('setActiveTab', 'profile')" :class="{ active: activeTab === 'profile' }">Customer Profile</button>
        <button @click="$emit('setActiveTab', 'balance')" :class="{ active: activeTab === 'balance' }">Account Balance</button>
        <button @click="$emit('setActiveTab', 'calendar')" :class="{ active: activeTab === 'calendar' }">Calendar</button>
        <button @click="$emit('setActiveTab', 'logout')" :class="{ active: activeTab === 'logout' }">Logout</button>
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
    width: 250px;
    background-color: #1a1a1a;
    display: flex;
    flex-direction: column;
    padding: 20px;
    padding-left: 60px; /* Shift sidebar contents to the right */
    border-right: 2px solid white;
    transition: width 0.3s ease;
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
    width: 0;
    padding: 0;
    overflow: hidden;
}

.sidebar button {
    padding: 10px;
    margin-bottom: 10px;
    background-color: #333;
    color: white;
    border: 2px solid white;
    border-radius: 4px;
    cursor: pointer;
    text-align: left;
    transition: background-color 0.3s ease;
}

.sidebar button:hover {
    background-color: #555;
}

.sidebar button.active {
    background-color: #555;
}
</style>
