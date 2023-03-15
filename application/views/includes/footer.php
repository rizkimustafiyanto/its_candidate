<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->

  <!-- Default to the left -->
  <?php $year = date("Y"); ?>
  <strong>Copyright &copy; <?php echo $year ?> <a href="#">Persada Solusi Data</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


<!-- Page specific script -->
<script>
  $(function() {
    $("#paid_leave_level_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#paid_leave_level_table_wrapper .col-md-6:eq(0)");

    $("#noticelettertable")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#noticelettertable_wrapper .col-md-6:eq(0)");

    $("#noticeletterhistorytable")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#noticeletterhistorytable_wrapper .col-md-6:eq(0)");

    $("#example1")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    $('#table-general').DataTable({
      "scrollY": 100,
      "scrollX": true,
      "scrollCollapse": true,
      "fixedHeader": true,
      "bInfo": false,
      scrollResize: true,
      lengthChange: false,
      searching: false,
      paging: false,
      fixedColumns: {
        leftColumns: 1,
        rightColumns: 1
      },
      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }],
      select: {
        style: 'multi',
        selector: 'td:first-child'
      },
      order: [
        [1, 'asc']
      ]
    });

    $("#employeelist")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#employeelist_wrapper .col-md-6:eq(0)");

    $("#menurole")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#menurole_wrapper .col-md-6:eq(0)");

    $("#example2")
      .DataTable({
        responsive: true,
        lengthChange: false,
        searching: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#example2_wrapper .col-md-6:eq(0)");

    $("#leave_datetime_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#leave_datetime_table_wrapper .col-md-6:eq(0)");

    $("#sppd_detail_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#sppd_detail_table_wrapper .col-md-6:eq(0)");

    $("#sppd_member_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#sppd_member_table_wrapper .col-md-6:eq(0)");

    $("#sppd_regional_cost_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#sppd_regional_cost_table_wrapper .col-md-6:eq(0)");

    $("#a_hrd_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#a_hrd_table_wrapper .col-md-6:eq(0)");

    $("#lpd_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#lpd_table_wrapper .col-md-6:eq(0)");

    $("#extpaidleave_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#extpaidleave_table_wrapper .col-md-6:eq(0)");

    $("#extpaidleave1_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#extpaidleave_table_wrapper .col-md-6:eq(0)");

    $("#approval_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#approval1_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#employeeleader_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#employeebrand_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#employeedocument_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#employeenoticeletter_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#employeeaddress_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#sickleave_datetime_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#sick_leave_datetime_table_wrapper .col-md-6:eq(0)");

    $("#approval_matrix_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#approval_matrix_table_wrapper .col-md-6:eq(0)");

    $("#message_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#message_table_wrapper .col-md-6:eq(0)");

    $("#shift_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#shift_table_wrapper .col-md-6:eq(0)");

    $("#shift_details_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#shift_details_table_wrapper .col-md-6:eq(0)");

    $("#shift_details_2_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#shift_details_2_table_wrapper .col-md-6:eq(0)");

    $("#approval_matrix_person_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#approval_matrix_person_table_wrapper .col-md-6:eq(0)");

    $("#attendance_table")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#attendance_table_wrapper .col-md-6:eq(0)");

    $("#announcement_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      })
      .buttons()
      .container()
      .appendTo("#announcement_table_wrapper .col-md-6:eq(0)");

    $("#attendance_2_table")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        // buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#attendance_2_table_wrapper .col-md-6:eq(0)");

    $("#overtime_report")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#overtime_report_wrapper .col-md-6:eq(0)");

    $("#paid_leave_report")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#paid_leave_report_wrapper .col-md-6:eq(0)");

    $("#leave_report")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#leave_report_wrapper .col-md-6:eq(0)");

    $("#sick_leave_report")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#sick_leave_report_wrapper .col-md-6:eq(0)");

    $("#sppd_report")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#sppd_report_wrapper .col-md-6:eq(0)");

    $("#massive_leave")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#massive_leave_wrapper .col-md-6:eq(0)");

    //format jam 
    $('#datetime').datetimepicker({
      // format: 'LT'
      format: 'HH:mm'
    });
    $('#datetime1').datetimepicker({
      // format: 'LT'
      format: 'HH:mm',
    });

    //format tanggal
    $('#datetime2').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime3').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime4').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime5').datetimepicker({
      format: 'DD-MM-YYYY'
    });

    $('#datetime6').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime7').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime8').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    $('#datetime9').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime10').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime11').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime12').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime13').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime14').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime15').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime16').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime17').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime18').datetimepicker({
      // format: 'LT'
      format: 'HH:mm',
    });
    $('#datetime19').datetimepicker({
      // format: 'LT'
      format: 'HH:mm',
    });
    $('#datetime20').datetimepicker({
      // format: 'LT'
      format: 'HH:mm',
    });
    $('#datetime21').datetimepicker({
      // format: 'LT'
      format: 'HH:mm',
    });
    $('#datetime22').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime23').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime24').datetimepicker({
      format: 'YYYY-MM-DD HH:mm',
      icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
      }
    });
    $('#datetime25').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime26').datetimepicker({
      format: 'DD-MM-YYYY'
    });

    $('#datetime27').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime28').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime29').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime30').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime31').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime32').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime33').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    var dateNow = new Date();
    $('#datetime34').datetimepicker({
      defaultDate: dateNow,
      format: 'YYYY-MM-DD'
    });

    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  });
