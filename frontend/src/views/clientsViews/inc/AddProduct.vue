<template>
    <div>
        <button @click="openPopup" class="btn-submit">Add Product</button>

        <div v-if="isPopupVisible" class="popup">
            <div class="popup-content">
                <h2>Add a Product</h2>
                <form @submit.prevent="addProduct">
                    <div class="input-group">
                        <label for="productName">Product Name</label>
                        <input type="text" id="productName" v-model="productName" required>
                    </div>

                    <div class="input-group">
                        <label for="category">Category</label>
                        <select v-model="category" required>
                            <option v-for="category in categories" :key="category" :value="category">{{ category }}
                            </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" v-model="price" required>
                    </div>

                    <button type="submit" class="btn-submit">Add Product</button>
                </form>
                <button @click="closePopup" class="close-btn">Close</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isPopupVisible: false,
            productName: "",
            category: "",
            price: null,
            categories: ['Burger', 'Pasta', 'Salad']  // Example categories
        };
    },
    methods: {
        openPopup() {
            this.isPopupVisible = true;
        },
        closePopup() {
            this.isPopupVisible = false;
        },
        addProduct() {
            // Logic to handle adding the product
            console.log(`Product Added: ${this.productName}, ${this.category}, ${this.price}`);
            this.closePopup();
        }
    }
};
</script>

<style scoped>
/* Dark overlay for the popup background */
* {
    font-family: 'Roboto', 'sans-serif';
}

.popup {
    display: flex;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup-content {
    background-color: #2c2c2c;
    padding: 30px;
    border-radius: 15px;
    width: 40%;
    border: 2px solid #8B0000;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.popup-content h2 {
    color: #f5f5f5;
    font-size: 24px;
    margin-bottom: 20px;
    border-bottom: 1px solid #8B0000;
    padding-bottom: 10px;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    color: #fff;
    margin-bottom: 5px;
    font-size: 14px;
}

.input-group input,
.input-group select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 14px;
    background-color: #fff;
}

.input-group input:focus,
.input-group select:focus {
    outline: none;
    border: 1px solid #8B0000;
}

.btn-submit {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: #8B0000;
    color: white;
    margin-top: 10px;
    font-size: 16px;
}

.btn-submit:hover {
    background-color: #a60000;
}

.close-btn {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    background-color: #666;
    color: white;
    margin-top: 15px;
    font-size: 16px;
}

.close-btn:hover {
    background-color: #888;
}
</style>
