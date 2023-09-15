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
    $("#candidate_family_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_family_table_wrapper .col-md-6:eq(0)");

    $("#candidate_education_history_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_education_history_table_wrapper .col-md-6:eq(0)");

    $("#candidate_courses_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_courses_table_wrapper .col-md-6:eq(0)");

    $("#candidate_job_history_table")
      .DataTable({
        responsive: true,
        lengthChange: false,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_job_history_table_wrapper .col-md-6:eq(0)");

    $("#candidate_reference_table")
      .DataTable({
        responsive: true,
        lengthChange: false,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_reference_table_wrapper .col-md-6:eq(0)");

    $("#candidate_emergency_contact_table")
      .DataTable({
        responsive: true,
        lengthChange: false,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_emergency_contact_table_wrapper .col-md-6:eq(0)");

    $("#candidate_social_activity_table")
      .DataTable({
        responsive: true,
        lengthChange: false,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_social_activity_table_wrapper .col-md-6:eq(0)");

    $("#candidate_hobby_table")
      .DataTable({
        responsive: true,
        lengthChange: false,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_hobby_table_wrapper .col-md-6:eq(0)");

    $("#candidate_echievement_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_echievement_table_wrapper .col-md-6:eq(0)");


    $("#candidate_language_skill_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("candidate_language_skill_table_wrapper .col-md-6:eq(0)");

    $("#candidate_computer_skill_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#candidate_computer_skill_table_wrapper .col-md-6:eq(0)");

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

    $("#sppd_detail_temp_table")
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

    $("#lppd_ext_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#lpd_table_wrapper .col-md-6:eq(0)");

    $("#leave_table_general")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        order: [
          [0, "desc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    $("#lppd_ext_table_2")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        bFilter: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        order: [
          [0, "asc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    $("#approval_date_table")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        bFilter: false,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        order: [
          [0, "asc"]
        ]
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

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

    $("#list_candidate_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#list_candidate_table_wrapper .col-md-6:eq(0)");

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

    $("#employeeattendancelocation_table")
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

    $("#employee_letter_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false
      })
      .buttons()
      .container()
      .appendTo("#approval_table_wrapper .col-md-6:eq(0)");

    $("#dashboard_table")
      .DataTable({
        responsive: true,
        lengthChange: true,
        searching: true,
        autoWidth: false,
        ordering: false,
        pageLength: 5
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

    $("#reschedule_table")
      .DataTable({
        lengthChange: false,
        autoWidth: false,
        // buttons: ["copy", "csv", "excel", "colvis"],
        order: [
          [0, "asc"]
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

    //format tahun 
    $('#datetime').datetimepicker({
      format: 'YYYY'
    });
    $('#datetime1').datetimepicker({
      format: 'YYYY'
    });
    $('#datetime2').datetimepicker({
      format: 'MM-YYYY'
    });
    $('#datetime3').datetimepicker({
      format: 'MM-YYYY'
    });
    $('#datetime4').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime5').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datetime6').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime7').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    $('#datetime8').datetimepicker({
      format: 'DD-MM-YYYY'
    });

    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  });
</script>

<!-- alert for leave error -->
<script>
  $('#btnAddLeaveError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      text: 'Anda masih mempunyai draft pengajuan yang belum diselesaikan, mohon hapus pengajuan yang tidak diperlukan terlebih dahulu!'
    })
  });

  $('#btnSubmitLeaveError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Please Input Date Leave!'
    })
  });

  $('#btnSubmitLeaveError2').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Maaf tanggal yang anda ajukan sudah melewati batas yang telah ditentukan!'
    })
  });

  $('#btnSubmitAttendanceError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Maaf terdapat data yang tidak valid mohon delete data dan upload ulang!'
    })
  });

  $('#btnSubmitGenerateCostError').on('click', function(e) {
    Swal.fire({
      icon: 'warning',
      text: 'Mohon tambahkan realisasi jam berangkat dan realisasi jam pulang terlebih dahulu!'
    })
  });

  $('#btnSubmitMassiveLeaveError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Please Input Date Massive Leave!'
    })
  });

  $('#btnCandidateFamilyError').on('click', function(e) {
    Swal.fire({
      icon: 'warning',
      text: 'Mohon lengkapi data susunan keluarga terlebih dahulu !'
    })
  });

  $('#btnCandidateEducationHistoryError').on('click', function(e) {
    Swal.fire({
      icon: 'warning',
      text: 'Mohon lengkapi data riwayat pendidikan terlebih dahulu !'
    })
  });

  $('#btnCandidateHobbyError').on('click', function(e) {
    Swal.fire({
      icon: 'warning',
      text: 'Mohon lengkapi data hobby terlebih dahulu !'
    })
  });

  $('#btnCandidateLanguageSkillError').on('click', function(e) {
    Swal.fire({
      icon: 'warning',
      text: 'Mohon lengkapi data kemampuan bahasa terlebih dahulu !'
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
  $('#btnAddSPPDError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Mohon selesaikan LBPD terlebih dahulu sebelum mengajukan SPPUM baru !!'
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
  $('#btnSubmitDetaseringError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Mohon masukkan tunjangan detasering anda!'
    })
  });
</script>
<script>
  $('#btnSubmitLPPDCostError').on('click', function(e) {
    Swal.fire({
      icon: 'error',
      title: 'Mohon masukkan uang makan dan uang saku anda!'
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
  $('.tombol-1').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Warning',
      text: "pastikan anda telah mengupdate data dengan benar sebelum submit !!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Submit'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = '<?php echo base_url() ?>ReGenerateSPPUM';
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
      timer: 10000000000,
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
      // title: 'Congratulation',
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