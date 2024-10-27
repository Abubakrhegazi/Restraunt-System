<template>
    <div class="employee-profile-view">
      <Sidebar
        :isSidebarOpen="isSidebarOpen"
        :activeTab="activeTab"
        @setActiveTab="setActiveTab"
        @toggleSidebar="toggleSidebar"
      />
  
      <div class="profile-content" :class="{ 'content-sidebar-closed': !isSidebarOpen }">
        <template v-if="activeTab === 'profile'">
          <h1 class="profile-header">Employee Profile</h1>
          <div class="profile-info">
            <LeftPanelEmployeeView :employee="employee" @logout="logout" />
            <RightPanelEmployeeView :employee="employee" />
          </div>
        </template>
  
        <template v-else-if="activeTab === 'salary'">
          <h1 class="profile-header">Salary Information</h1>
          <p>Here you can manage and view salary details...</p>
        </template>
  
        <template v-else-if="activeTab === 'calendar'">
          <Calendar :events="events" @add-event="addEvent" />
        </template>
  
        <template v-else-if="activeTab === 'logout'">
          <p>Logging out...</p>
        </template>
      </div>
    </div>
  </template>
  
  <script setup>
  import Sidebar from '@/components/Sidebar.vue';
  import LeftPanelEmployeeView from '@/components/employee/LeftPanelEmployeeView.vue';
  import RightPanelEmployeeView from '@/components/employee/RightPanelEmployeeView.vue';
  import Calendar from '@/components/employee/Calendar.vue';
  import { ref } from 'vue';
  
  // Employee data
  const employee = ref({
    name: 'Alexandra Smith',
    title: 'Brand Designer',
    image: 'https://via.placeholder.com/150',
    email: 'alex@apple.com',
    company: 'Apple',
    firstName: 'Alexandra',
    lastName: 'Smith',
    phone: '416-564-4374',
    employeeId: '5643',
    parkingSpace: 'P1-21',
  });
  
  const isSidebarOpen = ref(true);
  const activeTab = ref('profile');
  
  const setActiveTab = (tab) => {
    console.log(`Active tab changed to: ${tab}`);
    activeTab.value = tab;
  };
  
  const toggleSidebar = () => {
    console.log(`Sidebar state changed to: ${!isSidebarOpen.value}`);
    isSidebarOpen.value = !isSidebarOpen.value;
  };
  
  const events = ref([]);
  const addEvent = (event) => events.value.push(event);
  
  const logout = () => {
    activeTab.value = 'logout';
    alert('You have logged out successfully');
  };
  </script>
  

<style scoped>
.employee-profile-view {
    display: flex;
    height: 100vh;
    background-color: #ffffff;
    color: #ffffff;
    font-family: 'Roboto', sans-serif;
}

.profile-content {
    flex: 1;
    padding: 30px;
    transition: margin-left 0.3s ease;
    overflow-y: auto;
}

.content-sidebar-closed {
    margin-left: 80px;
}
</style>
