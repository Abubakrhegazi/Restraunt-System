<template>
    <div class="sidebar" :class="{ 'sidebar-closed': !isSidebarOpen }">
        <button @click="$emit('setActiveTab', 'profile')" :class="{ active: activeTab === 'profile' }">Customer Profile</button>
        <button @click="$emit('setActiveTab', 'balance')" :class="{ active: activeTab === 'balance' }">Account Balance</button>
        <button @click="$emit('setActiveTab', 'calendar')" :class="{ active: activeTab === 'calendar' }">Calendar</button>
        <button @click="$emit('setActiveTab', 'logout')" :class="{ active: activeTab === 'logout' }">Logout</button>
    </div>
</template>

<script setup>
import { ref } from 'vue';

// Props for controlling sidebar state and active tab
const props = defineProps({
    isSidebarOpen: Boolean
});
</script>

<style scoped>
.sidebar {
    width: 250px;
    background-color: #1a1a1a;
    display: flex;
    flex-direction: column;
    padding: 20px;
    border-right: 2px solid white;
    transition: width 0.3s ease;
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
