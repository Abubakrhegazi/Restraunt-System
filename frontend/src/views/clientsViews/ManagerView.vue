<template>
  <div class="layout">
    <!-- Add the navigation bar -->
    <NavBar />
    <!-- <SideBar /> -->
    <!-- Main content with improved layout -->
    <div class="main-content">
      <div class="content">
        <!-- Manager Boxes with improved spacing and hover effects -->
        <div class="box-container">
          <ManagerBox label="Sales" :icon="salesIcon" @selectSection="showSection" />
          <ManagerBox label="Meals" :icon="mealsIcon" @selectSection="showSection" />
          <ManagerBox label="Team" :icon="teamIcon" @selectSection="showSection" />
          <ManagerBox label="Screens" :icon="screensIcon" @selectSection="showSection" />
          <ManagerBox label="Promotions" :icon="promotionsIcon" @selectSection="showSection" />
          <ManagerBox label="Orders" :icon="ordersIcon" @selectSection="showSection" />
        </div>

        <!-- Display Section Content Based on Selected Section -->
        <div class="data">
          <div v-if="selectedSection === 'Sales'">
            <p>Showing Sales Section</p>
          </div>
          <div v-if="selectedSection === 'Meals'">
            <Meals />
          </div>
          <div v-if="selectedSection === 'Team'">
            <Team />
          </div>
          <div v-if="selectedSection === 'Screens'">
            <p>Showing Screens Section</p>
          </div>
          <div v-if="selectedSection === 'Promotions'">
            <p>Showing Promotions Section</p>
          </div>
          <div v-if="selectedSection === 'Orders'">
            <p>Showing Orders Section</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavBar from './inc/ManagerNav.vue';
import SideBar from './inc/ManagerSide.vue';
import ManagerBox from './inc/ManagerBox.vue';
import AddProduct from './inc/AddProduct.vue';
import salesIcon from '@/assets/managerPagePhotos/piechart.png';
import mealsIcon from '@/assets/managerPagePhotos/food.png';
import teamIcon from '@/assets/managerPagePhotos/team.png';
import screensIcon from '@/assets/managerPagePhotos/screen.png';
import promotionsIcon from '@/assets/managerPagePhotos/promo.png';
import ordersIcon from '@/assets/managerPagePhotos/order.png';
import Meals from './ManagerItems/Meals.vue';
import Team from './ManagerItems/Team.vue';

export default {
  components: { NavBar, ManagerBox, SideBar, Meals, Team, AddProduct, },
  data() {
    return {
      selectedSection: '', // Initialize selectedSection
      salesIcon, mealsIcon, teamIcon, screensIcon, promotionsIcon, ordersIcon,
    };
  },
  methods: {
    showSection(section) {
      this.selectedSection = section; // Update selectedSection based on button click
    },
  },
};
</script>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  font-family: Arial, sans-serif;
}

.main-content {
  display: flex;
  flex-grow: 1;
  padding: 20px;
  background-color: #f7f7f7;
}

.content {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.box-container {
  /* position: relative;
  bottom: 110px; */
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  margin-top: -105px;
  /* Use negative margin to move it up slightly */
  grid-template-rows: 1fr;
  grid-auto-flow: column;
  gap: 30px;
}

.box-container .ManagerBox {
  transition: transform 0.3s ease;
  border-radius: 10px;
  overflow: hidden;
}

.box-container .ManagerBox:hover {
  transform: translateY(-5px);
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.data {
  display: flex;
  justify-content: flex-start;
  width: 100%;
}


/* .meals-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 10px;
  overflow: hidden;
}

.meals-table th,
.meals-table td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.meals-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

.meals-table th {
  background-color: #e0e0e0;
  color: #333;
  font-weight: bold;
} */
</style>
