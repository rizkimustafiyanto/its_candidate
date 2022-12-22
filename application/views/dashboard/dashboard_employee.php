<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Cuti</span>
              <span class="info-box-number">
                <?php if ($CountPaidLeave == null) { ?>
                  <?= 0 ?>
                <?php } else { ?>
                  <?= $CountPaidLeave; ?>
                <?php } ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Izin Sakit</span>
              <span class="info-box-number">
                <?php if ($CountSickLeave == null) { ?>
                  <?= 0 ?>
                <?php } else { ?>
                  <?= $CountSickLeave; ?>
                <?php } ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-signal"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Izin</span>
              <span class="info-box-number">
                <?php if ($CountLeave == null) { ?>
                  <?= 0 ?>
                <?php } else { ?>
                  <?= $CountLeave; ?>
                <?php } ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Lembur</span>
              <span class="info-box-number">
                <?php if ($CountOvertime == null) { ?>
                  <?= 0 ?>
                <?php } else { ?>
                  <?= $CountOvertime; ?>
                <?php } ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- </div> -->
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->

      <hr size="30px" width="100%">

      <!-- Chart -->

      <!-- <div style="width: 1000px;height: 1000px"> -->
      <!-- <div style="width: 300px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
      </div> -->

    </div><!-- /.container-fluid -->

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Recently Attendance</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
          <?php
          if (!empty($AttendanceRecords)) {
            foreach ($AttendanceRecords as $record) {
          ?>
              <li class="item">
                <div class="product-img">
                  <img src="<?php echo base_url(); ?>assets/dist/img/check-mark.png" alt="Product Image" class="img-size-10">
                </div>
                <div class="info">
                  <a href="javascript:void(0)" class="product-title">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <?php if ($record->shift_day == 'Monday') { ?>
                      <?php echo 'Senin'; ?>
                    <?php } else if ($record->shift_day == 'Tuesday') { ?>
                      <?php echo 'Selasa'; ?>
                    <?php } else if ($record->shift_day == 'Wednesday') { ?>
                      <?php echo 'Rabu'; ?>
                    <?php } else if ($record->shift_day == 'Thursday') { ?>
                      <?php echo 'Kamis'; ?>
                    <?php } else if ($record->shift_day == 'Friday') { ?>
                      <?php echo 'Jumat'; ?>
                    <?php } else if ($record->shift_day == 'Saturday') { ?>
                      <?php echo 'Sabtu'; ?>
                    <?php } ?> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <?php echo 'In Time'; ?>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <?php echo 'Out Time'; ?>
                    <!-- <span class="badge badge-warning float-right">$1800</span> -->
                  </a>
                  <span class="product-description">
                    &nbsp&nbsp&nbsp
                    <?php echo $record->attendance_id ?> -
                    <?php if ($record->date_time_attendance_start == date('Y-m-d', strtotime($record->date_time_attendance_start))) { ?>
                      <?php echo '-'; ?>
                    <?php } else { ?>
                      <?php echo $record->date_time_attendance_start ?>
                    <?php } ?> -
                    <?php if ($record->date_time_attendance_finish == null) { ?>
                      <?php echo '-'; ?>
                    <?php } else if ($record->date_time_attendance_finish == date('Y-m-d', strtotime($record->date_time_attendance_finish))) { ?>
                      <?php echo '-'; ?>
                    <?php } else { ?>
                      <?php echo $record->date_time_attendance_finish ?>
                    <?php } ?>
                  </span>
                </div>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      </div>
      <!-- /.card-body -->
      <div class="card-footer text-center">
        <a href="<?= base_url('AttendanceHistory'); ?>" class="uppercase">View Attendance <i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <!-- /.card-footer -->
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
                <canvas id="myChart2"></canvas>
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
                <canvas id="myChart3"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>





  </div>
  <!-- /.content -->
</div>
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

<!-- <script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'polarArea',
    data: {
      labels: ['Amount Paid Leave', 'Paid Leave Taken', 'Remaining Paid Leave'],
      datasets: [{
        label: 'Paid Leave',
        data: [
          <?= $AmountPaidLeave ?>,
          <?= $TakenPaidLeave ?>,
          <?= $RemainingPaidLeave ?>
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
</script> -->


<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Draft', 'Wait Approval', 'Approved', 'Rejected'],
      datasets: [{
        label: 'Cuti',
        data: [
          <?= $PLDraft ?>,
          <?= $PLWaitApproval ?>,
          <?= $PLApproved ?>,
          <?= $PLRejected ?>
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)', //biru - draft
          'rgba(255, 206, 86, 0.2)', //kuning - wait approval
          'rgba(75, 192, 192, 0.2)', //hijau - approved
          'rgba(255, 99, 132, 0.2)' //merah - reject
          // 'rgba(153, 102, 255, 0.2)', //ungu - closed
          // 'rgba(255, 159, 64, 0.2)' //orange - dll
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)', //biru - draft
          'rgba(255, 206, 86, 1)', //kuning - wait approval
          'rgba(75, 192, 192, 1)', //hijau - approved
          'rgba(255,99,132,1)' //merah - reject
          // 'rgba(153, 102, 255, 1)', //ungu - closed
          // 'rgba(255, 159, 64, 1)' //orange - dll
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
    type: 'bar',
    data: {
      labels: ['Draft', 'Wait Approval', 'Approved', 'Rejected'],
      datasets: [{
        label: 'Izin Sakit',
        data: [
          <?= $SLDraft ?>,
          <?= $SLWaitApproval ?>,
          <?= $SLApproved ?>,
          <?= $SLRejected ?>
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)', //biru - draft
          'rgba(255, 206, 86, 0.2)', //kuning - wait approval
          'rgba(75, 192, 192, 0.2)', //hijau - approved
          'rgba(255, 99, 132, 0.2)' //merah - reject
          // 'rgba(153, 102, 255, 0.2)', //ungu - closed
          // 'rgba(255, 159, 64, 0.2)' //orange - dll
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)', //biru - draft
          'rgba(255, 206, 86, 1)', //kuning - wait approval
          'rgba(75, 192, 192, 1)', //hijau - approved
          'rgba(255,99,132,1)' //merah - reject
          // 'rgba(153, 102, 255, 1)', //ungu - closed
          // 'rgba(255, 159, 64, 1)' //orange - dll
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
      labels: ['Draft', 'Wait Approval', 'Approved', 'Rejected'],
      datasets: [{
        label: 'Izin',
        data: [
          <?= $LVDraft ?>,
          <?= $LVWaitApproval ?>,
          <?= $LVApproved ?>,
          <?= $LVRejected ?>
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)', //biru - draft
          'rgba(255, 206, 86, 0.2)', //kuning - wait approval
          'rgba(75, 192, 192, 0.2)', //hijau - approved
          'rgba(255, 99, 132, 0.2)' //merah - reject
          // 'rgba(153, 102, 255, 0.2)', //ungu - closed
          // 'rgba(255, 159, 64, 0.2)' //orange - dll
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)', //biru - draft
          'rgba(255, 206, 86, 1)', //kuning - wait approval
          'rgba(75, 192, 192, 1)', //hijau - approved
          'rgba(255,99,132,1)' //merah - reject
          // 'rgba(153, 102, 255, 1)', //ungu - closed
          // 'rgba(255, 159, 64, 1)' //orange - dll
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
    type: 'bar',
    data: {
      labels: ['Draft', 'Wait Approval', 'Approved', 'Rejected', 'Closed'],
      datasets: [{
        label: 'Lembur',
        data: [
          <?= $OTDraft ?>,
          <?= $OTWaitApproval ?>,
          <?= $OTApproved ?>,
          <?= $OTRejected ?>,
          <?= $OTClosed ?>
        ],
        backgroundColor: [
          'rgba(54, 162, 235, 0.2)', //biru - draft
          'rgba(255, 206, 86, 0.2)', //kuning - wait approval
          'rgba(75, 192, 192, 0.2)', //hijau - approved
          'rgba(255, 99, 132, 0.2)', //merah - reject
          'rgba(153, 102, 255, 0.2)' //ungu - closed
          // 'rgba(255, 159, 64, 0.2)' //orange - dll
        ],
        borderColor: [
          'rgba(54, 162, 235, 1)', //biru - draft
          'rgba(255, 206, 86, 1)', //kuning - wait approval
          'rgba(75, 192, 192, 1)', //hijau - approved
          'rgba(255,99,132,1)', //merah - reject
          'rgba(153, 102, 255, 1)' //ungu - closed
          // 'rgba(255, 159, 64, 1)' //orange - dll
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