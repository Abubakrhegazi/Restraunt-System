<template>
    <div class="left-panel">
      <img :src="employee.image" alt="Employee Profile" class="profile-image" />
      <h2>{{ employee.name }}</h2>
      <p class="job-title">{{ employee.title }}</p>
      <p><strong>Email:</strong> {{ employee.email }}</p>
      <p><strong>Company:</strong> {{ employee.company }}</p>
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
    background-color: #0c0c0c;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 40%; /* Wider left panel */
    height: 50%; /* Shorter height */
  }
  
  .profile-image {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 4px solid #8b0000;
    margin-bottom: 15px;
  }
  
  .job-title {
    color: #8b0000;
    font-size: 1.2rem;
    margin-bottom: 10px;
  }
  </style>
  