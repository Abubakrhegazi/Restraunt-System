<template>
  <div class="cashier-system">
    <!-- Navbar -->
    <nav class="navbar">
      <div class="logo">
        <img src="@/assets/logo/chefIcon.png" alt="Restaurant Logo" />
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
            <button @click="removeItem(item)" class="remove-button">Remove</button>
          </div>

          <div class="promotion-section">
            <input type="text" v-model="promoCode" placeholder="Enter promotion code" class="promo-input" />
            <button @click="applyPromoCode" class="promo-button">Apply</button>
            <p v-if="promoError" class="promo-error">{{ promoError }}</p>
          </div>

          <div class="total">
            <p>Total: ${{ calculateTotal() }}</p>
            <p>Taxes: ${{ calculateTax() }}</p>
            <p><strong>Total with Tax: ${{ calculateTotalWithTax() }}</strong></p>
            <button @click="processPayment" class="checkout">Check Out</button>
          </div>
        </div>
      </div>

      <!-- Right Side: Food Menu -->
      <div class="right-section">
        <div class="categories-section">
          <h2>Categories</h2>
          <div class="categories">
            <button @click="filterItems('All')" class="category-button">All</button>
            <button @click="filterItems('Appetizers')" class="category-button">Appetizers</button>
            <button @click="filterItems('Main Dishes')" class="category-button">Main Dishes</button>
            <button @click="filterItems('Desserts')" class="category-button">Desserts</button>
            <button @click="filterItems('Drinks')" class="category-button">Drinks</button>
          </div>
        </div>

        <div class="food-menu-title">
          <h1>Food Menu</h1>
        </div>
        <div class="food-menu">
          <div v-for="item in filteredFoodItems" :key="item.name" class="food-item">
            <img :src="item.image" alt="Food image" />
            <h3>{{ item.name }}</h3>
            <p>${{ item.price }}</p>
            <button @click="addToOrder(item)">Add +</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      foodItems: [
        { name: "Lunch Maki", price: 13.8, category: "Main Dishes", image: require("@/assets/food/stirps.jpg") },
        { name: "Pasta 4 formaggi", price: 6.5, category: "Main Dishes", image: require("@/assets/food/pasta.jpg") },
        { name: "Vegetarian Pizza", price: 10.50, category: "Main Dishes", image: require("@/assets/food/pizza.jpg") },
        { name: "Bacon Burger", price: 4.63, category: "Main Dishes", image: require("@/assets/food/image1.jpg") },
        { name: "Cheese Burger", price: 8.95, category: "Main Dishes", image: require("@/assets/food/image 2.jpeg") },
        { name: "Caesar Salad", price: 5.00, category: "Appetizers", image: require("@/assets/food/image3.jpg") },
        { name: "Chocolate Cake", price: 4.50, category: "Desserts", image: require("@/assets/food/image4.jpg") },
        { name: "Mojito", price: 3.00, category: "Drinks", image: require("@/assets/food/image5.jpg") },
        { name: "Chocolate Cake", price: 4.50, category: "Desserts", image: require("@/assets/food/image6.jpg") },
        { name: "Mojito", price: 3.00, category: "Drinks", image: require("@/assets/food/image7.jpg") },
      ],
      promoCode: '',
      promoError: '',
      taxRate: 0.14,
      selectedCategory: 'All' // Track selected category
    };
  },
  computed: {
    filteredFoodItems() {
      if (this.selectedCategory === 'All') {
        return this.foodItems;
      }
      return this.foodItems.filter(item => item.category === this.selectedCategory);
    }
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
        this.removeItem(item);
      }
    },
    removeItem(item) {
      this.order = this.order.filter(i => i.name !== item.name);
    },
    calculateTotal() {
      return this.order.reduce((total, item) => total + item.price * item.quantity, 0);
    },
    calculateTax() {
      return (this.calculateTotal() * this.taxRate).toFixed(2);
    },
    calculateTotalWithTax() {
      return (parseFloat(this.calculateTotal()) + parseFloat(this.calculateTax())).toFixed(2);
    },
    applyPromoCode() {
      // Example of a valid promo code
      const validPromoCode = 'DISCOUNT10';

      // Check if the entered promo code is valid
      if (this.promoCode === validPromoCode) {
        alert('Promo code applied successfully! You get a 10% discount.');
      } else {
      }
    },
    processPayment() {
      alert("Payment processed! Total: $" + this.calculateTotalWithTax());
      this.order = [];
    },
    filterItems(category) {
      this.selectedCategory = category; // Set the selected category
    },
    goToIndex() {
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

.promotion-section {
  margin-top: 20px;
  display: flex;
  position: relative;
  left: 90px;
}

.promo-input {
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #444;
  background-color: #2c2c2c;
  color: white;
  margin-right: 10px;
}

.promo-button {
  background-color: #8b0000;
  color: white;
  border: none;
  padding: 10px;
  border-radius: 5px;
  cursor: pointer;
}

.promo-button:hover {
  background-color: #5c0000;
}

.promo-error {
  color: red;
  margin-left: 10px;
}

.right-section {
  flex: 2;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.categories-section {
  width: 100%;
  margin-bottom: 20px;
  background-color: #333;
  padding: 9px;
  margin: 30px;
  border-radius: 8px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.categories-section h2 {
  font-size: 24px;
  color: #f8f0e3;
  margin-bottom: 10px;
}

.categories {
  display: flex;
  justify-content: space-around;
}

.category-button {
  background-color: #8b0000;
  ;
  border: none;
  padding: 10px 15px;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.category-button:hover {
  background-color: #8b0000;
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

.remove-button {
  background-color: #ff6347;
  margin-left: 10px;
}

.checkout {
  background-color: #8b0000;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
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
  margin-right: 20px;
}

.food-item {
  background-color: #333;
  padding: 10px;
  border-radius: 8px;
  text-align: center;
  margin: 15px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  max-width: 120px;
  transition: transform 0.3s ease;
}

.food-item:hover {
  transform: scale(1.05);
}

.food-item img {
  width: 80px;
  height: 80px;
}

.payment-section {
  border-radius: 8px;
  margin-bottom: 10px;
}

.food-item h3 {
  font-size: 16px;
  color: #f8f0e3;
  margin: 10px 0;
}

.food-item p {
  font-size: 14px;
  color: #d4af37;
  margin: 5px 0;
}

.food-item button {
  background-color: #8b0000;
  color: white;
  border: none;
  padding: 5px 10px;
  border-radius: 5px;
  cursor: pointer;
}
</style>
