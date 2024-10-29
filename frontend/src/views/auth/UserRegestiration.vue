<template>
  <div class="container">
    <div class="container-UserSignup">
      <button v-if="step >= 2"  @click="onClickBack" class="back"><i class="fa-solid fa-arrow-left"></i></button>

      <div class="title">
        <img :src="logo" alt="chief hat">
        <h3 v-if="step === 1">Sign up to<br> create your Restaurant</h3>
        <h3 v-if="step === 2">Finish your account</h3>
      </div>

      <form @submit.prevent="submitForm" novalidate>

        <!-- Step 1 -->
        <div v-if="step === 1">
          <CustomInput name="Email" type="email" v-model="email" placeholder="Email" :error="emailError" />
          <button class="signup" type="button" @click="nextOnClick">Next</button>

          <div class="separator">
            <div></div>
            <span>or</span>
            <div></div>
          </div>

          <div class="other">
            <RouterLink to="/auth/google">Continue with Google &#9;<i class="fab fa-google"></i></RouterLink>
            <RouterLink to="/auth/apple">Continue with Apple &#9;<i class="fab fa-apple"></i></RouterLink>
          </div>
        </div>

        <!-- Step 2 -->
        <div v-if="step === 2" class="step2">
          <div class="name">
            <div>
              <CustomInput name="firstName" type="text" v-model="firstName" placeholder="firstname" :error="nameError.firstName"/>
            </div>
            <div>
              <CustomInput name="lastName" type="text" v-model="lastName" placeholder="lastname" :error="nameError.lastName"/>
            </div>
          </div>
          <CustomInput name="phoneNumber" type="text" v-model="phoneNumber" placeholder="phone number" :error="phoneNumberError"/>
          <CustomInput name="password" type="password" v-model="password" placeholder="password" />

          <!-- Password validation feedback -->
          <div class="validation">
            <p>Your password must contain at least:</p>
            <div :class="{'green': passwordError.noLetter === 1 , 'red': passwordError.noLetter === 0 }">
              <div></div>
              <p>1 letter</p>
            </div>
            <div :class="{'green': passwordError.noNumberOrSpecialChar === 1, 'red': passwordError.noNumberOrSpecialChar === 0 }">
              <div></div>
              <p>1 number or special character (example: # ? ! &)</p>
            </div>
            <div :class="{'green': passwordError.lessThan8 === 1, 'red': passwordError.lessThan8 === 0 }">
              <div></div>
              <p>8 characters</p>
            </div>
          </div>

          <button type="submit" class="signup" @click="onSubmit">Sign up</button>
          <div class="terms">
            <input type="checkbox" required name="terms" v-model="terms">
            <RouterLink to="/terms">Terms & Conditions</RouterLink>
          </div>
          <p v-if="terms === false" class="terms-error">you must agree on the terms and condtions</p>
        </div>

      </form>

      <div v-if="step === 1" class="footer">
        <p>Already have an account? <RouterLink to="/login">Log in</RouterLink></p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useRouter } from 'vue-router';
import CustomInput from '@/components/inc/CustomInput.vue';
import logo from '@/assets/logo/chefIcon.png';


const email = ref('');
const password = ref('');
const firstName = ref('');
const lastName = ref('');
const phoneNumber = ref('');
const emailError = ref('');
const nameError = ref({
  firstName: '',
  lastName: ''
});
const phoneNumberError = ref('');
const passwordError = ref({
  noLetter: -1,
  noNumberOrSpecialChar: -1,
  lessThan8: -1
});
const terms = ref(true)
const step = ref(1);


const router = useRouter();

const validateEmail = (email) => {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
};

