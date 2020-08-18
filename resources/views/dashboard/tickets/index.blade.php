@extends('dashboard.metronic')
@section('title', ' جدول التذاكر')
<!-- BEGIN CSS -->
@section('stylesheets') 
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">

@endsection
<!-- END CSS -->
@section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> جدول التذاكر
            </h1>
        </div> 
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="/dashboard">الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active"> التذاكر  </span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
     <div class="mt-bootstrap-tables">
        <div class="row">
            <div class="col-md-12">
                    <!-- Begin: life time stats -->
                            <div class="portlet light bordered portlet-fit portlet-datatable">
                                <div class="portlet-title"> 
                                <div class="table-toolbar pull-left">
                                            <div class="btn-group">
                                                <a data-toggle="modal" href="#add_ticket"  id="sample_editable_1_new" class="btn green"> أضف تذكره جديده 
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <div class="actions"> 
                                        <div class="btn-group">
                                            <a class="btn red btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                                                <i class="fa fa-share"></i>
                                                <span class="hidden-xs"> الادوات</span>
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right" id="sample_3_tools">
                                                <li>
                                                    <a href="javascript:;" data-action="0" class="tool-action">
                                                        <i class="icon-printer"></i> Print</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="1" class="tool-action">
                                                        <i class="icon-check"></i> Copy</a>
                                                </li>
                                                {{-- <li>
                                                    <a href="javascript:;" data-action="2" class="tool-action">
                                                        <i class="icon-doc"></i> PDF</a>
                                                </li> --}}
                                                <li>
                                                    <a href="javascript:;" data-action="3" class="tool-action">
                                                        <i class="icon-paper-clip"></i> Excel</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-action="4" class="tool-action">
                                                        <i class="icon-cloud-upload"></i> CSV</a>
                                                </li>
                                                <li class="divider"> </li>
                                                {{-- <li>
                                                    <a href="javascript:;" data-action="5" class="tool-action">
                                                        <i class="icon-refresh"></i> Reload</a>
                                                </li> --}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                  <div class="portlet-body">
                                    <div class="table-container">
                                         <table class="table table-striped table-hover" id="sample_3">
                                             <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"> </th>
                                                        <th>الشركه</th>
                                                        <th>المقعاد المتوفره</th>
                                                        <th> السعر</th>
                                                        <th>عدد ساعات الرحله</th>
                                                        <th>تاريخ الرحله</th>
                                                        <th>عدد المقاعد الكلي</th>
                                                        <th> من: </th>
                                                        <th>الى: </th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                         
                                                    <tbody>
                                                @foreach($tickets as $ticket)
                                                <tr>
                                                    <td>{{$ticket->id}}</td>
                                                    <td>{{$ticket->company->name}}</td>
                                                    <td>{{$ticket->emptySeating}}</td>
                                                    <td>{{$ticket->price}}</td>
                                                    <td>{{$ticket->hourNumber}}</td>
                                                    <td>{{$ticket->date}}</td>
                                                    <td>{{$ticket->company->passengerCount}}</td>
                                                    <td>{{$ticket->fromCity->name ?? ''}}</td>
                                                    <td>{{$ticket->toCity->name ?? ''}}</td>
                                                    <td class = "actions">
                                                        <form action="{{route('tickets.destroy', $ticket->id)}}" method="POST">
                                                            @csrf {{ method_field('DELETE') }}
        
                                                        <div class="action" >
                                                            
                                                        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">الادوات
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu1 pull-right" style="font-family: hacen">
                                                            <li>
                                                                    <a href="{{route('tickets.edit', $ticket->id)}}"
                                                                            class="btn btn-sm  bold uppercase">
                                                                            <i class="fa fa-edit"> تعديل </i>
                                                                        </a>
                                                            </li>
                                                            <li>
                                                                    <button type="submit" class="btn btn-sm btn-block bold uppercase">
                                                                            <i class="fa fa-trash">حذف</i>
                                                                    </button>
                                                            </li>
                                                            <li>
                                                                {{-- <a class="btn btn-info" href="{{route('admin.pdf',$ticket->id)}}" id="print-cv">اطبع CV</a> --}}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                 
                                                </form>
                                            </td>
                                      </tr> 
                                                    
                                     @endforeach
                                 </tbody>
                                 {{$tickets->links()}}
                                             </table>
                                        </div>
                                      </div>
                                   </div>
                                </div>
                            </div>
                            </div>
                                             
                                     
                    
               
            <!-- END DATATABLE -->

<!-- BEGIN ADD_company MODEL -->
    <div class="modal fade" id="add_ticket" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: auto!important;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <img src=" {{asset('vendor/img/remove-icon-small.png')}} " alt="" srcset=""> </button>
                    <h4 class="modal-title">إضافة تذكره جديد</h4>
                </div>
                <div class="modal-body">
                                <!-- BEGIN PAGE BASE CONTENT --> 
            <div class="row"> 
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="p-3"> 
            <div class="portlet-body form">
              <form class="form-horizontal" id="ticket-form-add" role="form" method="POST" action="{{route('tickets.store')}}">
                @csrf
                <input type="hidden" name="select_ticket" value="ticket">
                <div class="form-body">
                    <h4 class="text-left m-3">البيانات </h4><br>
                    <div class="form-group">
                        <label class="col-md-2 control-label"> الشركه</label>
                        <div class="col-md-4">
                            <select name="company_id" id="inputState" class="form-control">
                                <option disabled selected> الشركه </option>
                                @foreach ($companies as $company) 
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                          </div>  

                          <label class="col-md-1 control-label"> عدد ساعات الرحله</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="عدد ساعات الرحله  " name="hourNumber">
                          </div>  
                    </div>
                    
                    <div class="form-group">
                        

                          <label class="col-md-2 control-label">من: </label>
                              <div class="col-md-4">
                                <select name="fromCity_id" id="inputState" class="form-control">
                                        <option disabled selected> من </option>
                                        @foreach ($cities as $city) 
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-1 control-label">الى: </label>
                                <div class="col-md-4">
                                <select name="toCity_id" id="inputState" class="form-control">
                                        <option disabled selected> الى </option>
                                        @foreach ($cities as $city) 
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                                
                                <label class="col-md-2 control-label"> عدد المقاعد المتوفره</label>
                              <div class="col-md-4">
                                    <input type="text" class="form-control" name="emptySeating" id="" placeholder="عدد المقاعد المتوفره">
                              </div>
                                    
                              <label class="col-md-1 control-label">تاريخ الرحله</label>
                              <div class="col-md-4">
                                    <input type="date" class="form-control" name="date" id="">
                                </div>
                        </div>

                           <div class="form-group">
                            <label class="col-md-2 control-label"> السعر</label>
                            <div class="col-md-4">
                                 <input type="text" class="form-control" name="price" id="" placeholder="السعر">
                            </div>
                        </div>

                        {{--

                        <div class="form-group">
                                <label class="col-md-2 control-label">رقم الجواز</label>
                                <div class="col-md-4">
                                    <input type="text" name="idint_1" class="form-control" id="" placeholder="مثلا 233456765">
                                </div>
                                  <label class="col-md-1 control-label">الرقم الوطني</label>
                                  <div class="col-md-4">
                                        <input type="text" name="idint_2" class="form-control  " placeholder="مثلا 188-15-34-567-45">
                                    </div>
                            </div>
                            
                            
                            <div class="form-group">
                                    <label class="col-md-2 control-label">رقم الهاتف</label>
                                    <div class="col-md-6">
                                            <input type="text" name="phone" class="form-control  " placeholder=" ادخل رقم الهاتف">
                                     </div> 
                                </div> 
>
                            <div class="form-group">
                                    <label class="col-md-2 control-label">المستوى الوظيفي</label>
                                    <div class="col-md-4">
                                            <input type="text" name="level" class="form-control  " placeholder="مثلا : اخصائي">
                                     </div> 
                                </div>  --}}
                           </div>    
                        </form>
                    </div>
                </div> 
            </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn green" onclick="event.preventDefault(); document.getElementById('ticket-form-add').submit();">حفظ</button>
        </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>
             

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
{{-- <script src=" {{asset('asset/js/jquery.printPage.js')}} "></script>
<script>
    $(document).ready(function () {
        $('#print-cv').printPage();
    });
    

</script> --}}


<script src="{{asset('vendor/js/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#tickets-table').DataTable();
    });

</script>
@endsection
<!-- END SCRIPTS -->
