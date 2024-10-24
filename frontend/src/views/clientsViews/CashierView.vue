<template>
  <div class="Cashier">
 
    <div class="order-summary">
      <h2>Order Summary</h2>
      <div v-for="item in order" :key="item.name" class="order-item">
        <p>{{ item.quantity }}x {{ item.name }}</p>
        <p>\${{ item.price * item.quantity }}</p>
      </div>
      <div class="total">
        <p>Total: \${{ calculateTotal() }}</p>
        <p>Taxes: \${{ calculateTax() }}</p>
        <p><strong>Total with Tax: \${{ calculateTotalWithTax() }}</strong></p>
      </div>
    </div>

   
    <div class="food-menu">
      <h2>Food Menu</h2>
      <div v-for="item in foodItems" :key="item.name" class="food-item">
        <img :src="item.image" alt="Food image" />
        <h3>{{ item.name }}</h3>
        <p>\${{ item.price }}</p>
        <button @click="addToOrder(item)">Add to Order</button>
      </div>
    </div>

   
    <div class="payment-section">
      <h2>Payment</h2>
      <div class="keypad">
        <button v-for="num in keypadNumbers" :key="num" @click="handleKeypadClick(num)">
          {{ num }}
        </button>
      </div>
      <button class="pay-button" @click="processPayment">Pay \${{ calculateTotalWithTax() }}</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      foodItems: [
        { name: "Bacon Burger", price: 8.63, image: "./src/assets/burger1.jpeg" },
        { name: "Cheese Burger", price: 8.05, image: "path-to-cheeseburger.jpg" },
        { name: "Chicken Curry Sandwich", price: 3.45, image: "path-to-curry.jpg" },
        { name: "Club Sandwich", price: 3.91, image: "path-to-club.jpg" },
   
      ],
      order: [],
      taxRate: 0.13, 
      keypadNumbers: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
    };
  },
  methods: {
    addToOrder(item) {
      const existingItem = this.order.find((i) => i.name === item.name);
      if (existingItem) {
        existingItem.quantity++;
      } else {
        this.order.push({ ...item, quantity: 1 });
      }
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
    processPayment() {
      alert("Payment processed! Total: $" + this.calculateTotalWithTax());
      this.order = [];
    },
    handleKeypadClick(num) {
      // Handle quantity input logic
      console.log("Keypad number pressed:", num);
    },
  },
};
</script>

<style scoped>
.cashier {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 20px;
}

.order-summary {
  flex: 1;
  background-color: #f5f5f5;
  padding: 20px;
  border-radius: 8px;
  margin-right: 20px;
}

.food-menu {
  flex: 2;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}

.food-item {
  text-align: center;
}

.payment-section {
  flex: 1;
  background-color: #f5f5f5;
  padding: 20px;
  border-radius: 8px;
  margin-left: 20px;
}

.keypad {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 20px;
}

button {
  padding: 10px;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.pay-button {
  width: 100%;
  background-color: #28a745;
}

.pay-button:hover {
  background-color: #218838;
}

.total {
  margin-top: 20px;
}
</style>
