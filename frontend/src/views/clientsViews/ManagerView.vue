<template>
  <header class="Manager">
    <nav>
      <ul>
        <managerHeader></managerHeader>
      </ul>
    </nav>
  </header>
</template>

<script>
import managerHeader from '@/views/clientsViews/inc/ManagerHeader.vue';

export default {
  name: 'ManagerView',
  components: {
    managerHeader
  },
  data() {
    return {
      
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

</style>