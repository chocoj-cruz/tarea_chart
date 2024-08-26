<h1 class='class text-center'>ESTADISTICAS CON CHART.JS</h1>


<h3 class='class text-center'>Gráfica de Compras por Cliente</h3>

<div class="row justify-content-center">
    <div class="col-lg-6 d-flex justify-content-center">
<button type="button" id="actualizar" class="btn btn-info w-20">Actualizar</button>
    </div>
</div>

<div class="row justify-center">
    <div class="col">
        <canvas id="chartCompras" width="100%"></canvas>
    </div>
</div>


<script src="<?= asset('./build/js/clientes/estadistica.js') ?>"></script>