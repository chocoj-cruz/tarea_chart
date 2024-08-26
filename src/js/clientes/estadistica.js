import { Dropdown } from "bootstrap";
import { Chart } from "chart.js/auto";

const canvas = document.getElementById('chartCompras');
if (!canvas) {
    console.error('Canvas element not found');
} else {
    const ctx = canvas.getContext('2d');
    const btnActualizar = document.getElementById('actualizar');

    const data = {
        labels: [], // Array de etiquetas
        datasets: [{
            label: 'Compras',
            data: [],
            borderWidth: 5, // Ancho de borde
            backgroundColor: []
        }]
    };

    const chartClientes = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const getEstadisticas = async () => {
        try {
            const url = `/tarea_chart/API/detalle/estadisticas`;
            const config = { method: 'GET' };
            const response = await fetch(url, config);
            const responseData = await response.json();

            console.log('Datos recibidos:', responseData); // Para depuración

            if (Array.isArray(responseData) && responseData.length > 0) {
                chartClientes.data.labels = [];
                chartClientes.data.datasets[0].data = [];
                chartClientes.data.datasets[0].backgroundColor = [];

                responseData.forEach(r => {
                    chartClientes.data.labels.push(r.cliente);
                    chartClientes.data.datasets[0].data.push(r.cantidad);
                    chartClientes.data.datasets[0].backgroundColor.push(generateRandomColor());
                });

                chartClientes.update();
            } else {
                console.error('Datos inesperados o vacíos:', responseData);
            }
        } catch (error) {
            console.error('Error al obtener estadísticas:', error);
        }
    };

    const generateRandomColor = () => {
        const r = Math.floor(Math.random() * 256);
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);

        return `rgb(${r}, ${g}, ${b})`;
    };

    btnActualizar.addEventListener('click', getEstadisticas);
}
