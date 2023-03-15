  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title; ?></h1>
            <!-- <?php print_r($January); ?> -->
            <!-- <?= $title = 'Dashboard'; ?> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php if ($CountPaidLeave == null) { ?>
                    <?= 0 ?>
                  <?php } else { ?>
                    <?= $CountPaidLeave; ?>
                  <?php } ?></h3>
                <p>Cuti</p>
              </div>
              <div class="icon">
                <i class="fas fa-list-alt fa-3x text-gray-300"></i>
              </div>
              <a href="<?= base_url('GetDefaultPaidLeaveReport'); ?>" class="small-box-footer">See All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php if ($CountSickLeave == null) { ?>
                    <?= 0 ?>
                  <?php } else { ?>
                    <?= $CountSickLeave; ?>
                  <?php } ?></h3>
                <p>Izin Sakit</p>
              </div>
              <div class="icon">
                <i class="fas fa-book fa-3x text-gray-300"></i>
              </div>
              <a href="<?= base_url('GetDefaultSickLeaveReport'); ?>" class="small-box-footer">See All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php if ($CountLeave == null) { ?>
                    <?= 0 ?>
                  <?php } else { ?>
                    <?= $CountLeave; ?>
                  <?php } ?></h3>
                <p>Izin</p>
              </div>
              <div class="icon">
                <i class="fas fa-signal fa-3x text-gray-300"></i>
              </div>
              <a href="<?= base_url('GetDefaultLeaveReport'); ?>" class="small-box-footer">See All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php if ($CountOvertime == null) { ?>
                    <?= 0 ?>
                  <?php } else { ?>
                    <?= $CountOvertime; ?>
                  <?php } ?></h3>
                <p>Lembur</p>
              </div>
              <div class="icon">
                <i class="fas fa-file fa-3x text-gray-300"></i>
              </div>
              <a href="<?= base_url('GetDefaultOvertimeReport'); ?>" class="small-box-footer">See All <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <hr size="30px" width="100%">

      </div>

      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Cuti
              </h3>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <div style="width: 500px;margin: 0px auto;">
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Izin Sakit
              </h3>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <div style="width: 500px;margin: 0px auto;">
                  <canvas id="myChart1"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Izin
              </h3>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <div style="width: 500px;margin: 0px auto;">
                  <canvas id="myChart3"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Lembur
              </h3>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <div style="width: 500px;margin: 0px auto;">
                  <canvas id="myChart2"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->

  </div>
  <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
          'September', 'October', 'November', 'December'
        ],
        datasets: [{
          label: 'Cuti',
          data: [
            <?= $January ?>,
            <?= $February ?>,
            <?= $March ?>,
            <?= $April ?>,
            <?= $May ?>,
            <?= $June ?>,
            <?= $July ?>,
            <?= $August ?>,
            <?= $September ?>,
            <?= $October ?>,
            <?= $November ?>,
            <?= $December ?>
          ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
          'September', 'October', 'November', 'December'
        ],
        datasets: [{
          label: 'Izin Sakit',
          data: [
            <?= $SLJanuary ?>,
            <?= $SLFebruary ?>,
            <?= $SLMarch ?>,
            <?= $SLApril ?>,
            <?= $SLMay ?>,
            <?= $SLJune ?>,
            <?= $SLJuly ?>,
            <?= $SLAugust ?>,
            <?= $SLSeptember ?>,
            <?= $SLOctober ?>,
            <?= $SLNovember ?>,
            <?= $SLDecember ?>
          ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
          'September', 'October', 'November', 'December'
        ],
        datasets: [{
          label: 'Lembur',
          data: [
            <?= $OTJanuary ?>,
            <?= $OTFebruary ?>,
            <?= $OTMarch ?>,
            <?= $OTApril ?>,
            <?= $OTMay ?>,
            <?= $OTJune ?>,
            <?= $OTJuly ?>,
            <?= $OTAugust ?>,
            <?= $OTSeptember ?>,
            <?= $OTOctober ?>,
            <?= $OTNovember ?>,
            <?= $OTDecember ?>
          ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>

  <script>
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
          'September', 'October', 'November', 'December'
        ],
        datasets: [{
          label: 'Izin',
          data: [
            <?= $LVJanuary ?>,
            <?= $LVFebruary ?>,
            <?= $LVMarch ?>,
            <?= $LVApril ?>,
            <?= $LVMay ?>,
            <?= $LVJune ?>,
            <?= $LVJuly ?>,
            <?= $LVAugust ?>,
            <?= $LVSeptember ?>,
            <?= $LVOctober ?>,
            <?= $LVNovember ?>,
            <?= $LVDecember ?>
          ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>