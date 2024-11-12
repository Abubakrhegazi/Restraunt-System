<template>
  <div class="container">
    <div class="container-login">

      <div class="login-box">
        <img :src="logo" alt="chief hat">
        <h2 class="title">Rest.</h2>
      </div>

      <div class="login">
        <h2>Log in</h2>
        <h5>Continue to your profile</h5>
      </div>

      <form @submit.prevent="login" novalidate>

        <CustomInput name="Email" type="email" v-model="email" placeholder="Email" :error="emailError" />
        <CustomInput name="Password" type="password" v-model="password" placeholder="Password" :error="passwordError" />

        <button @click="submitForm">Login</button>
      </form>

      <div class="separator">
      <div></div>
      <span>or</span>
      <div></div>
      </div>

      <div class="other">
        <a href="">continue with google &#9;<i class="fab fa-google"></i></a>
        <a href="">continue with apple &#9;<i class="fab fa-apple"></i></a>
      </div>

      <div class="footer">
        <p>New to Rest.?<RouterLink to="/signup">Start now</RouterLink></p>
        <span>
          <RouterLink>Privacy</RouterLink>
          <RouterLink>Terms</RouterLink>
        </span>
      </div>
    </div>

    </div>
</template>

<script setup>
import CustomInput from '@/components/inc/CustomInput.vue';

import { onMounted, ref } from 'vue';

import logo from '@/assets/logo/chefIcon.png';

onMounted(() => {
  document.title = "Login - Rest.";
})

const email = ref('');
const password = ref('');
const passwordError = ref("");
const emailError = ref("");

const validateEmail = (email) => {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
};

const submitForm = () => {
  passwordError.value = ""
  emailError.value = ""

  if (!validateEmail(email.value)) {
    emailError.value = "Invalid email address.";
  }

  if (!email.value) {
    emailError.value = "you must entre an email";
  }

  if (password.value.length < 8) {
    passwordError.value = "Password must be atleast 8 characters";
  }

  if (!password.value) {
    passwordError.value = "you must enter a password";
  }

  if (!passwordError.value && !emailError.value) {
    console.log('Login Successful');
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Merriweather&display=swap');

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100dvh;
  background: linear-gradient(to bottom, #8b0000, #0c0c0c);
  padding: 20px;
}

.container-login {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  gap: 0px;
  padding: 50px;
  padding-top: 10px;
  padding-bottom: 4px;

  background-color: #ffffff;
  border-radius: 20px;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
  max-width: 400px;
  min-height: 560px;
  width: 100%;
}

.login-box {
  display: flex;
  padding: 0;
  margin-top: 0;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.login-box img {
  width: 50px;
  min-width: 50px;
}

.login {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  margin-left: 5px;
  margin-bottom: 25px;
}

.login h2,
.login h5 {
  margin: 0;
  padding: 0;
  margin-bottom: 5px;
}

.login h2 {
  color: black;
}

.title {
  font-family: 'Merriweather', serif;
  font-size: 28px;
  color: #8b0000;
  margin-bottom: 18px;
}

button, .other a {
  width: 58%;
  padding: 14px;
  background-color: #8b0000;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 12px;
  margin-left: 30px;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  transition: background-color 0.3s ease;
}

button{
  min-width: 350px;
}

button:hover {
  background-color: #600000;
}

.error {
  color: #ff1a1a;
  font-size: 14px;
  font-family: 'Roboto', sans-serif;
}

.separator {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: flex-start;
    width: 100%;
    margin: 20px 0;
}

.separator div{
  display: block;
  min-width: 180px;
  height: 1px;
  background: #aaa;
}

.separator span{
  padding-inline: 10px;
  color: #aaa;

}


.other {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 100%;
  text-align: center;
  color: white;
  font-family: 'Roboto', sans-serif;
  font-size: 14px;
  border-radius: 0 0 20px 20px;
}

.other a{
  color: black;
  background: none;
  margin: 0;
  text-decoration: none;
  border: 1px solid black;
  padding-inline: 10px;
  padding-block: 5px;
  font-size: 17px;
  border-radius: 13px;
  margin-bottom: 10px;
}

.other a:hover{
  backdrop-filter: blur(8px);
  box-shadow: inset 0 0 0 150px #0000001a;
  border-width: 1px;
}

.footer{
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  font-size: 12px;
  margin-bottom: 0;
  padding-bottom: 0;
  flex-direction: row;

}

.footer span{
  display: flex;
  justify-content: center;
  align-items: center;
  margin-left: 10px;
}

.footer span .router-link-exact-active{
  margin-left: 10px;
}

.footer p a{
  margin-left: 5px;
}

.footer span .router-link-exact-active:hover,.footer p a:hover{
  color: blue;
}

@media (max-width: 600px) {

    .container-login {
      width: 90vw;
      height: 100dvh;
      max-height: none;
      border-radius: 0;
      padding-top: 0;
      padding: 30px;
      margin: 0;
    }

    .footer{
      padding-bottom: 30px;
    }

    button{
      margin-left: 0px;
      width: 90vw;
      max-width: 375px;
    }
  }


</style>
