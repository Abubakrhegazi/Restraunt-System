<template>
  <UserLogin/>
</template>

<script>
import UserLogin from './components/UserLogin.vue'

export default {
  name: 'App',
  components: {
    UserLogin
  }
}
</script>

<style>
#app {
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background-color: grey;
  margin-top: 60px;
}
</style>
