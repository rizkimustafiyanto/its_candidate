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
                  <h4>Employee Leader</h4>
                </div>
              </div>
            </div>
          </div>
          <!-- <?php print_r($EmployeeLeaderRecords) ?> -->
          <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
            <div class="card card-sm card-default">
              <div class="card-header">
                <div class="row ">
                  <form role="form" action="<?php echo base_url() ?>EmployeeLeaderFilter" method="post">
                    <div class="col-sm-12">
                      <div class="row ">
                        <div class="row-sm-6">
                          <label>Company</label>
                          <select class="form-control select2bs4" id="companypusat" name="companypusat" required>
                            <option disabled selected value="">--Select--</option>
                            <!-- <option value="all">All</option> -->
                            <?php foreach ($CompanyInBrandPusatRecords as $row) : ?>
                              <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="row-sm-6">
                          <label>Company Brand</label>
                          <select class="form-control select2bs4" name="company_brand_id_pusat" id="company_brand_id_pusat" required>
                            <option disabled selected value="">--Select--</option>
                          </select>
                        </div>
                      </div>
                      &nbsp;&nbsp;&nbsp;
                      <div style="width:11vw;">
                        <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>

          <?php if ($this->session->userdata('role_id') == '2') { ?>
            <div class="card card-sm card-default">
              <div class="card-header">
                <div class="row ">
                  <form role="form" action="<?php echo base_url() ?>EmployeeLeaderFilter" method="post">
                    <div class="col-sm-12">
                      <div class="row ">
                        <div class="row-sm-6">
                          <label>Company</label>
                          <select class="form-control select2bs4" id="company" name="company" required>
                            <option disabled selected value="">--Select--</option>
                            <?php foreach ($CompanyInBrandRecords as $row) : ?>
                              <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <div class="row-sm-6">
                          <label>Company Brand</label>
                          <select class="form-control select2bs4" name="company_brand_id_cabang" id="company_brand_id_cabang" required>
                            <option disabled selected value="">--Select--</option>
                          </select>
                        </div>
                      </div>
                      &nbsp;&nbsp;&nbsp;
                      <div style="width:11vw;">
                        <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <?php } ?>

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
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>Employee Id</th>
                    <th>Employee Name</th>
                    <th>Company</th>
                    <th>Company Brand</th>
                    <th>Leader NIK 1</th>
                    <th>Leader Name 1</th>
                    <th>Leader NIK 2</th>
                    <th>Leader Name 2</th>
                    <th>Leader NIK 3</th>
                    <th>Leader Name 3</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($EmployeeLeaderRecords)) {
                    foreach ($EmployeeLeaderRecords as $record) {
                  ?>
                      <tr>
                        <td><?php echo $record->employee_id ?></td>
                        <td><?php echo $record->employee_name ?></td>
                        <td><?php echo $record->company_name ?></td>
                        <td><?php echo $record->company_brand_name ?></td>
                        <td><?php echo $record->apvno1 ?></td>
                        <td><?php echo $record->apv1 ?></td>
                        <?php if ($record->apvno2 ==  null) { ?>
                          <td><?php echo '-' ?></td>
                          <td><?php echo '-' ?></td>
                        <?php } else { ?>
                          <td><?php echo $record->apvno2 ?></td>
                          <td><?php echo $record->apv2 ?></td>
                        <?php } ?>
                        <?php if ($record->apvno3 ==  null) { ?>
                          <td><?php echo '-' ?></td>
                          <td><?php echo '-' ?></td>
                        <?php } else { ?>
                          <td><?php echo $record->apvno3 ?></td>
                          <td><?php echo $record->apv3 ?></td>
                        <?php } ?>
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
  <div class="modal fade" id="modal-employee-leader-update">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Employee Leader</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form" action="<?php echo base_url() ?>UpdateEmployeeLeader" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <input type="hidden" value="" name="employee_leader_id_update" id="employee_leader_id_update" />
                <div class="col-lg-12">
                  <label for="employeeid">Employee Name</label>
                  <select class="form-control select2bs4" id="employee_id_update" name="employee_id_update" disabled>
                    <option disabled selected value="">--Select--</option>
                    <?php foreach ($EmployeeRecords as $row) : ?>
                      <option value="<?php echo $row->employee_id; ?>"> <?php echo $row->employee_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <br>
                <div class="col-lg-12">
                  <label for="lineno">Line No</label>
                  <input class="form-control" id="line_no_update" placeholder="Line No" name="line_no_udpate"></input>
                </div>
                <br>
                <div class="col-lg-12">
                  <label for="approverid">Leader</label>
                  <select class="form-control select2bs4" id="approver_id_update" name="approver_id_update">
                    <option disabled selected value="">--Select--</option>
                    <?php foreach ($EmployeeForLeaderRecords as $row) : ?>
                      <option value="<?php echo $row->employee_id; ?>"><?php echo $row->company_name; ?> - <?php echo $row->employee_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <input type="submit" id="btnUpdate" class="btn btn-primary" value="Update" />
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
    var employee_leader_id = $(this).data("employeeleaderid");
    var employee_id = $(this).data("employeeid");
    var approver_id = $(this).data("approverid");
    var approver_name = $(this).data("approvername");
    var employee_name = $(this).data("employeename");
    var line_no = $(this).data("lineno");


    $("#employee_leader_id_update").val(employee_leader_id);
    $("#employee_id_update").val(employee_id);
    $("#approver_id_update").val(approver_id);
    $("#line_no_update").val(line_no);


    $('#modal-employee-leader-update').modal('show');
    $("#approver_id_update").val(approver_id).trigger("change");
    $("#employee_id_update").val(employee_id).trigger("change");

    document.getElementById('employee_id_update').readOnly = true;
    document.getElementById('line_no_update').readOnly = true;

  });


  // get company brand
  $("#company").change(function() {
    var company = $("#company").val();

    $.ajax({
      url: 'GetCompanyBrandByCompanyId3',
      data: {
        company: company
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
            html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
          }
        } else {
          html += '<option value=""></option>';
        }
        $('#company_brand_id_cabang').html(html);
      }
    })
  })

  // get company brand untuk hrd pusat
  $("#companypusat").change(function() {
    var companypusat = $("#companypusat").val();

    $.ajax({
      url: 'GetCompanyBrandByCompanyId4',
      data: {
        companypusat: companypusat
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
            html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
          }
        } else {
          html += '<option value=""></option>';
        }
        $('#company_brand_id_pusat').html(html);
      }
    })
  })
</script>