const validatePassword = () => {
  const noLetterRegex = /^(?=.*[a-zA-Z]).*$/;
  const noNumberRegex = /^(?=.*[0-9]).*$/;
  const noSpecialCharRegex = /^(?=.*[!@#$%^&*(),.?":{}|<>~`_+=\-[\]\\\/]).*$/;

  passwordError.value = {
    noLetter: noLetterRegex.test(password.value) ? 1 : 0,
    noNumberOrSpecialChar: (noNumberRegex.test(password.value) || noSpecialCharRegex.test(password.value)) ? 1 : 0,
    lessThan8: password.value.length >= 8 ? 1 : 0
  };
};

const validateNumber = () => {
  const phone = phoneNumber.value;
  const isNumeric = /^\d+$/.test(phone); 

  if (!isNumeric) {
    phoneNumberError.value = 'you must enter a number';
    return false;
  }

  if(phone.length !== 12 && !(phone.startsWith('0') || phone.startsWith('+2'))){
    phoneNumberError.value = 'you must enter a valid phone number';
    return false;
  }

  phoneNumberError.value = '';
  return true;
};


watch(password, validatePassword);

const nextOnClick = () => {
  emailError.value = '';

  if (!email.value) {
    emailError.value = 'You must enter an email.';
    return;
  }
  if (!validateEmail(email.value)) {
    emailError.value = 'Invalid email address.';
    return;
  }
  step.value++;
};

const onClickBack = () => {
  step.value--;
}

const submitForm = () => {
  nameError.value.firstName = nameError.value.lastName = ''
  

  // Check password requirements
  if ((
    passwordError.value.noLetter === 0 ||
    passwordError.value.noNumberOrSpecialChar === 0 ||
    passwordError.value.lessThan8 === 0
  )||
    passwordError.value.noLetter === -1 ||
    passwordError.value.noNumberOrSpecialChar === -1 ||
    passwordError.value.lessThan8 === -1
) {
    passwordError.value.noLetter = passwordError.value.noNumberOrSpecialChar = passwordError.value.lessThan8 = 0
    return;
  }

  // Check first name and last name
  if (!firstName.value) {
    nameError.value.firstName = 'Enter your first name';
    return;
  }
  if (!lastName.value) {
    nameError.value.lastName = 'Enter your last name';
    return;
  }

  // Check phone number
  if (!validateNumber()) return;

  if(!password.value){
    passwordError.value.noLetter = passwordError.value.lessThan8 = passwordError.value.noNumberOrSpecialChar = 0
  }

  if(terms.value === false){
     return
  } 

  console.log('Registration Successful');
  router.push('/login'); 
};

</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Merriweather&display=swap');

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  background: linear-gradient(to left, #8b0000, #0c0c0c);
  height: 100dvh;
}

.container-UserSignup {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 15px;
  padding-inline: 40px;
  padding-bottom: 15px;
  padding-top: 10px;
  background-color: #ffffff;
  border-radius: 20px;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
  min-width: 500px;
  max-width: 400px;
  width: 100%;
}

.title {
  font-family: 'Roboto', sans-serif;
  font-size: 28px;
  color: #8b0000;
  margin-bottom: 20px;
}

.title h3 {
  margin: 0;
}

.title img {
  width: 100px;
  min-width: 100px;
  margin: 0;
  padding: 0;
}

.signup,
.other a {
  width: 58%;
  height: 50px;
  padding: 14px;
  background-color: #8b0000;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 12px;
  font-family: 'Roboto', sans-serif;
  font-size: 18px;
  transition: background-color 0.3s ease;
}

.signup:hover {
  background-color: #600000;
}


.separator {
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: flex-start;
  width: 100%;
  margin: 20px 0;
}

.separator div {
  display: block;
  min-width: 180px;
  height: 1px;
  background: #aaa;
}

.separator span {
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

.other a {
  color: black;
  background: none;
  margin: 0;
  text-decoration: none;
  border: 1px solid black;
  padding-inline: 10px;
  padding-block: 5px;
  font-size: 17px;
  border-radius: 13px;
  margin-bottom: 20px;
  max-height: 20px;
}

.other a:hover {
  backdrop-filter: blur(8px);
  box-shadow: inset 0 0 0 150px #0000001a;
  border-width: 1px;
}

.footer p a:hover {
  color: blue;
}

.name {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
}

.name div {
  max-width: 200px;
}

.name div:first-child {
  margin-right: 50px;
}

.validation {
  display: flex;
  justify-content: center;
  align-items: flex-start;
  flex-direction: column;
  margin: 0;
  margin-bottom: 20px;
  font-size: 0.8rem;
}

.validation div {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;
  margin: 0;
}

.validation p:first-child {
  margin-top: 0px;
  font-size: 1rem;
}

.validation div p,
.validation div div {
  margin: 5px;
  margin-top: 0;

}

.validation div div {
  height: 10px;
  width: 10px;
  border: 1px solid;
  border-radius: 20px;
}

.terms {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;

}

.green div,
.green p {
  color: green;
  transition: color;
}

.red div,
.red p {
  color: red;
  transition: color;
}

.terms-error{
  color: #ff1a1a;
  font-size: 12px;
  margin: 0;
}

.back{
  position:absolute;
  top: 1;
  left: 0;
  background: none;
  border: none;
}

.back i{
  width: 40px;
}



@media (max-width: 600px) {
  .container-UserSignup {
    height: 100dvh;
    overflow: hidden;
    box-shadow: none;
  }

  .name {
    display: block;
    min-width: 350px;
  }

  .name div:first-child {
    margin-right: 0;
  }

  .name div {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    min-width: 100%;
    max-width: 350px;
  }

  .name div input {
    min-width: 350px;
  }
}
</style>
