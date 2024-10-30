<template>
    <div class="sidebar" :class="{ 'sidebar-closed': !isSidebarOpen }">
        <button class="toggle-button" @click="toggleSidebar" aria-label="Toggle Sidebar">
            <i :class="isSidebarOpen ? 'fas fa-angle-left' : 'fas fa-angle-right'"></i>
        </button>
        <div class="menu">
            <button v-for="(item, index) in menuItems" :key="index" @click="filterCategory(item.name)"
                :class="{ active: activeTab === item.name }">
                <i :class="item.icon"></i>
                <span v-if="isSidebarOpen">{{ item.label }}</span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
    props: {
        isSidebarOpen: {
            type: Boolean,
            default: true
        },
        activeTab: {
            type: String,
            default: 'all'
        }
    },
    data() {
        return {
            menuItems: [
                { name: 'All', label: 'All', icon: 'fas fa-utensils' },
                { name: 'Main Dishes', label: 'Main Dishes', icon: 'fas fa-drumstick-bite' },
                { name: 'Appetizers', label: 'Appetizers', icon: 'fas fa-pepper-hot' },
                { name: 'Desserts', label: 'Desserts', icon: 'fas fa-ice-cream' },
                { name: 'Drinks', label: 'Drinks', icon: 'fas fa-coffee' }
            ]
        };
    },
    methods: {
        filterCategory(category) {
            console.log("Emitting category:", category);
            this.$emit('setActiveTab', category);
        },
        toggleSidebar() {
            this.$emit('toggleSidebar');
        }
    }
};
</script>

<style scoped>
.sidebar {
    width: 250px;
    background-color: #f0c374e5;
    color: #8b0000;
    display: flex;
    flex-direction: column;
    padding: 20px;
    padding-left: 60px;
    border-right: 2px solid #8b0000;
    transition: width 0.3s ease;
    position: relative;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.sidebar-closed {
    width: 60px;
}

.toggle-button {
    background-color: #8b0000;
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
    background-color: #ffe4b5;
    color: #8b0000;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-size: 16px;
}

.menu button:hover {
    background-color: #f5deb3;
    transform: translateY(-2px);
}

.menu button.active {
    background-color: #8b0000;
    color: #ffffff;
    border-radius: 8px;
}

.menu button i {
    margin-right: 10px;
}

.menu button span {
    font-weight: 500;
}
</style>
