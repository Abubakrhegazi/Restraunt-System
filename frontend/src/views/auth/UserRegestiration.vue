<template>
    <div class="container">
      <div class="container-login">
        <h2 class="title">Register</h2>
        <CustomInput
          name="Name"
          type="text"
          v-model="name"
          placeholder="Full Name"
        />
        <CustomInput
          name="Email"
          type="email"
          v-model="email"
          placeholder="Email"
        />
        <CustomInput
          name="Password"
          type="password"
          v-model="password"
          placeholder="Password"
        />
        <CustomInput
          name="Confirm Password"
          type="password"
          v-model="confirmPassword"
          placeholder="Confirm Password"
        />
        <button @click="submitForm">Register</button>
        <div v-if="errorMessage" class="error">{{ errorMessage }}</div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import CustomInput from '@/components/inc/CustomInput.vue';
  
  export default {
    components: { CustomInput },
    setup() {
      const name = ref('');
      const email = ref('');
      const password = ref('');
      const confirmPassword = ref('');
      const errorMessage = ref('');
  
      const submitForm = () => {
        errorMessage.value = ''; 
  
        if (password.value.length <= 8) {
          errorMessage.value = 'Password must be more than 8 characters.';
          return;
        }
  
        if (password.value !== confirmPassword.value) {
          errorMessage.value = 'Passwords do not match.';
          return;
        }
  
        console.log('Registration Successful');
       
      };
  
      return {
        name,
        email,
        password,
        confirmPassword,
        submitForm,
        errorMessage,
      };
    },
  };
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Merriweather&display=swap');
  
  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(145deg, #000000 50%, #484646 50%);
    padding: 20px;
    position: relative;
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
    font-family: 'Merriweather', serif;
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
    font-family: 'Roboto', sans-serif;
    font-size: 18px;
    transition: background-color 0.3s ease;
  }
  
  button:hover {
    background-color: #600000;
  }
  
  .error {
    color: red;
    font-size: 14px;
    margin-top: 10px;
  }
  </style>
  
