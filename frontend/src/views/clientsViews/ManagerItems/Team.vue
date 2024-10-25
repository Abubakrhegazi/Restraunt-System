<template>
    <div class="table-container">
        <h2 class="team-header">Team</h2>
        <table class="team-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Shift</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(member, index) in team" :key="index">
                    <td>{{ member.name }}</td>
                    <td>{{ member.role }}</td>
                    <td>{{ member.status }}</td>
                    <td>{{ member.shift }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'Team',
    data() {
        return {
            team: [
                { name: 'John Doe', role: 'Manager', status: 'Active', shift: 'Morning' },
                { name: 'Jane Smith', role: 'Chef', status: 'On leave', shift: 'Evening' },
                { name: 'Emily Johnson', role: 'Cashier', status: 'Active', shift: 'Afternoon' },
                { name: 'Michael Brown', role: 'Chef', status: 'Active', shift: 'Morning' },
                { name: 'Sarah Davis', role: 'Cashier', status: 'Inactive', shift: 'Evening' },
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

.team-header {
    text-align: center;
    font-size: 24px;
    margin-bottom: 10px;
    color: #333;
}

.team-table {
    width: 100%;
    border-collapse: collapse;
}

.team-table th,
.team-table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.team-table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.team-table tr:hover {
    background-color: #f1f1f1;
}
</style>
