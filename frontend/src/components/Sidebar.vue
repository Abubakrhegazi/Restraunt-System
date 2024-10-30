<!-- Sidebar.vue -->
<template>
    <div class="sidebar" :class="{ 'sidebar-closed': !isSidebarOpen }">
        <button class="toggle-button" @click="$emit('toggleSidebar')" aria-label="Toggle Sidebar">
            <i :class="isSidebarOpen ? 'fas fa-angle-left' : 'fas fa-angle-right'"></i>
        </button>

        <div class="menu">
            <button
                v-for="(item, index) in menuItems"
                :key="index"
                @click="$emit('setActiveTab', item.name)"
                :class="{ active: activeTab === item.name }"
            >
                <i :class="item.icon"></i> <span v-if="isSidebarOpen">{{ item.label }}</span>
            </button>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    isSidebarOpen: Boolean,
    activeTab: String
});

const menuItems = [
    { name: 'profile', label: 'Profile', icon: 'fas fa-user' },
    { name: 'salary', label: 'Salary', icon: 'fas fa-dollar-sign' },
    { name: 'calendar', label: 'Calendar', icon: 'fas fa-calendar' },
    { name: 'logout', label: 'Logout', icon: 'fas fa-sign-out-alt' }
];
</script>


<style scoped>

.sidebar {
    width: 250px; 
    background: linear-gradient(135deg, #f9e8b2, #e8a958);
    color: #ffffff; 
    display: flex;
    flex-direction: column;
    padding: 20px;
    padding-left: 20px;
    border-right: 2px solid #000000; 
    transition: width 0.3s ease;
    position: relative;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sidebar-closed {
    width: 60px; 
}

.toggle-button {
    background-color: #000000;
    border: none;
    border-radius: 8px;
    color: #ffffff;
    font-size: 24px;
    cursor: pointer;
    padding: 10px;
    margin-bottom: 20px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
}

.toggle-button:hover {
    background-color: #000000; 
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
    background-color: white; 
    color: black;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-size: 16px;
}

.menu button:hover {
    background-color: #e0d2d2;
    transform: translateY(-2px);
}

.menu button.active {
    background-color: #e4d6d6; 
    border-radius: 8px;
}

.menu button i {
    margin-right: 10px;
}

.menu button span {
    font-weight: 500;
}
</style>

