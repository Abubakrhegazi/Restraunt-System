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
        <div class="profile-container">
          <LeftPanel :employee="employee" /> <!-- Left panel -->
          <RightPanel :employee="employee" /> <!-- Right panel -->
        </div>
      </template>

      <template v-else-if="activeTab === 'salary'">
        <h1 class="profile-header">Salary Information</h1>
        <div class="salary-info">
          <div class="salary-item">
            <strong>Current Salary:</strong> <span>{{ salaryInfo.currentSalary }}</span>
          </div>
          <div class="salary-item">
            <strong>Next Salary Day:</strong> <span>{{ salaryInfo.nextSalaryDay }}</span>
          </div>
        </div>
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
import Calendar from '@/components/employee/Calendar.vue';
import LeftPanel from '@/components/employee/LeftPanelEmployeeView.vue';
import RightPanel from '@/components/employee/RightPanelEmployeeView.vue';
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

// Salary information
const salaryInfo = ref({
  currentSalary: '$4,500',
  nextSalaryDay: 'November 15, 2024',
});

const isSidebarOpen = ref(true);
const activeTab = ref('profile');

const setActiveTab = (tab) => {
  activeTab.value = tab;
};

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};

const events = ref([]);
const addEvent = (event) => events.value.push(event);

const logout = () => {
  activeTab.value = 'logout';
  alert('You have logged out successfully');
};

const editProfile = () => {
  alert('Edit Profile functionality to be implemented.');
};
</script>

<style scoped>
.employee-profile-view {
  display: flex;
  height: 100vh; /* Full height of the viewport */
  background-color: #ffffff; /* White background for the outer container */
  font-family: 'Roboto', sans-serif;
}

.profile-content {
  flex: 1;
  padding: 30px;
  transition: margin-left 0.3s ease;
  height: 100%; /* Full height for the content */
}

.content-sidebar-closed {
  margin-left: 80px;
}

/* Profile Tab Styling */
.profile-container {
  display: flex;
  justify-content: space-between; /* Space between sections */
  height: 100%; /* Full height for the container */
  gap: 20px; /* Space between sections */
}

.profile-header {
  color: #8b0000; /* Dark red for header */
  margin-bottom: 20px;
}

/* Additional global styling can be added here */
</style>
