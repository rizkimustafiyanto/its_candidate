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
                  <h4>Employee Role</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employee-role">
                      <i class="fa fa-plus"></i> Add Employee Role
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Employee Id</th>
                    <!-- <th>Role Id</th> -->
                    <th>Employee Name</th>
                    <th>Role Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($EmployeeRoleRecords)) {
                    foreach ($EmployeeRoleRecords as $record) {
                  ?>
                      <tr>
                        <td><?php echo $record->employee_id ?></td>
                        <!-- <td><?php echo $record->role_id ?></td> -->
                        <td><?php echo $record->employee_name ?></td>
                        <td><?php echo $record->role_name ?></td>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" data-employeeroleid="<?= $record->employee_role_id ?>" data-employeeid="<?= $record->employee_id ?>" data-employeename="<?= $record->employee_name ?>" data-roleid="<?= $record->role_id ?>" data-rolename="<?= $record->role_name ?>"><i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployeeRole/' . $record->employee_role_id; ?>"><i class="fa fa-trash"></i></a>
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

  <!-- Modal -->

  <div class="modal fade" id="modal-employee-role">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Employee Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>InsertEmployeeRole" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label for="employeeid">Employee</label>
                <select class="form-control select2bs4" id="employee_id" name="employee_id">
                  <?php foreach ($EmployeeRecords as $row) : ?>
                    <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-lg-12">
                <br>
                <label for="roleid">Role</label>
                <select class="form-control select2bs4" id="role_id" name="role_id">
                  <?php foreach ($RoleRecords as $row) : ?>
                    <option value="<?php echo $row->role_id; ?>"><?php echo $row->role_name; ?></option>
                  <?php endforeach; ?>
                </select>
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

  <div class="modal fade" id="modal-employee-role-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Employee Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>UpdateEmployeeRole" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <input type="hidden" value="" name="employee_role_id_update" id="employee_role_id_update" />
                <div class="col-lg-12">
                  <label for="employeeid">Employee</label>
                  <select class="form-control select2bs4" id="employee_id_update" name="employee_id_update">
                    <?php foreach ($EmployeeRecords as $row) : ?>
                      <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-lg-12">
                  <br>
                  <label for="roleid">Role</label>
                  <select class="form-control select2bs4" id="role_id_update" name="role_id_update">
                    <?php foreach ($RoleRecords as $row) : ?>
                      <option value="<?php echo $row->role_id; ?>"><?php echo $row->role_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="submit" id="btnUpdate" class="btn btn-primary" value="Update" />
            <input type="reset" class="btn btn-default" value="Reset" />
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


</div>

<script>
  $(document).on("click", "#btnSelect", function() {
    var employee_role_id = $(this).data("employeeroleid");
    var employee_id = $(this).data("employeeid");
    var role_id = $(this).data("roleid");
    var role_name = $(this).data("rolename");
    var employee_name = $(this).data("employeename");

    $("#employee_role_id_update").val(employee_role_id);
    $("#employee_id_update").val(employee_id);
    $("#role_id_update").val(role_id);

    $('#modal-employee-role-update').modal('show');
    $("#employee_id_update").val(employee_id).trigger("change");
    $("#role_id_update").val(role_id).trigger("change");

  });

  $(document).on("click", "#btnAdd", function() {
    // Counter
    // $("#employee_id").val("");
    // $("#role_id").val("");
  });
</script>