<template>
    <header class="header" id="header">
      <div class="container">
        <nav class="nav">
        <button @click="toggleNav">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
        </button>
            <h2>Rest.</h2>
          <ul class="nav-links" id="links" v-if="toggle">
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/features">Features</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>
          </ul>
          <!-- Auth Links -->
          <div class="auth" id="auth-links">
            <router-link to="/signup">SignUp</router-link>
            <router-link to="/login">Login</router-link>
          </div>

        </nav>
      </div>
    </header>
  </template>

  <script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const toggle = ref(false);

const toggleNav = () => {
  toggle.value = !toggle.value;
};

const checkScreenWidth = () => {
  toggle.value = window.innerWidth > 600;
};

const onScroll = () => {
  const header = document.getElementById('header');
  const links = document.getElementById('links');
  const authLinks = document.getElementById('auth-links');
  const scrollHeight = 120;

  if (header && links && authLinks) {
    if (window.scrollY > scrollHeight) {
      header.classList.add('scrolled');
      links.classList.add('scrolled-links');
      authLinks.classList.add('scrolled-auth-links');
    } else {
      header.classList.remove('scrolled');
      links.classList.remove('scrolled-links');
      authLinks.classList.remove('scrolled-auth-links');
    }
  }
};

onMounted(() => {
  checkScreenWidth();
  window.addEventListener('scroll', onScroll);
  window.addEventListener('resize', checkScreenWidth);
});

onUnmounted(() => {
  window.removeEventListener('resize', checkScreenWidth);
  window.removeEventListener('scroll', onScroll);
});


 </script>
  
  <style scoped>
  .header .container {
    max-width: 1200px;
    margin: 0 auto;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .scrolled {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #f6e1c3;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
    padding-top: 30px;
  }

  .nav h2 {
    font-size: 1.5em;
    margin: 0;
    margin-left: 20px;
    color: #0c0c0c;
  }

  .nav-links {
    list-style: none;
    display: flex;
    gap: 40px;
    margin: 0;
    margin-left: 20px;
    padding: 0;
    color: #0c0c0c;
  }

  .nav button {
    width: 50px;
    height: 50px;
    border: none;
    background: none;
    display: none;
    color: #0c0c0c;
  }

  .nav button svg {
    width: 50px;
    height: 50px;
    display: block;
    flex-shrink: none;
  }

  .nav-links li a {
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
    color: #0c0c0c;
  }

  .nav-links li a:hover {
    color: #ffffff;
  }

  .auth {
    display: flex;
    gap: 20px;
    margin-left: 20px;
  }

  .auth a {
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
    border: 2px solid #0c0c0c;
    padding: 8px;
    padding-inline: 18px;
    border-radius: 20px;
    color: #0c0c0c;
  }

  .auth a:first-child {
    color: white;
    background: #0c0c0c;
  }

  .auth a:hover {
    color: #ffffff;
    color: black;

  }

  .auth a:first-child:hover {
    color: black;
    background: #ffffff;
  }

  .header .container {
    max-width: 1200px;
    margin: 0 auto;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .scrolled {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #f6e1c3;
    color: white;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .scrolled-links a {
    color: #0c0c0c;
    transition: ease 1s;
  }

  .scrolled-links a:hover {
    background: #0c0c0c;
    border-radius: 30px;
    padding: 7px;
  }

  .scrolled-auth-links a {
    color: #0c0c0c;

  }

  .scrolled-auth-links a:hover {
    color: #c9c8c7;
    background: #0c0c0c;
  }




  body {
    padding-top: 70px;
  }

  @media (max-width: 480px) {
  }

  @media (max-width: 600px) {

    .nav button {
      display: block;
    }

    .nav,
    .nav ul {
      flex-direction: column;
    }

    .nav ul {
      flex-direction: column;
      transition: ease 0.5s;
    }

    .nav h2 {
      margin-top: 20px;
    }

    .nav h2,
    .nav ul {
      margin-bottom: 20px;
    }

    .nav .auth {
      margin-top: 30px;
    }

    .scrolled {
      display: block;
      padding: 15px 30px;
      padding-top: 30px;
    }
  }


  @media (max-width: 768px) {
  }

</style>
  