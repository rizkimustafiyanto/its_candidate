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
                  <h4>Employee</h4>
                </div>
                <div class="col-sm-6">
                  <div class="col-xs-12 text-right">
                    <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-employee">
                      <i class="fa fa-plus"></i> Add Employee
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
              <table id="employeelist" class="table  table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Company</th>
                    <th>Division</th>
                    <th>Department</th>
                    <th>Company Branch</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  if (!empty($EmployeeRecords)) {
                    foreach ($EmployeeRecords as $record) {
                  ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?php echo $record->employee_id ?></td>
                        <td><?php echo $record->employee_name ?></td>
                        <td><?php echo $record->company_name ?></td>
                        <td><?php echo $record->division_name ?></td>
                        <td><?php echo $record->department_name ?></td>
                        <td><?php echo $record->company_branch_name ?></td>
                        <?php if ($record->resign_status == 'RS-001') { ?>
                          <td><a class="badge badge-pill badge-success float"><?php echo $record->resign_status_name ?></a></td>
                        <?php } else if ($record->resign_status == 'RS-002') { ?>
                          <td><a class="badge badge-pill badge-secondary float"><?php echo $record->resign_status_name ?></a></td>
                        <?php } else if ($record->resign_status == 'RS-003') { ?>
                          <td><a class="badge badge-pill badge-light float"><?php echo $record->resign_status_name ?></a></td>
                        <?php } else if ($record->resign_status == 'RS-004') { ?>
                          <td><a class="badge badge-pill badge-dark float"><?php echo $record->resign_status_name ?></a></td>
                        <?php } ?>
                        <td class="text-center">
                          <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'EmployeeDetail/' . $record->employee_id; ?>"><i class="fa fa-pen"></i></a>
                          <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteEmployee/' . $record->employee_id; ?>"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-employee">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Insert Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" action="<?php echo base_url() ?>InsertEmployee" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label for="Employeeid">Employee ID</label>
              <input class="form-control" id="employee_id" placeholder="Employee Id" name="employee_id" maxlength="50" required>
              <br>
              <label for="Employeename">Employee Name</label>
              <input class="form-control" id="employee_name" placeholder=Employee Name" name="employee_name" maxlength="50" required>
              <br>
              <label for="email">Email</label>
              <input class="form-control" id="email" placeholder="Email" name="email" required>
              <br>
              <label for="phoneno">Phone No</label>
              <input type="number" class="form-control" id="phone_no" placeholder="Phone No" name="phone_no" maxlength="50" required>
              <br>
              <div class="form-group">
                <label>Company</label>
                <select class="form-control select2bs4" id="company_id" name="company_id" required>
                  <option disabled selected value="">--Select--</option>
                  <?php foreach ($CompanyRecords as $row) : ?>
                    <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <div id="divDivision">
                  <label>Division</label>
                  <select class="form-control select2bs4" name="division_id" id="division_id" required>
                    <option disabled selected value="">--Select Division--</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div id="divDepartment">
                  <label>Department</label>
                  <select class="form-control select2bs4" id="department_id" name="department_id" required>
                    <option disabled selected value="">--Select Department--</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div id="divCompanyBranch">
                  <label>Company Branch</label>
                  <select class="form-control select2bs4" name="company_branch_id" id="company_branch_id" required>
                    <option disabled selected value="">--Select Company Branch--</option>
                  </select>
                </div>
              </div>
              <label for="jabatan">Jabatan</label>
              <input class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" maxlength="50">
              <br>
              <div class="form-group">
                <label for="dateofbirth">Date of Birth</label>
                <div class="input-group date" id="datetime6" data-target-input="nearest">
                  <input type="text" id="date_of_birth" placeholder="Date of Birth" name="date_of_birth" class="form-control datetimepicker-input" data-target="#datetime6" required />
                  <div class="input-group-append" data-target="#datetime6" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <label for="place_of_birth">Place of birth</label>
              <input class="form-control" id="place_of_birth" placeholder="Place of birth" name="place_of_birth" maxlength="50" required>
              <br>
              <label>Gender</label>
              <select class="form-control select2bs4" name="gender_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($GenderRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Religion</label>
              <select class="form-control select2bs4" name="religion_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($ReligionRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Employee Status</label>
              <select class="form-control select2bs4" name="employee_status_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($EmployeeStatusRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Employee Level</label>
              <select class="form-control select2bs4" name="level_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($EmployeeLevelRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Leave Type ID</label>
              <select class="form-control select2bs4" name="leave_type_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($LeaveTypeRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Citizen Status</label>
              <select class="form-control select2bs4" name="citizen_status_id" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($CitizenStatusRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label>Approver Status</label>
              <select class="form-control select2bs4" name="approver_status" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($ApproverStatusRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <div class="form-group">
                <label for="joindate">Join Date</label>
                <div class="input-group date" id="datetime8" data-target-input="nearest">
                  <input type="text" id="join_date" placeholder="Join Date" name="join_date" class="form-control datetimepicker-input" data-target="#datetime8" required />
                  <div class="input-group-append" data-target="#datetime8" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <label for="shiftid">Employee Shift</label>
              <select class="form-control select2bs4" id="shift_id" name="shift_id">
                <option disabled selected value="">--Select--</option>
                <?php foreach ($ShiftRecords as $row) : ?>
                  <option value="<?php echo $row->shift_id; ?>"><?php echo $row->shift_id; ?> - <?php echo $row->shift_name; ?></option>
                <?php endforeach; ?>
              </select>
              <br>
              <label for="attachmenturl">Photo</label>
              <input class="form-control" type="file" name="image" id="image" accept=".jpeg,.jpg,.png,.pdf">
              <small>
                <font color="red">Type file : jpeg/jpg/png/pdf</font>
              </small>
              <br>
              <label>Hak Lembur</label>
              <select class="form-control select2bs4" name="overtime_flag" required>
                <option disabled selected value="">--Select--</option>
                <?php foreach ($HakLemburRecords as $row) : ?>
                  <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
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


<script>
  $(document).ready(function() {

    // Selected Change Dropdown Vehicle
    $("#company_id").change(function() {
      var companyid = $("#company_id").val();

      // For set value Vehicle type on first load
      $.ajax({
        url: 'GetDivisionByCompanyId',
        data: {
          company_id: companyid
        },
        type: 'post',
        async: true,
        dataType: 'json',
        cache: false,
        success: function(response) {
          var html = '';
          var is = '';
          if (response != null) {
            for (is = 0; is < response.length; is++) {
              html += '<option value=' + response[is].division_id + '>' + response[is].division_name + '</option>';
            }
            $("#divDivision").show();
          } else {
            html += '<option value=""></option>';
            $("#divDivision").hide();
          }
          //alert(data[0].sub_menu_id);
          $('#division_id').html(html);
        }
      })
    })

    $("#division_id").change(function() {
      var divisionid = $("#division_id").val();

      // For set value Vehicle type on first load
      $.ajax({
        url: 'GetDepartmentByDivisionId',
        data: {
          division_id: divisionid
        },
        type: 'post',
        async: true,
        dataType: 'json',
        cache: false,
        success: function(response) {
          var html = '';
          var is = '';
          if (response != null) {
            for (is = 0; is < response.length; is++) {
              html += '<option value=' + response[is].department_id + '>' + response[is].department_name + '</option>';
            }
            $("#divDepartment").show();
          } else {
            html += '<option value=""></option>';
            $("#divDepartment").hide();
          }
          //alert(data[0].sub_menu_id);
          $('#department_id').html(html);
        }
      })
    })

    // get company branch
    $("#company_id").change(function() {
      var companyid = $("#company_id").val();

      // For set value Vehicle type on first load
      $.ajax({
        url: 'GetCompanyBranchByCompanyId',
        data: {
          company_id: companyid
        },
        type: 'post',
        async: true,
        dataType: 'json',
        cache: false,
        success: function(response) {
          var html = '';
          var is = '';
          if (response != null) {
            for (is = 0; is < response.length; is++) {
              html += '<option value=' + response[is].company_branch_id + '>' + response[is].company_branch_name + '</option>';
            }
            $("#divCompanyBranch").show();
          } else {
            html += '<option value=""></option>';
            $("#divCompanyBranch").hide();
          }
          //alert(data[0].sub_menu_id);
          $('#company_branch_id').html(html);
        }
      })
    })
  });

  $(document).on("click", "#btnAdd", function() {
    // dealer

  });
</script>