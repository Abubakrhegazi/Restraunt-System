<template>
    <header class="sticky-header">
      <div class="container">
        <nav>
          <ul>
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/features">Features</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>

            <li><router-link to="/signup">Signup</router-link></li>
            <li><router-link to="/login">Login</router-link></li>
          </ul>
        </nav>
      </div>
    </header>
  </template>
  
  <style scoped>
  /* Sticky Header Styles */
  .sticky-header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #0F110C; /* Dark red background */
    color: #FDECEF; /* White text */
    padding: 15px 0;
    z-index: 1000; /* Ensures the header stays on top */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for separation */
  }
  
  .sticky-header .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .sticky-header nav ul {
    list-style: none;
    display: flex;
    gap: 20px;
  }
  
  .sticky-header nav ul li {
    display: inline;
  }
  
  .sticky-header nav ul li a {
    color: #FDECEF;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
  }
  
  .sticky-header nav ul li a:hover {
    color: #ffcccb; /* Lightened red on hover */
  }
  
  /* Add some padding to the body to prevent content from hiding behind the header */
  body {
    padding-top: 70px; /* Adjust based on header height */
  }
  </style>
  