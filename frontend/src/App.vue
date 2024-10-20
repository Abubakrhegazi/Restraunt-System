<template>
  <div id="app">
    <template v-if="isLoggedIn">
      <cashier />
    </template>
    <template v-else>
      <UserLogin @login="handleLogin" />
    </template>
  </div>
</template>

<script>
 import UserLogin from './components/UserLogin.vue';
import Cashier from './components/CashierSystem.vue';

export default {
  name: 'App',
  components: {
    UserLogin,
    Cashier,
  },
  data() {
    return {
      isLoggedIn: false // default state, not logged in
    };
  },
  methods: {
    handleLogin() {
      this.isLoggedIn = true; // Set to true when the user logs in
    }
  }
};
</script>

<style>
/* Styles for the app */
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
