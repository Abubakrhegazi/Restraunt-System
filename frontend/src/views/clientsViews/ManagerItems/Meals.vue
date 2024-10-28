<template>
    <div class="meals-section">
        <!-- Switch maben Meals w Categories -->
        <div class="tabs">
            <button :class="{ active: selectedTab === 'meals' }" @click="selectedTab = 'meals'">Meals</button>
            <button :class="{ active: selectedTab === 'categories' }"
                @click="selectedTab = 'categories'">Categories</button>
        </div>

        <!-- add/import/export -->
        <div v-if="selectedTab === 'meals'" class="meals-content">
            <div class="actions">
                <button @click="addNewMeal">Add New</button>
                <button @click="importMeals">Import</button>
                <button @click="exportMeals">Export</button>
            </div>

            <!-- Filter w Search -->
            <div class="filters">
                <select v-model="selectedBulkAction" @change="applyBulkAction">
                    <option value="">Bulk actions</option>
                    <option value="delete">Delete</option>
                </select>
                <button @click="applyBulkAction">Apply</button>

                <select v-model="selectedCategory" @change="filterMeals">
                    <option value="">Select a category</option>
                    <!-- Populate with categories dynamically -->
                </select>

                <select v-model="selectedProductType" @change="filterMeals">
                    <option value="">Filter by product type</option>
                    <!-- Populate with product types dynamically -->
                </select>

                <select v-model="selectedStockStatus" @change="filterMeals">
                    <option value="">Filter by stock status</option>
                    <!-- Populate with stock statuses dynamically -->
                </select>

                <input v-model="searchQuery" placeholder="Search products" @input="filterMeals" />
            </div>

            <!-- Meals List -->
            <table class="meals-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" v-model="selectAll" @change="toggleSelectAll" /></th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Categories</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="meal in filteredMeals" :key="meal.id">
                        <td><input type="checkbox" v-model="meal.selected" /></td>
                        <td>{{ meal.name }}</td>
                        <td :class="{ 'in-stock': meal.inStock, 'out-of-stock': !meal.inStock }">
                            {{ meal.inStock ? 'In stock' : 'Out of stock' }}
                        </td>
                        <td>{{ meal.price }}</td>
                        <td>{{ meal.categories.join(', ') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Categories Tab Content -->
        <div v-if="selectedTab === 'categories'" class="categories-content">
            <!-- Add categories management content here -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedTab: 'meals',
            selectedBulkAction: '',
            selectedCategory: '',
            selectedProductType: '',
            selectedStockStatus: '',
            searchQuery: '',
            selectAll: false,
            meals: [
                { id: 1, name: 'Soup', inStock: true, price: '$10.00', categories: ['Category 1', 'Category 2'] },
                { id: 2, name: 'Coffee', inStock: true, price: '$10.00', categories: ['Category 1'] },
                // Add more meals as needed
            ],
        };
    },
    computed: {
        filteredMeals() {
            return this.meals.filter(meal => {
                // Apply filters for category, product type, stock status, and search query
                return true; // Implement your filtering logic here
            });
        },
    },
    methods: {
        addNewMeal() {
            // Logic to add a new meal
        },
        importMeals() {
            // Logic to import meals
        },
        exportMeals() {
            // Logic to export meals
        },
        applyBulkAction() {
            // Logic for bulk actions
        },
        filterMeals() {
            // Logic to filter meals based on selected filters
        },
        toggleSelectAll() {
            this.meals.forEach(meal => {
                meal.selected = this.selectAll;
            });
        },
    },
};
</script>

<style scoped>
.table-container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 1200px;
    margin: 20px;
    flex-grow: 1;
    max-width: 80%;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.meals-header {
    text-align: center;
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
}

.meals-table {
    width: 100%;
    border-collapse: collapse;
}

.meals-table th,
.meals-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    font-size: 18px;
}

.meals-table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.meals-table tr:hover {
    background-color: #f1f1f1;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Modify Button Styles */
#modify {
    background-color: #3498db;
    /* Blue */
    color: white;
}

#modify:hover {
    background-color: #2980b9;
    /* Darker Blue */
    transform: scale(1.05);
}

/* Delete Button Styles */
#delete {
    background-color: #e74c3c;
    /* Red */
    color: white;
}

#delete:hover {
    background-color: #c0392b;
    /* Darker Red */
    transform: scale(1.05);
}

.tabs {
    display: flex;
    gap: 10px;
}

.tabs button.active {
    font-weight: bold;
}

.meals-content .actions {
    display: flex;
    gap: 10px;
}

.filters {
    display: flex;
    gap: 10px;
}

.meals-table {
    width: 100%;
    border-collapse: collapse;
}

.meals-table th,
.meals-table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.in-stock {
    color: green;
}

.out-of-stock {
    color: red;
}
</style>
