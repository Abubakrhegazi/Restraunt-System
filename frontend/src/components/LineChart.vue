<template>
    <div>
        <canvas ref="lineChartCanvas"></canvas>
    </div>
</template>

<script>
import { Chart } from 'chart.js/auto';

export default {
    props: ['chartData'],
    mounted() {
        this.createChart();
    },
    watch: {
        chartData: {
            handler() {
                this.createChart();
            },
            deep: true
        }
    },
    methods: {
        createChart() {
            if (this.chart) {
                this.chart.destroy();
            }
            this.chart = new Chart(this.$refs.lineChartCanvas, {
                type: 'line',
                data: this.chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });
        },
    },
    beforeUnmount() {
        if (this.chart) {
            this.chart.destroy();
        }
    }
};
</script>

<style scoped>
canvas {
    max-width: 100%;
    max-height: 400px;
    width: 500px;
    height: 250px;
}
</style>
