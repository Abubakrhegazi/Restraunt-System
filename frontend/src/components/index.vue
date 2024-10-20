<template>
  <div class="container">
    <div class="button-container">
      <button @click="goToCashier">Cashier</button>
      <button @click="goToLogin">Login</button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    goToCashier() {
      // Add logic to navigate to the Cashier page
      this.$router.push('/cashier');
    },
    goToLogin() {
      // Add logic to navigate to the Login page
      this.$router.push('/login');
    },
  },
};
</script>

<!-- Styles for buttons and container -->
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(145deg, #000000 50%, #484646 50%); /* Black and gray background */
}

.button-container {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

button {
  padding: 15px 30px;
  background-color: #8b0000;
  color: white;
  border: none;
  border-radius: 10px;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #600000;
}
</style>
