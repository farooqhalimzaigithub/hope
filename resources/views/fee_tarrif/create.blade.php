@extends('layouts.main')
@section('content')
<style type="text/css">
	
	.pt-3-half { padding-top: 1.4rem; }
</style>
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Card-->
				<!-- <div class="card card-custom gutter-b example example-compact" style="border : 1px solid yellow;"> -->
					<div class="card-header">
						<h3 class="card-title">Fee Tarrif Form</h3>
						<div class="card-toolbar">
							<div class="example-tools justify-content-center">
								<span class="example-toggle" data-toggle="tooltip" title="View code"></span>
								<span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
							</div>
						</div>
					</div>
					<form class="form  mt-12"  method="post" action="{{route('fee_tarrifs.store')}}" >
						@csrf

						<!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
						<div class="row">
							<div class="form-group col-lg-6">
								<label for="inputState">Class |Level</label>
								<select id="inputState" name="class_id" class="form-control class_id ">
									<option selected>Choose Class</option>
									@foreach($classes as $class)
									<option value="{{$class->id}}">{{$class->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					<!-- Editable table -->
<div class="card">
  <!-- <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
    Editable table
  </h3> -->
  <div class="card-body">
    <div id="table" class="table-editable col-lg-6" style="font-size: 10px;">
      <!-- <span class="table-add float-right mb-3 mr-2"
        ><a href="#!" class="text-success"
          ><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a
      ></span> -->
      <table class="table table-bordered table-responsive-md  ">
        <thead>
          <tr>
            <th class="w-30">Fee Head Name</th>
            <th class="w-5">Amount</th>
             <!-- <th class="text-center">Remove</th> -->
          </tr>
          
        </thead>
        <tbody id="append_here">
        </tbody>
        <tr>
            <th class=""> Total</th>
            <th  colspan="3" class="text-right"> 0.00</th>
           
          </tr>
      </table>
    </div>
  </div>
</div>
<!-- Editable table -->
						
						<!-- </div> -->

						<div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">
						<!-- <div class="mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
						</div> -->
						<div>
							<button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">Submit</button>
							
						</div>
					</div>
					<!--end::Wizard Actions-->
				</form>

				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 17-->
		</div>

	</div>
	<!--end::Row-->

	<!--end::Row-->
	<!--end::Dashboard-->
</div>
<!--end::Container-->

@endsection
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>


<script >
	
// 		const $tableID = $('#table'); const $BTN = $('#export-btn'); const $EXPORT = $('#export');
// const newTr = `
// <tr class="hide">
//   <td class="pt-3-half" contenteditable="true">Example</td>
//   <td class="pt-3-half" contenteditable="true">Example</td>
//   <td class="pt-3-half" contenteditable="true">Example</td>
//   <td class="pt-3-half" contenteditable="true">Example</td>
//   <td class="pt-3-half" contenteditable="true">Example</td>
//   <td class="pt-3-half">
//     <span class="table-up"
//       ><a href="#!" class="indigo-text"
//         ><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a
//     ></span>
//     <span class="table-down"
//       ><a href="#!" class="indigo-text"
//         ><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a
//     ></span>
//   </td>
//   <td>
//     <span class="table-remove"
//       ><button
//         type="button"
//         class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light"
//       >
//         Remove
//       </button></span
//     >
//   </td>
// </tr>
// `; 
// $('.table-add').on('click', 'i', () => { const $clone = $tableID.find('tbodytr').last().clone(true).removeClass('hide table-line'); if ($tableID.find('tbody tr').length
// === 0) { $('tbody').append(newTr); } $tableID.find('table').append($clone); });
// $tableID.on('click', '.table-remove', function () { $(this).parents('tr').detach(); });
// $tableID.on('click', '.table-up', function () { const $row = $(this).parents('tr'); if
// ($row.index() === 0) { return; } $row.prev().before($row.get(0)); }); $tableID.on('click',
// '.table-down', function () { const $row = $(this).parents('tr');
// $row.next().after($row.get(0)); }); // A few jQuery helpers for exporting only jQuery.fn.pop
// = [].pop; jQuery.fn.shift = [].shift; $BTN.on('click', () => { const $rows =
// $tableID.find('tr:not(:hidden)'); const headers = []; const data = []; // Get the headers
// (add special header logic here) $($rows.shift()).find('th:not(:empty)').each(function () {
// headers.push($(this).text().toLowerCase()); }); // Turn all existing rows into a loopable
// array $rows.each(function () { const $td = $(this).find('td'); const h = {}; // Use the
// headers from earlier to name our hash keys headers.forEach((header, i) => { h[header] =
// $td.eq(i).text(); }); data.push(h); }); // Output the result
// $EXPORT.text(JSON.stringify(data)); });


$(document).on('change', '.class_id', function () {
            // second method
             var class_id=$(this).val();
             // var product_id = tr.find('.product_id').val();
              console.log(class_id);
  $.ajax({
        type:'get',
        // url:'{!!URL::to('categoryFind')!!}',
         url: '/getFee',
        data:{'class_id':class_id},
        success:function(data){
          
          console.log(data);
      var html="";
      var product_count=0;
           $.each(data, function(l, val)
                  {
                    product_count++;
                          
                   html+=`<tr class="table_append_rows"><td >`+val.name+`</td><td contenteditable="true" class="text-right amount">`+0.0+`</td></tr>`;
                          });
                  $('#append_here').empty();
                  $('#append_here').append(html); 
                  do_calculation();  
        },
   });
  });


// =================Start do calculate=================
function do_calculation() 
  {    
     // Declare variable for grand calculation
         
        var grand_total=0;
        var product_count=1;

        $('.table_append_rows').each(function()  // run loop on all append rows for calculation and value reseting
        {
        	// alert('ok');
            //  $(this).find('.product_count').text(product_count);// get qty from row
            var amount=$(this).find('.amount_hidden').find('input').val(); // get qty from row
            alert(qty);
            amount+=amount; // line total to grand total

           
             product_count++;
            
            $("input[name='amount']").val(amount);
            $("#grand_total").text(grand_total);
            // $("input[name='grand_total']").val(grand_total);
            // $("input[name='total_cost']").val(grand_subtotal);
                    
        });
    }
// =================END do calculate=================
</script>