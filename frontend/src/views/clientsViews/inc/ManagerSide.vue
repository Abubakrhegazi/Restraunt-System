<template>
    <div class="sidebar" :class="{ 'sidebar-closed': !isSidebarOpen }">
        <button class="toggle-button" @click="$emit('toggleSidebar')" aria-label="Toggle Sidebar">
            <i :class="isSidebarOpen ? 'fas fa-angle-right' : 'fas fa-angle-left'"></i>
        </button>

        <div class="menu">
            <button v-for="(item, index) in menuItems" :key="index" @click="$emit('setActiveTab', item.name)"
                :class="{ active: activeTab === item.name }">
                <i :class="item.icon"></i>
                <span v-if="isSidebarOpen">{{ item.label }}</span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SideBar',
    props: {
        isSidebarOpen: true,
        activeTab: 'all',
    },
    data() {
        return {
            menuItems: [
                { name: 'all', label: 'All', icon: 'fas fa-utensils' },
                { name: 'mainDishes', label: 'Main Dishes', icon: 'fas fa-drumstick-bite' },
                { name: 'appetizers', label: 'Appetizers', icon: 'fas fa-pepper-hot' },
                { name: 'desserts', label: 'Desserts', icon: 'fas fa-ice-cream' },
                { name: 'drinks', label: 'Drinks', icon: 'fas fa-coffee' }
            ]
        };
    }
};
</script>

<style scoped>
.sidebar {
    width: 250px;
    background-color: #0c0c0c;
    /* Dark background */
    color: #ffffff;
    /* White text color */
    display: flex;
    flex-direction: column;
    padding: 20px;
    padding-left: 60px;
    border-right: 2px solid #8b0000;
    /* Accent border color */
    transition: width 0.3s ease;
    position: relative;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sidebar-closed {
    width: 60px;
    /* Collapsed width */
}

.toggle-button {
    background-color: #8b0000;
    /* Dark red background */
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
    background-color: #600000;
    /* Darker red on hover */
    transform: scale(1.05);
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
    background-color: #1a1a1a;
    /* Slightly lighter for contrast */
    color: #ffffff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-size: 16px;
}

.menu button:hover {
    background-color: #8b0000;
    /* Dark red on hover */
    transform: translateY(-2px);
}

.menu button.active {
    background-color: #8b0000;
    /* Dark red for active state */
    border-radius: 8px;
}

.menu button i {
    margin-right: 10px;
}

.menu button span {
    font-weight: 500;
}
</style>