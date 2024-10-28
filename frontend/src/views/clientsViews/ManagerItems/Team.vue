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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(member, index) in team" :key="index">
                    <td>{{ member.name }}</td>
                    <td>{{ member.role }}</td>
                    <td>{{ member.status }}</td>
                    <td>{{ member.shift }}</td>
                    <td>
                        <button class="edit-button" @click="editMember(index)">Edit</button>
                        <button class="fire-button" @click="fireMember(index)">🔥 Fire</button>
                    </td>
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
    methods: {
        editMember(index) {
            // Logic to edit the member (e.g., open a form for editing)
            alert(`Edit member: ${this.team[index].name}`);
        },
        fireMember(index) {
            // Logic to fire the member (e.g., remove from the list or change status)
            alert(`Fire member: ${this.team[index].name}`);
        }
    }
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
    padding: 15px;
    /* Increased padding for better readability */
    font-size: 18px;
    /* Increased font size */
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.team-table th {
    background-color: #e0e0e0;
    font-weight: bold;
}

.team-table tr:hover {
    background-color: #f1f1f1;
}

.edit-button,
.fire-button {
    padding: 8px 12px;
    margin: 0 5px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    color: #fff;
}

.edit-button {
    background-color: #4CAF50;
    /* Green for Edit */
}

.fire-button {
    background-color: #e53935;
    /* Red for Fire */
}

</style>
