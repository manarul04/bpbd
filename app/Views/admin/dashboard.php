<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Total Revenue -->
            <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Total Kejadian</h5>
                            <div id="chart" class="px-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
</div>
<script>
    var options = {
        chart: {
            height: 400,
            stacked: true,
            type: 'bar'
        },
        series: [{
            name: 'sales',
            data: [30, 40, 35, 50, 49, 60, 70, 91, 125, 35, 50, 49]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep','Okt','Nov','Des']
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>
<?= $this->endSection() ?>