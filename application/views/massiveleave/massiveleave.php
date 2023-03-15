 <?php

    $statusname = '';
    if (!empty($MassiveLeaveRecords)) {
        foreach ($MassiveLeaveRecords as $record) {
            $statusname = $record->statusname;
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
                                         <h4>Cuti Bersama</h4>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="col-xs-12 text-right">
                                         <button type="button" class="btn btn-sm btn-primary" id="btnAdd" data-toggle="modal" data-target="#modal-massive-leave">
                                             <i class="fa fa-plus"></i> Tambah Cuti Bersama
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

                     <!-- <?php print_r($CuttingPaidLeaveRecords); ?> -->

                     <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
                         <div class="card card-sm card-default">
                             <div class="card-header">
                                 <div class="row ">
                                     <form role="form" action="<?php echo base_url() ?>MassiveLeaveFilter" method="post">
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
                                             <div class="row">
                                                 <div style="width:11vw;">
                                                     <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                                                     <button class="btn btn-secondary"><a style="text-decoration:none;color:white" href="<?php echo base_url() ?>MassiveLeave">Reset</a></button>
                                                 </div>
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
                                     <form role="form" action="<?php echo base_url() ?>MassiveLeaveFilter" method="post">
                                         <div class="col-sm-12">
                                             <div class="row ">
                                                 <div class="row-sm-6">
                                                     <label>Company</label>
                                                     <select class="form-control select2bs4" id="company" name="company" required>
                                                         <option disabled selected value="">--Select--</option>
                                                         <!-- <option value="all">All</option> -->
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

                     <div class="card">
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="massive_leave" class="table table-bordered table-striped table-responsive">
                                 <thead>
                                     <tr>
                                         <th>Document No</th>
                                         <th>NIK</th>
                                         <th>Name</th>
                                         <th>Company</th>
                                         <th>Description</th>
                                         <!-- <th>Amount</th> -->
                                         <th>Date Massive Leave</th>
                                         <th>Leave Type</th>
                                         <th>Creator</th>
                                         <th>Creation Date</th>
                                         <th>Status</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        if (!empty($MassiveLeaveRecords)) {
                                            foreach ($MassiveLeaveRecords as $record) {
                                        ?>
                                             <tr>
                                                 <td><?php echo $record->runningno ?></td>
                                                 <td><?php echo $record->employeeid ?></td>
                                                 <td><?php echo $record->employeename ?></td>
                                                 <td><?php echo $record->companyname ?></td>
                                                 <td><?php echo $record->deskripsi ?></td>
                                                 <!-- <td><?php echo $record->amount ?> days </td> -->
                                                 <td><?php echo $record->dateleave ?></td>
                                                 <?php if ($record->approvaltype == 'Paid Leave') { ?>
                                                     <td><a class="badge badge-light"><?php echo $record->approvaltype ?></a></td>
                                                 <?php } else if ($record->approvaltype == 'Regular Leave') { ?>
                                                     <td><a class="badge badge-primary"><?php echo $record->approvaltype ?></a></td>
                                                 <?php } ?>
                                                 <td><?php echo $record->creator ?></td>
                                                 <td><?php echo $record->creationdatetime ?></td>
                                                 <?php if ($record->statusname == 'ST-001') { ?>
                                                     <td><a class="badge badge-pill badge-secondary float"> <?= $record->statusidname; ?></a></td>
                                                 <?php } else if ($record->statusname == 'ST-002') { ?>
                                                     <td><a class="badge badge-pill badge-success float"> <?= $record->statusidname; ?></a></td>
                                                 <?php } else if ($record->statusname == 'ST-004') { ?>
                                                     <td><a class="badge badge-pill badge-danger float"> <?= $record->statusidname; ?></a></td>
                                                 <?php } else if ($record->statusname == 'ST-005') { ?>
                                                     <td><a class="badge badge-pill badge-primary float"> <?= $record->statusidname; ?></a></td>
                                                 <?php } else { ?>
                                                     <td><a class="badge badge-pill badge-warning float"> <?= $record->statusidname; ?></a></td>
                                                 <?php }  ?>
                                                 <td class="text-center">
                                                     <?php if ($record->approvaltype == 'Paid Leave') { ?>
                                                         <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'PaidLeaveDetail/' . $record->runningno . "/" . $record->paidleaveid . "/" . $record->employeeid; ?>"><i class="fa fa-eye"></i></a>
                                                         <!-- <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeletePaidLeaveForMassiveLeave/' . $record->runningno; ?>"><i class="fa fa-trash"></i></a> -->
                                                     <?php } else { ?>
                                                         <a id="btnSelect" class="btn btn-xs btn-primary" href="<?php echo base_url() . 'LeaveDetail/' . $record->runningno; ?>"><i class="fa fa-eye"></i></a>
                                                         <!-- <a id="btnDelete" class="btn btn-xs btn-danger tombol-hapus" href="<?php echo base_url() . 'DeleteLeaveForMassiveLeave/' . $record->runningno; ?>"><i class="fa fa-trash"></i></a> -->
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

     <?php if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') { ?>
         <div class="modal" id="modal-massive-leave">
             <div class="modal-dialog ">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Input Cuti Bersama</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form role="form" action="<?php echo base_url() ?>InserttoEmployeeTemp" method="post">
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <label>Company Name</label>
                                     <select class="form-control select2bs4" id="company_id" name="company_id" required>
                                         <option disabled selected value="">--Select--</option>
                                         <?php foreach ($CompanyInBrandPusatRecords as $row) : ?>
                                             <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <br>
                                     <div class="row-sm-6">
                                         <label>Company Brand</label>
                                         <select class="form-control select2bs4" name="company_brand_id" id="company_brand_id" required>
                                             <option disabled selected value="">--Select--</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                             <input type="reset" class="btn btn-default" value="Reset" />
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     <?php } ?>

     <?php if ($this->session->userdata('role_id') == '2') { ?>
         <div class="modal" id="modal-massive-leave">
             <div class="modal-dialog ">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h4 class="modal-title">Input Cuti Bersama</h4>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <form role="form" action="<?php echo base_url() ?>InserttoEmployeeTempCabang" method="post">
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <label>Company Name</label>
                                     <select class="form-control select2bs4" id="company_id_2" name="company_id_2" required>
                                         <option disabled selected value="">--Select--</option>
                                         <?php foreach ($CompanyInBrandRecords as $row) : ?>
                                             <option value="<?php echo $row->company_id; ?>"><?php echo $row->company_name; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <br>
                                     <div class="row-sm-6">
                                         <label>Company Brand</label>
                                         <select class="form-control select2bs4" name="company_brand_id_2" id="company_brand_id_2" required>
                                             <option disabled selected value="">--Select--</option>
                                         </select>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                             <input type="submit" id="btnSubmit" class="btn btn-primary" value="Submit" />
                             <input type="reset" class="btn btn-default" value="Reset" />
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     <?php } ?>



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

 <script>
     $("#company_id").change(function() {
         var companyid = $("#company_id").val();

         $.ajax({
             url: '<?php echo base_url() ?>InserttoEmployeeTemp',
             data: {
                 company_id: companyid
             },
             type: 'post',
             async: true,
             dataType: 'json',
             cache: false,
             success: function(response) {

                 if (response != null) {

                 } else {}
             }
         })

     });
 </script>



 <div class="modal fade bd-example-modal-xl" id="modal-preview-employee" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-xl">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Preview Employee</h4>
             </div>
             <div class="modal-body">
                 <table id="attendance_2_table" class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>NIK</th>
                             <th>Name</th>
                             <th>Company</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            if (!empty($EmployeeTempRecords)) {
                                foreach ($EmployeeTempRecords as $record) {
                            ?>
                                 <tr>
                                     <td><?php echo $record->employee_id ?></td>
                                     <td><?php echo $record->employee_name ?></td>
                                     <td><?php echo $record->company_name ?></td>
                                     <td></td>
                                 </tr>
                         <?php
                                }
                            }
                            ?>
                     </tbody>
                 </table>
             </div>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>

 <script>
     $(document).on("click", "#btnView", function() {

         document.getElementById('#modal-preview-employee').reset();


     });
 </script>

 <script>
     // get company brand untuk hrd pusat
     $("#companypusat").change(function() {
         var companypusat = $("#companypusat").val();

         // For set value Vehicle type on first load
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
                         // console.log(company);
                     }
                 } else {
                     html += '<option value=""></option>';
                 }
                 //alert(data[0].sub_menu_id);
                 $('#company_brand_id_pusat').html(html);
             }
         })
     })

     // get company brand
     $("#company").change(function() {
         var company = $("#company").val();

         // For set value Vehicle type on first load
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
                         // console.log(company);
                     }
                 } else {
                     html += '<option value=""></option>';
                 }
                 //alert(data[0].sub_menu_id);
                 $('#company_brand_id_cabang').html(html);
             }
         })
     })

     //pop up
     // get company brand
     $("#company_id").change(function() {
         var companyid = $("#company_id").val();

         // For set value Vehicle type on first load
         $.ajax({
             url: 'GetCompanyBrandByCompanyId',
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
                         html += '<option value=' + response[is].company_brand_id + '>' + response[is].company_brand_name + '</option>';
                     }
                     $("#divCompanyBrand").show();
                 } else {
                     html += '<option value=""></option>';
                     $("#divCompanyBrand").hide();
                 }
                 //alert(data[0].sub_menu_id);
                 $('#company_brand_id').html(html);
             }
         })
     })

     // get company brand
     $("#company_id_2").change(function() {
         var company_id_2 = $("#company_id_2").val();

         // For set value Vehicle type on first load
         $.ajax({
             url: 'GetCompanyBrandByCompanyId5',
             data: {
                 company_id_2: company_id_2
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
                         // console.log(company);
                     }
                 } else {
                     html += '<option value=""></option>';
                 }
                 //alert(data[0].sub_menu_id);
                 $('#company_brand_id_2').html(html);
             }
         })
     })
 </script>