<template>
    <div class="left-panel">
      <img :src="employee.image" alt="Employee Profile" class="profile-image" />
      <h2 class="employee-name">{{ employee.name }}</h2>
      <p class="employee-title">{{ employee.title }}</p>
  
      <div class="employee-details">
        <div class="detail-item">
          <p><strong>Status:</strong></p>
          <p>Onboarding</p>
        </div>
        <div class="detail-item">
          <p><strong>Email:</strong></p>
          <p><a :href="'mailto:' + employee.email">{{ employee.email }}</a></p>
        </div>
        <div class="detail-item">
          <p><strong>Phone Number:</strong></p>
          <p>{{ employee.phone }}</p>
        </div>
        <div class="detail-item">
          <p><strong>Office:</strong></p>
          <p>207 Queens Quay, #400</p>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      employee: Object,
    },
  };
  </script>
  
  <style scoped>
  .left-panel {
    background:white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    min-width: 400px;
  }
  
  .profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 4px solid #000000;
    margin-bottom: 15px;
  }
  
  .employee-name {
    color: #000000;
  }
  
  .employee-title {
    color: #000000;
  }
  
  .employee-details {
    margin-top: 20px;
  }
  
  .detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }
  
  .employee-details p {
    margin: 0;
    color: #000000;
    font-size: 0.9rem;
  }
  
  .employee-details a {
    color: #000000;
    text-decoration: none;
  }
  
  .employee-details a:hover {
    text-decoration: underline;
  }
  </style>
  