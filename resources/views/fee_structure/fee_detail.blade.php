@extends('layouts.main')
@section('content')
<!-- Button trigger modal-->
<!-- Modal-->
<!-- <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>
 -->

 <!-- Modal -->
     <div class="modal fade bs-example-modal-lg openPayment" id="openPayment" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fee Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form  method="post"  id="contact_us"  action="javascript:void(0)">
                <div class="form-row">
                    
                    <div class="form-group col-md-6">
                      <label for="received_amount">Class</label>
                      <input type="text" class="form-control" id="class_name"  name="class_section_session_id" readonly="" />
                      <input type="hidden" id="class_section_session_id"  name="class_section_session_id" />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="student_name">Student</label>
                      <input type="text" class="form-control" name="student_id" id="student_name" placeholder="Name" disabled>
                    </div>
                    
                  </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="student_name">Old Balance</label>
                      <input type="text" class="form-control" name="old_balance" id="old_balance"  disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="fees">Tuition Current Fees</label>
                      <input type="text" class="form-control" id="fee_amount" name=""   disabled>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="student_name">Grand Total</label>
                      <input type="text" class="form-control" name="grand_total" id="grand_total"  disabled>
                    </div>
                </div> 
                  <input type="hidden" name="student_id" id="student_id" value="student_id" />
                  <!-- <input type="text" name="old_balance" id="old_balance" /> -->
                  <input type="hidden" name="fee_id"  id="fee_id" />
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="discount">Paid Amount</label>
                      <input type="number" class="form-control" id="received_amount"  placeholder="0" name="received_amount" />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="discount">Discount</label>
                      <input type="number" class="form-control" id="discount" name="discount" />
                      <input type="hidden" class="form-control" id="advance_payment" name="advance_payment" value="0" />
                      <input type="hidden" class="form-control" id="total" name="total" />
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="balance">Balance</label>
                      <input type="number" class="form-control" id="balance" name="balance" readonly="" />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="received_date">Received Date</label>
                      <input type="date" class="form-control" id="received_date" value="<?php echo date('Y-m-d') ?>" name="received_date" />
                    </div>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
               <!--  <button type="reset" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" form="fee-collection">Reset</button> -->
                <button class="btn btn-primary font-weight-bold" id="send_form" type="submit" form="fee-collection">Save</button>
            </div>
        </div>
        </div>
    </div>
    <!-- end row -->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      
      <!--end::Info-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <!--begin::Actions-->

        <!--end::Dropdown-->
      </div>
      <!--end::Toolbar-->
    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <div class="alert alert-success d-none" id="msg_div">
              <span id="res_message"></span>
         </div>
      <!--begin::Teachers-->
      <div class="d-flex flex-row">
        <!--begin::Aside-->
        

        <!--end::Aside-->
        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
          <!--begin::Card-->
          <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
              <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Fee Tarrif</span>
                <!-- <span class="text-muted mt-1 font-weight-bold font-size-sm">Manage over 1600 Fee Tarrif</span>
              </h3> -->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
        <div class="card-body">
          <div class="row">
            <div class="col-4 p-5 pt-1">
              <select id="inputState" name="class_section_session_id" class="form-control class_section_session_id">
                <option selected>Choose Class</option>
                @foreach($classSectionSession as $record)
                <option value="{{$record->id}}" 
                    >
                    {{ $record->class->name }}
                    @if($record->section)
                    {{ ' | '.$record->section->name }}
                    @endif
                </option>
                  @endforeach
              </select>
            </div>
          </div>
<table id="example" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Balance</th>
      <th scope="col">Received Amount</th>
      <th scope="col">Discount</th>
      <th scope="col">Balance</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="append_here">
   
  </tbody>
</table>
</div>
                              <!--end::Body-->
                            </div>
                            <!--end::Card-->
                          </div>
                          <!--end::Content-->
                        </div>
                        <!--end::Teachers-->
                      </div>
                      <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                  </div>
                  <!--end::Content-->
@endsection
<!-- @push('script') -->
<!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script> -->


