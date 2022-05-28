<?php
$listTahuns = ['20', '21', '22'];
$thn_chart = 22;
?>

<?php
$listTahuns = ['20', '21', '22'];
$thn_chart = 22;
?>


<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Pendapatan Tahunan {{ $input_thn }}</h5>
            <p class="card-text">Rp {{ number_format($totalTransaction) }}</p>
        </div>
    </div>
    <div id="user-activity" class="card">
        <div class="card-body">
            <label for="">Pilih Tahun Chart Transaksi {{ $input_thn }} </label>
            <select id="" class="form-control select2-hidden-accessible" style="margin-bottom:40px;"
                wire:model="input_thn">
                <option value="2022" selected>2022</option>
                <option value="2023">2023</option>
                <option value="2021">2021</option>
            </select>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="user" role="tabpanel">
                    <div class="container1">
                    </div>
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        initHighChart({{ $thn_chart }}, {!! json_encode(array_values($chart_penjualans)) !!})

        function initHighChart(tahun, data) {
            var thn = tahun;
            var penjualans = data;
            Highcharts.chart('container', {
                chart: {
                    backgroundColor: '#FCFFC5',
                    type: 'line',
                },
                title: {
                    text: 'Grafik penjualan toko electro'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ]
                },
                yAxis: {
                    title: {
                        text: 'Nominal'
                    },
                    labels: {
                        formatter: function() {
                            return this.value + 'k';
                        }
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                plotOptions: {
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },
                series: [{
                    name: 'Pendapatan Penjualan',
                    marker: {
                        symbol: 'square'
                    },
                    data: penjualans,

                }]
            });
        }
    </script>
    <script>
        window.livewire.on('yearUpdated', (e) => {
            initHighChart({{ $thn_chart }}, Object.values(e))
        })
    </script>
@endpush
