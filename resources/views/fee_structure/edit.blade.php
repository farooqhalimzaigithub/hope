@extends('layouts.main')
@section('content')
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
          <form class="form  mt-12"  method="post" action="{{route('fee_structures.update',$fee_structure->id)}}" >
            @csrf
            @method('PUT')

            <!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
            <div class="row">
              <div class="form-group col-lg-4">
                <label for="inputState">Session</label>
                <select id="inputState" name="session_id" class="form-control ">
                  <option selected>Choose Session</option>
                  @foreach($sessions as $session)
                  <option value="{{$session->id}}">{{$session->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputState">Class |Level</label>
                <select id="inputState" name="class_section_session_id" class="form-control ">
                  <option selected>Choose Class</option>
                  @foreach($classes as $class)
                  @if($class->id==$fee_structure->class_id)
                  <option value="{{$class->id}}" selected="">{{$class->name}}</option>
                  @else
                   <option value="{{$class->id}}">{{$class->name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group col-lg-4">
                <label for="inputState">Fee Type</label>
                <select id="inputState" name="fee_type_id" class="form-control ">
                  <option selected>Choose Fee Type</option>
                  @foreach($fee_category as $fee)
                  @if($fee->id==$fee_structure->fee_type_id)
                  <option value="{{$fee->id}}" selected="">{{$fee->name}}</option>
                  @else
                  <option value="{{$fee->id}}">{{$fee->name}}</option>

                  @endif
                  @endforeach
                </select>
              </div>
              <div class="col-lg-4">
                <!--begin::Input-->
                <div class="form-group">
                  <label> Amount</label>
                  <input type="number" class="form-control  "  value="{{$fee_structure->amount}}" name="amount"  required="" />
                  <!-- <span class="form-text text-muted">Please enter Number</span> -->
                </div>
                <!--end::Input-->
              </div>
              
            </div>
            
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
  
  //   $(document).on('change', '.branch_id', function () {
  //           // second method
  //            var branch_id=$(this).val();
  //            // var product_id = tr.find('.product_id').val();
  //             console.log(branch_id);
  // $.ajax({
  //       type:'get',
  //       // url:'{!!URL::to('categoryFind')!!}',
  //        url: '/getBranch',
  //       data:{'branch_id':branch_id},
  //       success:function(data){
  //            console.log(data);
  //           // this is sec method for get current price and qty in every row  
  //             $('#branch_code').val(data.branch_code);
  //             // tr.find('#stock_quantity').val(data[0].quantity);
  //             //  $('#price'+quantity_price_id).val("");
  //       }
  //  });
  // });

</script>