<script >
  var count=0;
      $(document).on('change', '.class_section_session_id', function () {
            // second method
             var class_section_session_id=$(this).val();
             // aler(class_section_session_id);
             // var product_id = tr.find('.product_id').val();
              console.log(class_section_session_id);
  $.ajax({
         type:'get',
         url: 'getCSS',
         data:{'class_section_session_id':class_section_session_id},
        success:function(response){
      // debugger;
              console.log(response);
               var html="";
            $.each(response, function(l1, row1)
            {
               // debugger;
            //   $.each(row1.student_fee, function(l1, rowf)
            // {
              count++;
                  // debugger;
           if(row1.student!=null && row1.student!="")
           { 
             if(row1.fee_collect!=null && row1.fee_collect!="")
           { 

            // debugger;   
             html+=`<tr>
             <td ><input type="hidden" value="`+count+`" name="raw_row[]">`+count+`</td>
             <td ><input type="hidden"  ><input type="hidden" name= "student_id[]" value="`+row1.student.first_name+`" id="student_id">`+row1.student.first_name+`</td>
             <td ><input type="hidden" name= "class_section_session_id[]" value="`+class_section_session_id+`" class="form-control" id="class_section_session_id">`+row1.css.class.name+`</td>
             <td ><input type="hidden" value="`+row1.student.balance+`" name= "amount[]" id="amount" >`+row1.student.balance+`</td>
              <td ><input type="hidden" name= "received_amount[]"  >`+row1.fee_collect.received_amount+`</td><td ><input type="hidden" name= "discount[]"  >`+row1.fee_collect.discount+`</td>
             <td ><input type="hidden" name= "balance[]"  >`+row1.fee_collect.balance+`</td>
              <td ><input type="hidden" name= "total[]"  >`+row1.fee_collect.total+`</td>
              <td>
                    <a type="button"
                                    class="btn btn-primary btn " data-bs-toggle="modal" onclick="getPayment('${encodeURIComponent(JSON.stringify(row1))}')"> Payment</a>


              </td></tr>`;
            }else{
              // debugger;   
             html+=`<tr>
             <td ><input type="hidden" value="`+count+`" name="raw_row[]">`+count+`</td>
             <td ><input type="hidden"  ><input type="hidden" name= "student_id[]" value="`+row1.student.first_name+`" id="student_id">`+row1.student.first_name+`</td>
             <td ><input type="hidden" name= "class_section_session_id[]" value="`+class_section_session_id+`" class="form-control" id="class_section_session_id">`+row1.css.class.name+`</td>
             <td ><input type="hidden" value="`+row1.student.balance+`" name= "amount[]" id="amount" >`+row1.student.balance+`</td>
             // <td ><input type="hidden" name= "received_amount[]"  >0.00</td><td ><input type="hidden" name= "discount[]"  >0.00</td>
             // <td ><input type="hidden" name= "balance[]"  >0.00</td>
             // <td ><input type="hidden" name= "total[]"  >0.00</td>
             // <td>
                    <a type="button"
                                    class="btn btn-primary btn " data-bs-toggle="modal" onclick="getPayment('${encodeURIComponent(JSON.stringify(row1))}')"> Payment</a>


              </td></tr>`;

            }
            }
           // }); 
          }); 
            $('#append_here').empty();
           $('#append_here').append(html);
        },
         error:function(){
        }
   });
  });


       function getPayment(obj){
        // alert(12)
        var obj = JSON.parse(decodeURIComponent(obj))
        console.log(obj);
        // var student_name = document.getElementById();

        var student_name = obj.student.first_name;
        var old_balance = obj.student.balance;
        var student_id = obj.student.id;
        var fee_id = obj.fee_tarrif.fee_id;
        var fee_amount = obj.fee_tarrif.amount;
         var class_name = obj.css.class.name;
         var class_section_session_id = obj.class_section_session_id;
            $('#student_name').val(student_name);
            $('#old_balance').val(old_balance);
            var grand_total=(+old_balance+ +fee_amount);
            $('#grand_total').val(grand_total);
            $('#student_id').val(student_id);
            $('#fee_id').val(fee_id);
            $('#fee_amount').val(fee_amount);
            $('#class_name').val(class_name);
            $('#class_section_session_id').val(class_section_session_id);
            // $('#').val();

        // var received_amount = obj.
        // var discount = obj.
        // var balance = obj.
        // var received_date = obj.

        $('#openPayment').modal('show');
       }
  //            var student_id=$(this).val();
  //            // aler(class_section_session_id);
  //            // var product_id = tr.find('.product_id').val();
  //             console.log(student_id);
  // $.ajax({
  //        type:'get',
  //        url: 'getStudent',
  //        data:{'student_id':student_id},
  //       success:function(response){
  //             console.log(response);
  //              var html="";
  //           $.each(response, function(l1, row1)
  //           {
  //               // debugger;
  //          // html+=`<tr><td colspan='2'>`+row1.css_id+`</td></tr>`;
  //          if(row1.student!=null && row1.student!="")
  //          {     
  //            // html +="<option value='"+row1.student.id+"'>"+row1.student.first_name+"</option>";
  //            html+=`<tr><td ><input type="hidden" value="`+row1.studen.id+`" name="raw_row[]"><input type="text" name= "student_id[]" value="`+row1.student.first_name+`" class="form-control"></td></tr>`;

                     
                  
  //           }
  //        }); 
  //            $('#append_here').empty();
  //               $('#append_here').append(html);
  //       },
  //        error:function(){
  //       }
  //  });
  // });
  $(document).on('keyup', '#received_amount', function () {

 var  fee_amount=$('#fee_amount').val();
 var  old_balance=$('#old_balance').val();
  var total_balance=(+old_balance+ +fee_amount);

 var  received_amount=$(this).val();
  var z_balance=(total_balance-received_amount);
 var  b=$('#balance').val(z_balance);
 var  balance=$('#balance').val();
 var  totol=$('#total').val(fee_amount);




    });
   $(document).on('keyup', '#discount', function () {

 var  fee_amount=$('#fee_amount').val();
var  old_balance=$('#old_balance').val();

 var  received_amount=$('#received_amount').val();
  var grand_total=(+old_balance+ +fee_amount);
 var  disc=$(this).val();
 var after_disc=(+received_amount+ +disc);
  var z_balance=(grand_total-after_disc);
 var  b=$('#balance').val(z_balance);
 // var  totol=$('#total').val(fee_amount);




    });

   $(document).ready(function(){
$('#send_form').click(function(e){
   e.preventDefault();
   /*Ajax Request Header setup*/
   $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

   $('#send_form').html('Sending..');
   
   /* Submit form data using ajax*/
   $.ajax({
      url: "{{ url('dataSubmit')}}",
      method: 'post',
      data: $('#contact_us').serialize(),
      success: function(response){
         //------------------------
         $('#send_form').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
           $('#msg_div').removeClass('d-none');
             $('#openPayment').modal('hide');
            
         //--------------------------
      }});
   });
});

</script>
<!-- @endpush -->