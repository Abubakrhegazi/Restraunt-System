<template>
  <div class="main-container-input">
    <label :for="name">{{ name }}:</label>
    <input
      :name="name"
      :type="type"
      :placeholder="placeholder"
      v-model="inputValue" 
      @input="updateValue" 
    />
  </div>
</template>

<script>
export default {
  props: ['name', 'type', 'placeholder', 'modelValue'],
  data() {
    return {
      inputValue: this.modelValue || ''
    };
  },
  watch: {
    modelValue(newValue) {
      this.inputValue = newValue; 
    },
  },
  methods: {
    updateValue() {
      this.$emit('update:modelValue', this.inputValue); 
    },
  },
};
</script>

<style scoped>
.main-container-input {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-bottom: 15px; 
}

label {
  font-weight: bold;
  margin-bottom: 5px; 
  color: #333; 
}

input {
  padding: 10px; 
  border: 1px solid #ccc;
  border-radius: 5px; 
  font-size: 16px; 
  outline: none; 
  transition: border-color 0.3s; 
}

input:focus {
  border-color: #3498db; 
}

input::placeholder {
  color: #aaa;
}
</style>
