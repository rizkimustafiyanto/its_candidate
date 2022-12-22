<div class="content-wrapper">
  <div style="height: 20px;"></div>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-sm card-default">
            <div class="card-header">
              <div class="row ">
                <div class="col-sm-6">
                  <h4>Paid Leave Level</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-paid-leave-level">
                      <i class="fa fa-plus"></i> Add Paid Leave Level
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php if ($this->session->flashdata('success')) : ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('success'); ?>"></div>
            <?= $this->session->unset_userdata('success'); ?>
          <?php endif; ?>
          <?php if ($this->session->flashdata('error')) : ?>
            <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
            <?= $this->session->unset_userdata('error'); ?>
          <?php endif; ?>

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="paid_leave_level_table" class="table table-bordered  table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Paid Leave Level ID</th>
                    <th>Paid Leave</th>
                    <!-- <th>Sub Paid Leave</th> -->
                    <th>Employee Status</th>
                    <th>Level</th>
                    <th>Amount Paid Leave</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($PaidLeaveLevelRecords)) {
                    foreach ($PaidLeaveLevelRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->paid_leave_level_id ?></td>
                        <td><?php echo $record->paid_leave_name ?></td>
                        <!-- <td><?php echo $record->sub_paid_leave_name ?></td> -->
                        <td><?php echo $record->employee_status_name ?></td>
                        <td><?php echo $record->level_name ?></td>
                        <td><?php echo $record->amount_paid_leave ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-paidleavelevelid="<?= $record->paid_leave_level_id ?>" data-paidleaveid="<?= $record->paid_leave_id ?>" data-paidleavename="<?= $record->paid_leave_name ?>" data-levelid="<?= $record->level_id ?>" data-levelname="<?= $record->level_name ?>" data-amountpaidleave="<?= $record->amount_paid_leave ?>" data-employeestatusid="<?= $record->employee_status_id ?>" data-employeestatusname="<?= $record->employee_status_name ?>" data-paidleavename2="<?= $record->paid_leave_name2 ?>" data-toggle="modal" data-target="#modal-paid-leave-level-update">
                            <i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeletePaidLeaveLevel/' . $record->paid_leave_level_id; ?>"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-paid-leave-level">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Paid Leave Level</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertPaidLeaveLevel" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <!-- <label for="paidleavelevelid">Paid Leave Level ID/Unik</label> -->
              <input class="form-control" id="paid_leave_level_id" placeholder="Paid Leave Level ID" name="paid_leave_level_id" value="<?= $kode; ?>" maxlength="50" required readonly hidden>
              <!-- <br> -->
              <label>Paid Leave Category</label>
              <select class="form-control select2bs4" name="paid_leave_id" id="paid_leave_id">
                <?php foreach ($EmployeePaidLeaveRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <div class="form-group" id="Divpaid_leave_khusus">
                <label>Paid Leave Sub Category</label>
                <select class="form-control select2bs4" name="paid_leave_sub_id" id="paid_leave_sub_id">
                  <?php foreach ($EmployeePaidLeaveKhususRecords as $row) : ?>
                    <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <label>Employee Status</label>
              <select class="form-control select2bs4" name="employee_status_id">
                <?php foreach ($EmployeeStatusRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Employee Level</label>
              <select class="form-control select2bs4" name="level_id">
                <?php foreach ($EmployeeLevelRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label for="amountpaidleave">Amount Paid Leave</label>
              <input class="form-control" id="amount_paid_leave" placeholder="Amount Paid Leave" name="amount_paid_leave" maxlength="50" required>
              <br>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
          <input type="reset" class="btn btn-default" value="Reset" />
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-paid-leave-level-update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Paid Leave Level</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>UpdatePaidLeaveLevel" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label for="paidleavelevelid">Paid Leave Level ID</label>
              <input class="form-control" id="paid_leave_level_id_update" placeholder="Paid Leave Level ID" name="paid_leave_level_id_update" value="<?= $record->paid_leave_level_id; ?>" maxlength="50" readonly required>
              <br>
              <div class="form-group">
                <label>Paid Leave Category</label>
                <select class="form-control select2bs4" id="paid_leave_name2_update" name="paid_leave_name2_update">
                  <?php
                  foreach ($EmployeePaidLeaveRecords as $row) {
                    $selected = ($row->variable_id == $record->paid_leave_name2) ? 'selected' : '';
                  ?>
                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group" id="Divpaid_leave_khusus2">
                <label>Paid Leave Sub Category</label>
                <select class="form-control select2bs4" name="paid_leave_id_update" id="paid_leave_id_update">
                  <?php
                  foreach ($EmployeePaidLeaveKhususRecords as $row) {
                    $selected = ($row->variable_id == $paid_leave_id) ? 'selected' : '';
                  ?>
                    <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                  <?php } ?>
                </select>
              </div>
              <label for="employeestatusid">Employee Status</label>
              <select class="form-control select2bs4" name="employee_status_id_update" id="employee_status_id_update">
                <?php
                foreach ($EmployeeStatusRecords as $row) {
                  $selected = ($row->variable_id == $employee_status_id) ? 'selected' : '';
                ?>
                  <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                <?php } ?>
              </select>
              <br>
              <label for="levelid">Employee Level</label>
              <select class="form-control select2bs4" name="level_id_update" id="level_id_update">
                <?php
                foreach ($EmployeeLevelRecords as $row) {
                  $selected = ($row->variable_id == $level_id) ? 'selected' : '';
                ?>
                  <option value="<?= $row->variable_id; ?>" <?= $selected; ?> class=""><?= $row->variable_name; ?></option>
                <?php } ?>
              </select>
              <br>
              <label for="amountpaidleave">Amount Paid Leave</label>
              <input class="form-control" id="amount_paid_leave_update" placeholder="Amount Paid Leave" name="amount_paid_leave_update" value="<?= $record->amount_paid_leave; ?>" maxlength="50" required>
              <br>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <input type="submit" name="btnSubmit" id="btnSubmit" value="Update" class="btn btn-primary" />
          <input type="reset" class="btn btn-default" value="Reset" />
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script>
  $(document).on("click", "#btnSelect", function() {
    // // //dealer
    var paid_leave_level_id = $(this).data("paidleavelevelid");
    var paid_leave_id = $(this).data("paidleaveid");
    var paid_leave_sub_id = $(this).data("paidleavesubid");
    var paid_leave_name = $(this).data("paidleavename");
    var sub_paid_leave_name = $(this).data("subpaidleavename");
    var level_id = $(this).data("levelid");
    var level_name = $(this).data("levelname");
    var amount_paid_leave = $(this).data("amountpaidleave");
    var employee_status_id = $(this).data("employeestatusid");
    var employee_status_name = $(this).data("employeestatusname");
    var paid_leave_name2 = $(this).data("paidleavename2");


    $("#paid_leave_level_id_update").val(paid_leave_level_id);
    $("#paid_leave_id_update").val(paid_leave_id).trigger("change");
    // $("#paid_leave_id").val(paid_leave_id).trigger("change");
    $("#paid_leave_sub_id_update").val(paid_leave_sub_id).trigger("change");
    $("#level_id_update").val(level_id).trigger("change");
    $("#level_name_update").val(level_name);
    $("#amount_paid_leave_update").val(amount_paid_leave);
    $("#employee_status_id_update").val(employee_status_id).trigger("change");
    $("#employee_status_name_update").val(employee_status_name);
    $("#paid_leave_name2_update").val(paid_leave_name2).trigger("change");

    $("#paid_leave_name2_update").change(function() {
      var paidleavename2 = $("#paid_leave_name2_update").val();

      if (paidleavename2 == 'PL-001') {
        $('#Divpaid_leave_khusus2').hide();
      } else {
        $('#Divpaid_leave_khusus2').show();
      }
    });

    $(document).ready(function(e) {
      var paidleavename2 = $("#paid_leave_name2_update").val();

      if (paidleavename2 == 'PL-001') {
        $('#Divpaid_leave_khusus2').hide();
      } else {
        $('#Divpaid_leave_khusus2').show();
      }
    });

  });


  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>

<script>
  $("#paid_leave_id").change(function() {
    var paidleaveid = $("#paid_leave_id").val();

    if (paidleaveid == 'PL-001') {
      $('#Divpaid_leave_khusus').hide();
    } else {
      $('#Divpaid_leave_khusus').show();
    }
  });
</script>


<script>
  $(document).ready(function(e) {
    var paidleaveid = $("#paid_leave_id").val();

    if (paidleaveid == 'PL-001') {
      $('#Divpaid_leave_khusus').hide();
    } else {
      $('#Divpaid_leave_khusus').show();
    }
  });
</script>