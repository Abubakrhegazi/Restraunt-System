<template>
    <div class="right-panel">
      <div class="basic-info">
        <h3>Basic Information</h3>
        <button class="edit-button">Edit</button>
        <div class="info-grid">
          <p><strong>First Name:</strong></p>
          <p>Alexandra</p>
          <p><strong>Last Name:</strong></p>
          <p>Smith</p>
          <p><strong>Phone (Work):</strong></p>
          <p>416-564-4374</p>
          <p><strong>Employee ID:</strong></p>
          <p>5643</p>
          <p><strong>Parking Space Number:</strong></p>
          <p>P1-21</p>
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
  .right-panel {
    flex: 1;
    background: linear-gradient(to bottom, #8b0000, #363232);
    padding: 20px;
    border-radius: 8px;
    color: #ffffff;
    height: 400px;
    position: relative;

  }
  
  .basic-info {
    color: #ffffff;
    padding: 10px;
  }
  
  .basic-info h3 {
    font-size: 1.5rem;
    color: #333333;
    margin: 0;
    margin-bottom: 30px;
    display: flex;
  }
  
  .edit-button {
    background-color: #8b0000;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    padding: 8px 12px;
    cursor: pointer;
    margin-bottom: 0px;
    transition: background-color 0.3s ease;
    float: right;
    position: absolute;
    top: 10px;
    right: 10px;
  }
  
  .edit-button:hover {
    background-color: #600000;
  }
  
  .info-grid {
    display: grid;
    grid-template-columns: auto auto; /* Two columns for labels and values */
    gap: 40px 60px; /* Space between rows and columns */
    margin-top: 20px;
  }
  
  .info-grid p {
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: row;
  }
  </style>