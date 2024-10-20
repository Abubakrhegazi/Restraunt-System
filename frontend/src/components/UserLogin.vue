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
        name="Password"
        type="password"
        v-model="Password"
        placeholder="Password"
      />
      <p v-if="passwordError" class="error">Password must be at least 8 characters long.</p>
      <button @click="submitForm">Login</button>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
      <p>Contact Us</p>
      <p>Email: support@mycompany.com</p>
      <p>Phone: +1 (800) 123-4567</p>
    </footer>
  </div>
</template>

<script>
import UserInput from './inc/UserInput.vue';

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
      this.passwordError = this.Password.length < 8;
      if (!this.passwordError) {
        console.log('Login Successful');
      }
    },
  },
};
</script>

<!-- Updated CSS with Footer Style -->
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
  color: #ff1a1a;
  font-size: 14px;
  font-family: 'Roboto', sans-serif;
}

/* Footer Styling */
.footer {
position: relative;
top:132px;
  width: 100%;
  text-align: center;
  padding: 15px;
  background-color: rgba(0, 0, 0, 0.85); /* Dark background */
  color: white;
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  border-radius: 0 0 20px 20px;
}

.footer p {
  margin: 5px 0;
}

.footer p:first-child {
  font-size: 16px;
  font-weight: bold;
}
</style>
