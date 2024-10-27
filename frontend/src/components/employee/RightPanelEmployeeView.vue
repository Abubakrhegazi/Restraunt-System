<template>
    <div class="right-panel">
      <div class="basic-info">
        <h3>Basic Information</h3>
        <button class="edit-button">Edit</button>
        <p><strong>First Name:</strong> {{ employee.firstName }}</p>
        <p><strong>Last Name:</strong> {{ employee.lastName }}</p>
        <p><strong>Phone (Work):</strong> {{ employee.phone }}</p>
        <p><strong>Employee ID:</strong> {{ employee.employeeId }}</p>
        <p><strong>Parking Space Number:</strong> {{ employee.parkingSpace }}</p>
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
  .right-panel {
    flex: 1; /* Allows flexibility */
    background-color: #0c0c0c;
    padding: 20px;
    border-radius: 8px;
    width: 60%; /* Wider right panel */
    height: 60%; /* Shorter height */
  }
  
  .basic-info {
    color: #ffffff;
  }
  
  .basic-info h3 {
    font-size: 1.5rem;
    color: #8b0000;
    margin-bottom: 10px;
  }
  
  .edit-button {
    background-color: #8b0000;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 8px 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    float: right;
  }
  
  .edit-button:hover {
    background-color: #600000;
  }
  </style>
  