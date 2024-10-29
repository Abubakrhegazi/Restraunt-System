<template>
    <div class="sales-section">
        <h2>Sales Overview</h2>
        <LineChart :chartData="chartData" />
    </div>
</template>
<script>
import LineChart from '@/components/LineChart.vue';

export default {
    components: {
        LineChart
    },
    data() {
        return {
            chartData: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [
                    {
                        label: 'Monthly Sales',
                        data: [65, 59, 80, 81, 56],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1,
                    }
                ]
            }
        };
    }
};
</script>


<style scoped>
.sales-section {
    padding: 20px;
}
</style>
