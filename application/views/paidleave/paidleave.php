 <?php

    $paid_leave_status_id = '';
    if (!empty($PaidLeaveRecords)) {
        foreach ($PaidLeaveRecords as $record) {
            $paid_leave_status_id = $record->paid_leave_status_id;
        }
    }
    ?>


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
                                     <div class="row">
                                         <h4>Cuti</h4>
                                         <a data-toggle="popover" title="Paid Leave" data-content="Paid Leave merupakan menu untuk pengajuan cuti karyawan"><i class="icon fa fa-question-circle text-primary fa-fw"></i></a>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <?php if ($paid_leave_status_id != 'ST-001') { ?>
                                         <div class="col-xs-12 text-right">
                                             <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-paid-leave">
                                                 <i class="fa fa-plus"></i> Tambah Cuti
                                             </button>
                                         </div>
                                     <?php } else { ?>
                                         <div class="col-xs-12 text-right">
                                             <button type=" button" class="btn btn-sm btn-primary" id="btnSubmitWithDraft">
                                                 <i class="fa fa-plus"></i> Tambah Cuti
                                             </button>
                                         </div>
                                     <?php } ?>

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

                     <!-- <?php print_r($PaidLeaveRecords); ?> -->
                     <div class="card">
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>Document No</th>
                                         <th>NIK</th>
                                         <th>Name</th>
                                         <th>Category</th>
                                         <th>Start Date</th>
                                         <th>Finish Date</th>
										 <th>Description</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        if (!empty($PaidLeaveRecords)) {
                                            foreach ($PaidLeaveRecords as $record) {
                                        ?>
                                             <tr>
                                                 <td><?php echo $record->employee_paid_leave_id ?></td>
                                                 <td><?php echo $record->employee_id ?></td>
                                                 <td><?php echo $record->employee_name ?></td>
                                                 <td><?php echo $record->paid_leave_name ?></td>
                                                 <td><?php echo $record->start_date ?></td>
                                                 <td><?php echo $record->finish_date ?></td>
												  <td><?php echo $record->description ?></td>
                                                 <?php if ($record->paid_leave_status_id == 'ST-001') { ?>
                                                     <td><a class="badge badge-pill badge-secondary float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php } else if ($record->paid_leave_status_id == 'ST-002' || $record->paid_leave_status_id == 'ST-007') { ?>
                                                     <td><a class="badge badge-pill badge-success float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php } else if ($record->paid_leave_status_id == 'ST-004') { ?>
                                                     <td><a class="badge badge-pill badge-danger float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php } else { ?>
                                                     <td><a class="badge badge-pill badge-warning float"> <?= $record->paid_leave_status_name; ?></a></td>
                                                 <?php }  ?>
                                                 <td class="text-center">
                                                     <?php if ($record->paid_leave_status_id == 'ST-001') { ?>
                                                         <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'PaidLeaveDetail/' . $record->employee_paid_leave_id . "/" . $record->paid_leave_id . "/" . $record->employee_id; ?>"><i class="fa fa-pen"></i></a>
                                                         <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeletePaidLeave/' . $record->employee_paid_leave_id; ?>"><i class="fa fa-trash"></i></a>
                                                     <?php } else { ?>
                                                         <a id="btnSelect" class="btn btn-xs btn-primary " href="<?php echo base_url() . 'PaidLeaveDetail/' . $record->employee_paid_leave_id . "/" . $record->paid_leave_id . "/" . $record->employee_id; ?>"><i class="fa fa-eye"></i></a>
                                                     <?php }  ?>
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
     <div class="modal fade" id="modal-paid-leave">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title">Input Paid Leave Request</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <form role="form" action="<?php echo base_url() ?>InsertPaidLeave" method="post">
                     <div class="modal-body">
                         <div class="row">
                             <div class="col-lg-12">
                                 <input type="hidden" value="<?= $this->session->userdata('company_id'); ?>">
                                 <input type="hidden" value="<?= $this->session->userdata('division_id'); ?>">
                                 <input type="hidden" value="<?= $this->session->userdata('department_id'); ?>">
                                 <label for="employeeid">NIK</label>
                                 <input class="form-control" id="employee_id" name="employee_id" value="<?= $this->session->userdata('employee_id'); ?>" readonly>
                                 <br>
                                 <label>Kategori Cuti</label>
                                 <select class="form-control select2bs4" name="paid_leave_id" id="paid_leave_id">
                                     <?php foreach ($EmployeePaidLeaveRecords as $row) : ?>
                                         <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                                 <br>
                                 <div class="form-group" id="Divpaid_leave_khusus">
                                     <label>Sub Kategori Cuti</label>
                                     <select class="form-control select2bs4" name="paid_leave_sub_id" id="paid_leave_sub_id">
                                         <?php foreach ($EmployeePaidLeaveKhususRecords as $row) : ?>
                                             <option value="<?php echo $row->variable_id; ?>"><?php echo $row->variable_name; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <label for="description">Keterangan</label>
                                 <textarea class="form-control" id="description" placeholder="Keterangan" name="description" maxlength="50" required></textarea>
                                 <br>
                                 <label>PIC Pengganti</label>
                                 <select class="form-control select2bs4" name="changer_pic" required>
                                     <option disabled selected value="">--Select--</option>
                                     <?php foreach ($EmployeeRecords as $row) : ?>
                                         <option value="<?php echo $row->employee_id; ?>"><?php echo $row->employee_name; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                                 <br>
                                 <label for="picphoneno">PIC Phone No</label>
                                 <input type="number" class="form-control" id="pic_phone_no" placeholder="PIC Phone No" name="pic_phone_no" maxlength="50" required></input>
                                 <br>
                                 <label for="urgentphoneno">Urgent Phone No</label>
                                 <input type="number" class="form-control" id="urgent_phone_no" placeholder="Urgent Phone No" name="urgent_phone_no" maxlength="50" required></input>
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

 </div>

 <script>
     $(document).on("click", "#btnAdd", function() {

         // // Variable
         // $("#variable_name").val("");
         // $("#variable_type").val("");
         // $("#variable_id").val("");
         // $("#leave_category_id").val("");
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

 <script>
     $(function() {
         $('[data-toggle="popover"]').popover()
     })
 </script>