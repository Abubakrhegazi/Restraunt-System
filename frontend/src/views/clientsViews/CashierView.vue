<template>
  <div class="cashier">
    <!-- Left Side: Order Summary and Payment -->
    <div class="left-section">
      <!-- Order Summary -->
      <div class="order-summary">
        <h2>Order Summary</h2>
        <div v-for="item in order" :key="item.name" class="order-item">
          <p>{{ item.quantity }}x {{ item.name }}</p>
          <p>${{ item.price * item.quantity }}</p>
        </div>
        <div class="total">
          <p>Total: ${{ calculateTotal() }}</p>
          <p>Taxes: ${{ calculateTax() }}</p>
          <p>
            <strong>Total with Tax: ${{ calculateTotalWithTax() }}</strong>
          </p>
        </div>
      </div>

      <div class="payment-section">
        <h2>Payment</h2>
        <div class="keypad">
          <button v-for="num in keypadNumbers" :key="num" @click="handleKeypadClick(num)">{{ num }}</button>
        </div>
        <button class="pay-button" @click="processPayment">Pay \${{ calculateTotalWithTax() }}</button>
      </div>
    </div>
    <h2 id="food1">Food Menu</h2>
    <div class="right-section food-menu">
      <div v-for="item in foodItems" :key="item.name" class="food-item">
        <img :src="item.image" alt="Food image" />
        <h3>{{ item.name }}</h3>
        <p>\${{ item.price }}</p>
        <button @click="addToOrder(item)">Add to Order</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      foodItems: [
        {
          name: "Lunch Maki",
          price: 13.8,
          image: require("@/assets/food/stirps.jpg")
        },

        {
          name: "Pasta 4 formaggi",
          price: 6.33,
          image: require("@/assets/food/pasta.jpg")
        },
        {
          name: "Vegetarian Pizza",
          price: 8.05,
          image: require("@/assets/food/pizza.jpg")
        },
        {
          name: "Vegetarian Pizza",
          price: 8.05,
          image: require("@/assets/food/pizza.jpg")
        },
        {
          name: "Bacon Burger",
          price: 8.63,
          image: require("@/assets/food/burger1.jpg")
        },
        {
          name: "Cheese Burger",
          price: 8.05,
          image: require("@/assets/food/burger.jpeg")
        },
        {
          name: "Lunch Maki",
          price: 13.8,
          image: require("@/assets/food/stirps.jpg")
        }
      ],
      order: [],
      taxRate: 0.13, // 13% tax rate
      keypadNumbers: [1, 2, 3, 4, 5, 6, 7, 8, 9, 0]
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
    calculateTotal() {
      return this.order.reduce(
        (total, item) => total + item.price * item.quantity,
        0
      );
    },
    calculateTax() {
      return (this.calculateTotal() * this.taxRate).toFixed(2);
    },
    calculateTotalWithTax() {
      return (
        parseFloat(this.calculateTotal()) + parseFloat(this.calculateTax())
      ).toFixed(2);
    },
    processPayment() {
      alert("Payment processed! Total: $" + this.calculateTotalWithTax());
      this.order = [];
    },
    handleKeypadClick(num) {
      console.log("Keypad number pressed:", num);
    }
  }
};
</script>

<style scoped>
#food1 {
  position: relative;
  top: -73px;
  left: 156px;
}
.cashier {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 20px;
  background-color: #f7f7f7; /* Light background */
}

.left-section {
  display: flex;
  flex-direction: column;
  flex: 1;
  margin-right: 20px;
}

.order-summary {
  background-color: #ffffff; /* White background */
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 20px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.order-item {
  display: flex;
  justify-content: space-between;
  padding: 10px 0;
  border-bottom: 1px solid #ddd;
}

.total {
  margin-top: 20px;
}

.payment-section {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.keypad {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px;
  margin-bottom: 20px;
}

.keypad button {
  background-color: #8b0000; /* Dark red for keypad buttons */
  color: white;
  padding: 15px;
  border-radius: 5px;
  border: none;
  font-size: 18px;
  cursor: pointer;
}

.keypad button:hover {
  background-color: #5c0000;
}

.pay-button {
  width: 100%;
  padding: 15px;
  background-color: #8b0000; /* Dark red for the pay button */
  color: white;
  border-radius: 5px;
  border: none;
  font-size: 18px;
  cursor: pointer;
}

.pay-button:hover {
  background-color: #5c0000;
}

.food-menu {
  flex: 2;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  position: relative;

  bottom: -51px;
}

.food-item {
  text-align: center;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.food-item img {
  width: 100%;
  height: auto;
  max-width: 150px;
  max-height: 150px;
  object-fit: cover;
  border-radius: 8px;
}

.food-item h3 {
  color: #333;
  margin-top: 10px;
}

.food-item p {
  color: #666;
  margin-bottom: 10px;
}

.food-item button {
  padding: 10px 15px;
  background-color: #8b0000;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.food-item button:hover {
  background-color: #5c0000;
}
</style>
