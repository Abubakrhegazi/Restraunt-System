<template>
    <div class="table-container">
        <h2 class="meals-header">Meals</h2>
        <table class="meals-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Categories</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(meal, index) in meals" :key="index">
                    <td>{{ meal.name }}</td>
                    <td>{{ meal.stock }}</td>
                    <td>{{ meal.price }}</td>
                    <td>{{ meal.categories.join(', ') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'Meals',
    data() {
        return {
            meals: [
                { name: 'Soup', stock: 'In stock', price: '$10.00', categories: ['Category 1', 'Category 2'] },
                { name: 'Coffee', stock: 'In stock', price: '$10.00', categories: ['Category 1', 'Category 3'] },
                { name: 'Soda', stock: 'In stock', price: '$10.00', categories: ['Category 2', 'Category 4'] },
                { name: 'New Meal', stock: 'In stock', price: '$10.00', categories: ['Category 1', 'Category 4'] },
            ],
        };
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
    margin-top: 20px;
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
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.meals-table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.meals-table tr:hover {
    background-color: #f1f1f1;
}
</style>
