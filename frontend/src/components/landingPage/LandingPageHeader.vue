<template>
    <header class="header" id="header">
      <div class="container">
        <nav class="nav">
        <button @click="toggleNav">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg>
        </button>
            <h2>Rest.</h2>
          <ul class="nav-links" v-if="toggle">
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/features">Features</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>
          </ul>
          <!-- Auth Links -->
          <div class="auth">
            <router-link to="/signup">SignUp</router-link>
            <router-link to="/login">Login</router-link>
          </div>

        </nav>
      </div>
    </header>
  </template>

  <script setup>
import { ref, onMounted } from 'vue';

    const toggle = ref(false)

    const  toggleNav = () => {
        toggle.value = !toggle.value
    }

    const checkScreenWidth = () => {
      if (window.innerWidth > 600) {
        toggle.value = true; 
      } else {
        toggle.value = false;      
      }
    };

    const onScroll = () => {
    const header = document.getElementById('header');
    const scrollHeight = 120; 

    if (window.scrollY > scrollHeight) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
};


    onMounted(() => {
      checkScreenWidth();
      window.addEventListener('scroll', onScroll);
      window.addEventListener('resize', checkScreenWidth); 
    });

 </script>
  
  <style scoped>
  /* Main container for the header */
  .header .container {
    max-width: 1200px;
    margin: 0 auto;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .scrolled {
  position: sticky;
  top: 0;
  left: 0;
  background-color: #c9c8c7;
  color: white;
  transition: background-color 0.3s ease, color 0.3s ease;
}
  
  /* Navigation bar styling */
  .nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
    padding-top: 30px;
  }
  
  /* Company name styling */
  .nav h2 {
    font-size: 1.5em;
    margin: 0;
    margin-left: 20px;
    color: #0c0c0c;
  }
  
  /* Navigation links styling */
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

  .nav button svg{
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
    color: #c9c8c7; /* Lightened red on hover */
  }
  
  /* Auth links styling */
  .auth {
    display: flex;
    gap: 20px;
    margin-left: 20px;
  }
  
  .auth a{
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
    border: 2px solid #0c0c0c;
    padding: 8px;
    padding-inline: 15px;
    border-radius: 20px;
    color: #0c0c0c;
  }

  .auth a:first-child{
    color: #c9c8c7;
    background: #0c0c0c;
  }
  
  .auth a:hover {
    color: #c9c8c7;
  }

  .auth a:first-child:hover {
    color: #0c0c0c;
    background: #c9c8c7;
  }
  
  /* Prevent content from hiding behind the header */
  body {
    padding-top: 70px;
  }

  @media (max-width: 480px) {
  /* Styles for small mobile devices */
}

@media (max-width: 600px) {
  /* Styles for mobile devices */
    .nav button{
        display: block;
    }

   .nav,.nav ul{
    flex-direction: column;
   }

   .nav ul{
    flex-direction: column;
    transition: ease 0.5s;
   }

   .nav h2{
    margin-top: 20px;
   }
   .nav h2, .nav ul{
    margin-bottom: 20px;
   }

   .nav .auth{
    margin-top: 30px;
   }
}


@media (max-width: 768px) {
      /* Styles for tablets in portrait mode */
}

  </style>
  