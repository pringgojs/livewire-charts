<div>
    <div class="font-bold">{{ $title ?? '' }}</div>
    <div wire:ignore>
        <div id="bar-chart-{{ $id }}"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</div>

@script
    <script>
        let chart;
        let currentSeries = @json($series); // Menyimpan data awal
        let currentCategories = @json($categories); // Menyimpan kategori awal
        let colors = @json($colors); // Menyimpan kategori awal

        Livewire.hook('element.init', ({
            component,
            el
        }) => {
            var chartElement = document.querySelector("#bar-chart-{{ $id }}");
            if (chartElement && chartElement.innerHTML === "") {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    series: currentSeries,
                    xaxis: {
                        categories: currentCategories,
                    },
                    colors: colors, // Set warna bar chart
                };


                chart = new ApexCharts(chartElement, options);
                chart.render();
            }
        });


        /* disini, legend dan series harus dikirim dari BAKEND. meskipun properti sudah diset reaktif, nyatanya ketika dipanggil di livewire on update data masih data old */
        Livewire.on('update-chart', ({
            categories,
            series
        }) => {
            if (chart) {
                console.log('update chart');
                chart.updateSeries(series);

                chart.updateOptions({
                    xaxis: {
                        categories: categories,
                    }
                });
            }
        });
    </script>
@endscript