</script>

<!-- alert for leave error -->
<script>
  $('#btnSubmitLeaveError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Please Input Date Leave!'
    })
  });

  $('#btnSubmitSPPDError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Mohon Input Rencana Perjalanan Dinas!'
    })
  });

  $('#btnSubmitLPPDError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Mohon Input Laporan Perjalanan Dinas!'
    })
  });
</script>


<!-- alert for sick leave error -->
<script>
  $('#btnSubmitSickLeaveError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Please Input Date Sick Leave and Attachment File!'
    })
  });
</script>

<script>
  $('#btnAddOvertimeError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Maaf, Anda tidak memiliki hak lembur !'
    })
  });
</script>

<script>
  $('#btnSubmitLeaveWithNoRemaining').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'You Dont Have Remaining Paid Leave!'
    })
  });
</script>

<script>
  $('#btnSubmitWithDraft').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Please Complete Draft Paid Leave First!'
    })
  });
</script>


<script>
  $('.tombol-hapus').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Are you sure',
      text: "to delete this data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
        // Swal.fire(
        //   'Dihapus!',
        //   'Data berhasil dihapus',
        //   'success'
        // )
      }
    })

  });
</script>

<script>
  $('#tombolhapus2').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Are you sure',
      text: "to delete this data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
        // Swal.fire(
        //   'Dihapus!',
        //   'Data berhasil dihapus',
        //   'success'
        // )
      }
    })

  });
</script>

<script>
  $('.show-loading').click(function() {
    let timerInterval
    Swal.fire({
      title: 'Wait For Process!',
      html: 'Loading...',
      timer: 1000000,
      timerProgressBar: true,
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
      }
    })
  });
</script>

<script>
  const flashData = $('.flash-data').data('flashdata');
  if (flashData) {
    Swal.fire({
      title: 'Congratulation',
      text: flashData,
      icon: 'success'
    });
  }
</script>

<script>
  const flashData2 = $('.flash-data2').data('flashdata');
  if (flashData2) {
    Swal.fire({
        title: 'Mohon Cek SPPUM Anda',
        text: flashData,
        icon: 'success',
        confirmButtonText: "Cek",
        allowOutsideClick: false
      })
      .then((result) => {
        if (result.isConfirmed) {
          window.scrollTo(100, document.body.scrollHeight)
        }
      })
  }
</script>

<script>
  const flashData3 = $('.flash-data3').data('flashdata');
  if (flashData3) {
    Swal.fire({
        title: 'SPPUM created successfully',
        text: flashData,
        icon: 'success',
        confirmButtonText: "Ok",
        allowOutsideClick: false
      })
      .then((result) => {
        if (result.isConfirmed) {
          window.scrollTo(100, document.body.scrollHeight)
        }
      })
  }
</script>

<script>
  const flashData4 = $('.flash-data4').data('flashdata');
  if (flashData4) {
    Swal.fire({
        title: 'SPPUM updated successfully',
        text: flashData,
        icon: 'success',
        confirmButtonText: "Ok",
        allowOutsideClick: false
      })
      .then((result) => {
        if (result.isConfirmed) {
          window.scrollTo(100, document.body.scrollHeight)
        }
      })
  }
</script>

<script>
  const flashData1 = $('.flash-data1').data('flashdata');
  if (flashData1) {
    Swal.fire({
      title: 'Error',
      text: flashData1,
      icon: 'error'
    });
  }
</script>

<script script type="text/javascript" src="javascript/counter.js">
</script>
</body>

</html>