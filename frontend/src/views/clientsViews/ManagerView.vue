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
            <Sales />
          </div>
          <div v-if="selectedSection === 'Meals'">
            <Meals />
          </div>
          <div v-if="selectedSection === 'Team'">
            <Team />
          </div>
          <div v-if="selectedSection === 'Screens'">
            <Screens />
          </div>
          <div v-if="selectedSection === 'Promotions'">
            <Promotions />
          </div>
          <div v-if="selectedSection === 'Orders'">
            <Orders />
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
import AddItemTemplate from './inc/AddItemTemplate.vue';
import salesIcon from '@/assets/managerPagePhotos/piechart.png';
import mealsIcon from '@/assets/managerPagePhotos/food.png';
import teamIcon from '@/assets/managerPagePhotos/team.png';
import screensIcon from '@/assets/managerPagePhotos/screen.png';
import promotionsIcon from '@/assets/managerPagePhotos/promo.png';
import ordersIcon from '@/assets/managerPagePhotos/order.png';
import Meals from './ManagerItems/Meals.vue';
import Team from './ManagerItems/Team.vue';
import Sales from './ManagerItems/Sales.vue';
import Promotions from './ManagerItems/Promotions.vue';
import Orders from './ManagerItems/Orders.vue';
import Screens from './ManagerItems/Screens.vue';

export default {
  components: { NavBar, ManagerBox, SideBar, Meals, Team, Sales, Promotions, Orders, Screens, AddItemTemplate, },
  data() {
    return {
      selectedSection: '', 
      salesIcon, mealsIcon, teamIcon, screensIcon, promotionsIcon, ordersIcon,
    };
  },
  methods: {
    showSection(section) {
      this.selectedSection = section; 
    },
  },
};
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
*{
  font-family: Poppins;
}
</style>
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
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  margin-top: -105px;
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
  justify-content: center;
  align-items: center;
  width: 100%;
}
</style>
