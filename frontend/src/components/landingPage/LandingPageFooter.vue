<template>
    <footer class="footer">
      <div class="footer-container">
        <div class="footer-section">
          <h3>Company Name</h3>
          <p>Delivering excellence in web solutions since 2023.</p>
        </div>
  
        <div class="footer-section">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
  
        <div class="footer-section">
          <h3>Follow Us</h3>
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
            <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
            <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
          </ul>
        </div>
      </div>
  
      <div class="footer-bottom">
        <p>&copy; 2024 Company Name. All rights reserved.</p>
      </div>
    </footer>
  </template>
  
  <style scoped>
  .footer {
    background-color: #0F110C; /* Dark Red */
    color: #FDECEF; /* White */
    padding: 20px 0;
    text-align: center;
  }
  
  .footer-container {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }
  
  .footer-section {
    flex: 1;
    margin: 10px;
  }
  
  .footer-section h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #FDECEF;
  }
  
  .footer-section ul {
    list-style-type: none;
    padding: 0;
  }
  
  .footer-section ul li {
    margin-bottom: 10px;
  }
  
  .footer-section ul li a {
    color: #FDECEF;
    text-decoration: none;
    font-size: 0.95em;
  }
  
  .footer-section ul li a:hover {
    text-decoration: underline;
  }
  
  .social-links i {
    margin-right: 8px;
  }
  
  .footer-bottom {
    margin-top: 20px;
    font-size: 0.85em;
    border-top: 1px solid #FDECEF;
    padding-top: 10px;
  }
  
  @media (max-width: 768px) {
    .footer-container {
      flex-direction: column;
    }
  }
  </style>
  