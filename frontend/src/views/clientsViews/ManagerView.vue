<template>
  <div class="layout">
    <!-- Add the navigation bar -->
    <NavBar />

    <!-- Add the sidebar component -->
    <div class="main-content">
      <!-- <SideBar /> -->
      <div class="content">
        <!-- Manager Boxes -->
        <div class="box-container">
          <!-- <ManagerBox label="QR Code" :icon="qrIcon" /> -->
          <ManagerBox label="Sales" :icon="salesIcon" />
          <ManagerBox label="Meals" :icon="mealsIcon" />
          <ManagerBox label="Team" :icon="teamIcon" />
          <!-- <ManagerBox label="Settings" :icon="settingsIcon" /> -->
          <ManagerBox label="Screens" :icon="screensIcon" /> <!-- New box for Screens -->
          <ManagerBox label="Promotions" :icon="promotionsIcon" /> <!-- New box for Promotions -->
          <ManagerBox label="Orders" :icon="ordersIcon" /> <!-- New box for Orders -->
        </div>

        <!-- Table of Meals -->
        <div class="table-container">
          <h2>Meals</h2>
          <table class="meals-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Categories</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(meal, index) in meals" :key="index">
                <td>{{ meal.name }}</td>
                <td>{{ meal.stock }}</td>
                <td>{{ meal.price }}</td>
                <td>{{ meal.categories.join(', ') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import NavBar from './inc/ManagerNav.vue'; 
import SideBar from './inc/ManagerSide.vue';
import ManagerBox from './inc/ManagerBox.vue';
import qrIcon from '@/assets/managerPagePhotos/QR.png';
import salesIcon from '@/assets/managerPagePhotos/piechart.png';
import mealsIcon from '@/assets/managerPagePhotos/food.png';
import teamIcon from '@/assets/managerPagePhotos/team.png';
// import settingsIcon from '@/assets/managerPagePhotos/settings.png';
import screensIcon from '@/assets/managerPagePhotos/screen.png'; // New icon for Screens
import promotionsIcon from '@/assets/managerPagePhotos/promo.png'; // New icon for Promotions
import ordersIcon from '@/assets/managerPagePhotos/order.png'; // New icon for Orders

export default {
  name: 'ManagerView',
  components: {
    NavBar,
    SideBar,
    ManagerBox,
  },
  data() {
    return {
      qrIcon,
      salesIcon,
      mealsIcon,
      teamIcon,
      // settingsIcon,
      screensIcon, // Screens icon
      promotionsIcon, // Promotions icon
      ordersIcon, // Orders icon
      meals: [
        { name: 'Soup', stock: 'In stock', price: '$10.00', categories: ['Category 1', 'Category 2'] },
        { name: 'Coffee', stock: 'In stock', price: '$10.00', categories: ['Category 1', 'Category 3'] },
        { name: 'Soda', stock: 'In stock', price: '$10.00', categories: ['Category 2', 'Category 4'] },
        { name: 'New Meal', stock: 'In stock', price: '$10.00', categories: ['Category 1', 'Category 4'] },
      ],
    };
  },
};
</script>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
}

.main-content {
  display: flex;
}

.content {
  flex-grow: 1;
  padding: 20px;
}

.box-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  /* Allows the new boxes to wrap to the next line */
  margin-bottom: 20px;
}
.table-container {
  background-color: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
