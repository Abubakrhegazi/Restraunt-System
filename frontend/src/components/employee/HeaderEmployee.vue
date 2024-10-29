<template>
    <div class="header-employee">
      <div class="employee-name">{{ employeeName }}</div>
  
      <div class="profile-container" @click="toggleDropdown">
        <img :src="employeeImage" alt="Profile Picture" class="profile-pic" />
        <i :class="['fas', dropdownVisible ? 'fa-chevron-up' : 'fa-chevron-down']" class="dropdown-arrow"></i>
        <div v-if="dropdownVisible" class="dropdown-menu">
          <div @click="logout">Logout</div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, defineProps, defineEmits } from 'vue';
  
  const props = defineProps({
    employeeName: String,
    employeeImage: String,
  });
  
  const emit = defineEmits(['update:activeTab']); // Emit event to change active tab
  
  const dropdownVisible = ref(false);
  
  const toggleDropdown = () => {
    dropdownVisible.value = !dropdownVisible.value;
  };
  
  const logout = () => {
    emit('update:activeTab', 'logout'); // Set the active tab to 'logout'
    alert('You have logged out successfully');
  };
  </script>
  
  <style scoped>
  .header-employee {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #0a0a0a;
    border-bottom: 1px solid #e0e0e0;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    font-family: 'Roboto', sans-serif;
    font-size: 1rem;
    color: #4a4a4a;
  }
  
  .employee-name {
    font-weight: bold;
    font-size: 1.2rem;
  }
  
  .profile-container {
    display: flex;
    align-items: center;
    cursor: pointer;
    position: relative;
  }
  
  .profile-pic {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 8px;
    object-fit: cover;
  }
  
  .dropdown-arrow {
    font-size: 0.8rem;
    color: #4a4a4a;
    margin-left: 5px;
  }
  
  .dropdown-menu {
    position: absolute;
    top: 100%;
    right: 0;
    background-color: white;
    border: 1px solid #e0e0e0;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    padding: 8px 12px;
    margin-top: 5px;
    border-radius: 4px;
    z-index: 10;
  }
  
  .dropdown-menu div {
    padding: 8px;
    cursor: pointer;
  }
  
  .dropdown-menu div:hover {
    background-color: #f5f5f5;
  }
  </style>
  