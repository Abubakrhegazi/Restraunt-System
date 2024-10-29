<template>
    <div class="orders-section">
        <!-- Date Picker and Filters -->
        <div class="controls">
            <div class="date-picker">
                <label for="date">Select Date:</label>
                <input type="date" v-model="selectedDate" @change="applyFilters" />
            </div>

            <div class="filter">
                <label for="status">Filter by Status:</label>
                <select v-model="selectedStatus" @change="applyFilters">
                    <option value="">All</option>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="Ready">Ready</option>
                </select>
            </div>
        </div>

        <!-- Orders Table -->
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Table ID</th>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>Items</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in filteredOrders" :key="order.id">
                    <td>{{ order.tableId }}</td>
                    <td>{{ order.id }}</td>
                    <td>{{ order.customerName }}</td>
                    <td>{{ order.total }}</td>
                    <td>{{ order.items.join(', ') }}</td>
                    <td :class="order.status.toLowerCase()">{{ order.status }}</td>
                    <td>{{ formatTime(order.time) }}</td>
                    <td>
                        <button @click="editOrder(order.id)">Edit</button>
                        <button @click="deleteOrder(order.id)" class="delete-btn">Delete</button>
                    </td>
                </tr>
                <tr v-if="filteredOrders.length === 0">
                    <td colspan="8">No orders found for the selected date and status.</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            selectedDate: new Date().toISOString().substr(0, 10), // Default to today's date
            selectedStatus: "", // Filter by status
            // Static orders data for the past week
            orders: [
                { id: 1, tableId: 5, customerName: "John Doe", total: "$24.50", items: ["Burger", "Fries"], status: "Ready", time: "2024-10-22T12:30:00" },
                { id: 2, tableId: 3, customerName: "Jane Smith", total: "$15.00", items: ["Salad", "Water"], status: "Completed", time: "2024-10-22T14:15:00" },
                { id: 3, tableId: 7, customerName: "Alice Brown", total: "$30.75", items: ["Pizza", "Soda"], status: "Pending", time: "2024-10-23T13:10:00" },
                { id: 4, tableId: 2, customerName: "Bob Johnson", total: "$18.25", items: ["Sandwich", "Tea"], status: "Ready", time: "2024-10-23T16:45:00" },
                { id: 5, tableId: 9, customerName: "Mary Lee", total: "$25.00", items: ["Pasta", "Juice"], status: "Pending", time: "2024-10-24T12:00:00" },
                { id: 6, tableId: 6, customerName: "Chris Martin", total: "$12.50", items: ["Soup", "Salad"], status: "Completed", time: "2024-10-24T15:30:00" },
                { id: 7, tableId: 4, customerName: "Sarah King", total: "$20.00", items: ["Steak", "Water"], status: "Ready", time: "2024-10-25T14:20:00" },
                { id: 8, tableId: 1, customerName: "Daniel Wright", total: "$16.00", items: ["Burger", "Soda"], status: "Completed", time: "2024-10-25T17:00:00" },
                { id: 9, tableId: 8, customerName: "Nancy Green", total: "$10.00", items: ["Salad"], status: "Pending", time: "2024-10-26T11:45:00" },
                { id: 10, tableId: 3, customerName: "Paul White", total: "$22.50", items: ["Pasta", "Tea"], status: "Ready", time: "2024-10-26T16:10:00" },
                { id: 11, tableId: 2, customerName: "Laura Black", total: "$30.00", items: ["Pizza", "Water"], status: "Completed", time: "2024-10-27T13:00:00" },
                { id: 12, tableId: 7, customerName: "Gary Young", total: "$20.00", items: ["Steak"], status: "Pending", time: "2024-10-27T15:30:00" },
                { id: 13, tableId: 5, customerName: "Linda Hill", total: "$28.00", items: ["Burger", "Juice"], status: "Completed", time: "2024-10-28T12:30:00" },
                { id: 14, tableId: 9, customerName: "Robert Gray", total: "$14.00", items: ["Sandwich", "Water"], status: "Ready", time: "2024-10-28T17:45:00" },
                { id: 15, tableId: 5, customerName: "John Doe", total: "$24.50", items: ["Burger", "Fries"], status: "Ready", time: "2024-10-29T12:30:00" },
                { id: 16, tableId: 2, customerName: "Bob Johnson", total: "$18.25", items: ["Sandwich", "Tea"], status: "Ready", time: "2024-10-29T16:45:00" },
                { id: 17, tableId: 5, customerName: "John Doe", total: "$24.50", items: ["Burger", "Fries"], status: "Ready", time: "2024-10-30T12:30:00" },
                { id: 18, tableId: 3, customerName: "Jane Smith", total: "$15.00", items: ["Salad", "Water"], status: "Completed", time: "2024-10-30T14:15:00" },
                { id: 19, tableId: 7, customerName: "Alice Brown", total: "$30.75", items: ["Pizza", "Soda"], status: "Pending", time: "2024-10-30T13:10:00" },
                { id: 20, tableId: 2, customerName: "Bob Johnson", total: "$18.25", items: ["Sandwich", "Tea"], status: "Ready", time: "2024-10-30T16:45:00" },
                { id: 21, tableId: 9, customerName: "Mary Lee", total: "$25.00", items: ["Pasta", "Juice"], status: "Pending", time: "2024-10-30T12:00:00" },
                { id: 22, tableId: 6, customerName: "Chris Martin", total: "$12.50", items: ["Soup", "Salad"], status: "Completed", time: "2024-10-30T15:30:00" },
                { id: 23, tableId: 4, customerName: "Sarah King", total: "$20.00", items: ["Steak", "Water"], status: "Ready", time: "2024-10-30T14:20:00" },



            ],
        };
    },
    computed: {
        filteredOrders() {
            // Filter by date and status
            return this.orders
                .filter(order => {
                    const orderDate = new Date(order.time).toISOString().substr(0, 10);
                    return orderDate === this.selectedDate; // Date filter
                })
                .filter(order => {
                    return this.selectedStatus ? order.status === this.selectedStatus : true; // Status filter
                })
                .sort((a, b) => new Date(b.time) - new Date(a.time)); // Sort by latest time first
        },
    },
    methods: {
        formatTime(time) {
            return new Date(time).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        },
        deleteOrder(id) {
            this.orders = this.orders.filter(order => order.id !== id);
        },
        editOrder(id) {
            alert(`Editing order ID: ${id}`); // Replace with actual edit functionality
        },
        applyFilters() {
            // Just calls the computed property
        }
    },
    mounted() {
        this.applyFilters(); // Load today's orders by default
    },
};
</script>

<style scoped>
.orders-section {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    max-width: 1000px;
}

.controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.date-picker label,
.filter label {
    font-weight: bold;
    margin-right: 10px;
}

.date-picker input,
.filter select {
    padding: 6px;
    font-size: 1em;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.orders-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.orders-table th,
.orders-table td {
    padding: 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
    font-size: 1.1em;
}

.orders-table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.orders-table tr:hover {
    background-color: #f9f9f9;
}

.orders-table .completed {
    color: green;
    font-weight: bold;
}

.orders-table .pending {
    color: orange;
    font-weight: bold;
}

.orders-table .ready {
    color: blue;
    font-weight: bold;
}

.delete-btn {
    background-color: #ff4d4d;
    color: white;
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.delete-btn:hover {
    background-color: #ff1a1a;
}

button {
    background-color: #007bff;
    color: white;
    padding: 6px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 5px;
}

button:hover {
    background-color: #0056b3;
}
</style>
