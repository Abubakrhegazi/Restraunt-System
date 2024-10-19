<template>
  <div class="container">
    <div class="container-login">
      <h2 class="title">Login</h2>
      <UserInput
        name="Email"
        type="email"
        v-model="Email"
        placeholder="Email"
      />
      <UserInput
        name="assword"
        type="password"
        v-model="Password"
        placeholder="Password"
      />
      <p v-if="passwordError" class="error">Password must be at least 8 characters long.</p>
      <button @click="submitForm">Login</button>
    </div>
  </div>
</template>

<script>
import UserInput from './inc/CustomInput.vue';

export default {
  components: { UserInput },
  data() {
    return {
        Email: '',
      Password: '',
      passwordError: false,
    };
  },
  methods: {
    submitForm() {
      this.passwordError = this.password.length < 8;
      if (!this.passwordError) {
        // Proceed with the form submission
        console.log('Login Successful');
      }
    },
  },
};
</script>

<!-- New Container Style and Fonts -->
<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Merriweather&display=swap'); /* New fonts */

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
background: linear-gradient(145deg, #000000 50%, #484646 50%); 
  padding: 20px;
}

.container-login {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  padding: 40px;
  background-color: #ffffff;
  border-radius: 20px;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
  max-width: 400px;
  width: 100%;
}

.title {
  font-family: 'Merriweather', serif; /* New font */
  font-size: 28px;
  color: #8b0000;
  margin-bottom: 10px;
}

button {
  width: 58%;
  padding: 14px;
  background-color: #8b0000;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  font-family: 'Roboto', sans-serif; /* Button font */
  font-size: 18px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #600000; /* Darker on hover */
}

.error {
  color: #ff1a1a;
  font-size: 14px;
  font-family: 'Roboto', sans-serif; /* Error message font */
}
</style>
