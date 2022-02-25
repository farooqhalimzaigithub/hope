@extends('layouts.main')
@section('content')
<div class="d-flex flex-column-fluid">
                            <!--begin::Container-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 bg-white">
                                        <!--begin::Card-->
                                        <!-- <div class="card card-custom gutter-b example example-compact" style="border : 1px solid yellow;"> -->
                                            <div class="card-header">
                                                <h3 class="card-title">VEC Form</h3>
                                                <div class="card-toolbar">
                                                    <div class="example-tools justify-content-center">
                                                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                                                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <form class="form  mt-4"  method="post" action="{{route('vecs.store')}}" >
            @csrf

                <!-- <h4 class="mb-8 font-weight-bold text-dark">Module Details</h4> -->
                <div class="row">
                    <div class="col-xl-4">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b>Meeting Date  <span class="text-danger">*</span></b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="date" name="meeting_date" value="<?php echo date('Y-m-d');?>" class="form-control form-control-solid" required="">
                                </div>
                        <!--end::Input-->
                    </div>
                        <div class="col-xl-4">
                    <div class="form-group">
                                    <p><b>Meeting Place  <span class="text-danger">*</span></b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="meeting_place" class="form-control form-control-solid" required="">
                                </div>
                   </div>
                   <div class="col-xl-4">
                    <div class="form-group">
                                    <p><b>Meeting #  <span class="text-danger">*</span></b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="meeting" class="form-control form-control-solid" required="">
                                </div>
                   </div>
                </div>
                 <div class="row">
                    <div class="col-xl-12">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b> Agenda  <span class="text-danger">*</span></b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="text" name="agenda"  class="form-control form-control-solid" required="">
                                </div>
                        <!--end::Input-->
                    </div>
                    </div>
                     <div class="row">
                     <div class="col-xl-12">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b>Proceeding</b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <textarea type="text" name="proceeding"  class="form-control form-control-solid" required="" cols="4" rows="6"></textarea>
                                </div>
                        <!--end::Input-->
                    </div>
                </div>
                 <div class="row">
                    <div class="col-xl-3">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b> Present Member <span class="text-danger">*</span></b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="number" name="present_member"  class="form-control form-control-solid" required="">
                                </div>
                        <!--end::Input-->
                    </div>
                     <div class="col-xl-3">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b> Absent Member <span class="text-danger">*</span></b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="number" name="absent_member"  class="form-control form-control-solid" required="">
                                </div>
                        <!--end::Input-->
                    </div>
                     <div class="col-xl-3">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b> Attendance Sheet Picture</b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="file" name="att_sheet_image"  class="form-control form-control-solid" >
                                </div>
                        <!--end::Input-->
                    </div>
                     <div class="col-xl-3">
                        <!--begin::Input-->
                        <div class="form-group">
                                    <p><b> Attendance Sheet Picture</b></p>
                                    <label for="village" class="sr-only">From</label>
                                    <input type="file" name="group_image"  class="form-control form-control-solid" >
                                </div>
                        <!--end::Input-->
                    </div>
                    </div>
                
                    <div class="d-flex justify-content-between border-top mt-0 pt-10 pb-10">
                        <!-- <div class="mr-2">
                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                        </div> -->
                        <div>
                            <button type="submit" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4">submit</button>
                            
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