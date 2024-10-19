<template>
  <div class="container">
    <div class="container-login">
      <UserInput name="email" type="email" v-model="email" placeholder="Email" />
      <UserInput name="password" type="password" v-model="password" placeholder="Password" />
    </div>
  </div>
</template>

<script>
import UserInput from './inc/UserInput.vue';

export default {
  components: { UserInput }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.container {
  height: 20dvh;
  width: 20dvw;
  /* background-color: ; */
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container-login {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 300px;
}

button {
  padding: 10px;
  background-color: #3498db;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
}

button:hover {
  background-color: #2980b8;
}
</style>
