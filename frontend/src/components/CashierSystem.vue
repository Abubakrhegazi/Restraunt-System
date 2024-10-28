<template>
<<<<<<< HEAD
  <div class="cashier-system">
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <img src="@/assets/logo.png" alt="Restaurant Logo" />
=======
  <div class="Cashier">
 
    <div class="order-summary">
      <h2>Order Summaryc</h2>
      <div v-for="item in order" :key="item.name" class="order-item">
        <p>{{ item.quantity }}x {{ item.name }}</p>
        <p>\${{ item.price * item.quantity }}</p> 
>>>>>>> b1dabb903441944f09bba33dc464196437c98781
      </div>
      <button class="index-button" @click="goToIndex">Home</button>
    </nav>

    <!-- Cashier Content -->
    <div class="cashier">
      <!-- Left Side: Order Summary -->
      <div class="left-section">
        <div class="order-summary">
          <h2>Order Summary</h2>
          <div v-for="item in order" :key="item.name" class="order-item">
            <p>{{ item.quantity }}x {{ item.name }}</p>
            <p>${{ item.price * item.quantity }}</p>
            <button @click="decreaseQuantity(item)">-</button>
            <button @click="increaseQuantity(item)">+</button>
          </div>
          <div class="total">
            <p>Total: ${{ calculateTotal() }}</p>
            <p>Taxes: ${{ calculateTax() }}</p>
            <p><strong>Total with Tax: \${{ calculateTotalWithTax() }}</strong></p>
          </div>
        </div>
      </div>

      <!-- Right Side: Food Menu -->
      <div class="right-section">
        <div class="food-menu-title">
          <h1>Food Menu</h1>
        </div>
        <div class="food-menu">
          <div v-for="item in foodItems" :key="item.name" class="food-item">
            <img :src="item.image" alt="Food image" />
            <h3>{{ item.name }}</h3>
            <p>\${{ item.price }}</p>
            <button @click="addToOrder(item)">Add +</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <p>© 2024 Fancy Restaurant. All Rights Reserved.</p>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      foodItems: [
        { name: "Lunch Maki", price: 13.8, image: require("@/assets/stirps.jpg") },
        { name: "Pasta 4 formaggi", price: 6.33, image: require("@/assets/pasta.jpg") },
        { name: "Vegetarian Pizza", price: 8.05, image: require("@/assets/pizza.jpg") },
        { name: "Bacon Burger", price: 8.63, image: require("@/assets/burger1.jpg") },
        { name: "Cheese Burger", price: 8.05, image: require("@/assets/burger.jpeg") },
         { name: "Bacon Burger", price: 8.63, image: require("@/assets/burger1.jpg") },
        { name: "Cheese Burger", price: 8.05, image: require("@/assets/burger.jpeg") },
      { name: "Bacon Burger", price: 8.63, image: require("@/assets/burger1.jpg") },
        { name: "Cheese Burger", price: 8.05, image: require("@/assets/burger.jpeg") },
              { name: "Bacon Burger", price: 8.63, image: require("@/assets/burger1.jpg") },
        { name: "Cheese Burger", price: 8.05, image: require("@/assets/burger.jpeg") }

        

      ],
      order: [],
      taxRate: 0.13
    };
  },
  methods: {
    addToOrder(item) {
      const existingItem = this.order.find(i => i.name === item.name);
      if (existingItem) {
        existingItem.quantity++;
      } else {
        this.order.push({ ...item, quantity: 1 });
      }
    },
    increaseQuantity(item) {
      item.quantity++;
    },
    decreaseQuantity(item) {
      if (item.quantity > 1) {
        item.quantity--;
      } else {
        this.order = this.order.filter(i => i.name !== item.name);
      }
    },
    calculateTotal() {
      return this.order.reduce((total, item) => total + item.price * item.quantity, 0);
    },
    calculateTax() {
      return (this.calculateTotal() * this.taxRate).toFixed(2);
    },
    calculateTotalWithTax() {
      return (
        parseFloat(this.calculateTotal()) + parseFloat(this.calculateTax())
      ).toFixed(2);
    },
    goToIndex() {
      // Logic to navigate to the index page
      this.$router.push('/index');
    }
  }
};
</script>

<style scoped>
.cashier-system {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  min-height: 100vh;
  background-color: #2c2c2c;
  color: #f0f0f0;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #333;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.logo img {
  height: 50px;
}

.index-button {
  background-color: #8b0000;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

.index-button:hover {
  background-color: #5c0000;
}

.cashier {
  display: flex;
  flex: 1;
  flex-direction: row;
  justify-content: space-between;
  padding: 40px;
}

.left-section {
  flex: 1;
  margin-right: 20px;
}

.order-summary {
  background-color: #333;
  padding: 30px;
  border-radius: 8px;
  margin-bottom: 20px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.order-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 0;
  border-bottom: 1px solid #444;
}

.order-item p {
  margin: 0;
  font-size: 16px;
}

.order-item button {
  background-color: #8b0000;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
}

.order-item button:hover {
  background-color: #5c0000;
}

.total {
  margin-top: 20px;
}

.total p {
  font-size: 18px;
  margin: 10px 0;
}

.right-section {
  flex: 2;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.food-menu-title h1 {
  font-size: 36px;
  font-family: 'Georgia', serif;
  color: #f8f0e3;
  text-align: center;
  text-transform: uppercase;
  margin-bottom: 20px;
  padding-bottom: 10px;
  border-bottom: 3px solid #8b0000;
  letter-spacing: 2px;
}

.food-menu {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.food-item {
  background-color: #333;
  padding: 15px;
  border-radius: 8px;
  text-align: center;
  margin: 15px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  max-width: 150px;
  transition: transform 0.3s ease;
}

.food-item:hover {
  transform: scale(1.05);
}

.food-item img {
  width: 100px;
  height: 100px;
  border-radius: 8px;
  margin-bottom: 10px;
}

.food-item h3 {
  font-size: 18px;
  color: #f8f0e3;
  margin: 10px 0;
}

.food-item p {
  font-size: 16px;
  color: #d4af37;
  margin: 5px 0;
}

.food-item button {
  background-color: #8b0000;
  color: white;
  border: none;
  padding: 5px 15px;
  border-radius: 5px;
  cursor: pointer;
}

.food-item button:hover {
  background-color: #5c0000;
}

.footer {
  background-color: #333;
  text-align: center;
  padding: 20px;
  color: #f0f0f0;
  border-top: 1px solid #444;
}
</style>
