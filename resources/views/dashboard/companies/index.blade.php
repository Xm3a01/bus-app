@extends('dashboard.metronic')
@section('title', ' جدول الشركات')
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
            <h1> جدول الشركات
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
            <span class="active">  الشركات  </span>
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
                                                <a data-toggle="modal" href="#add_user"  id="sample_editable_1_new" class="btn green"> أضف شركه جديد 
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
                                                <li>
                                                    <a href="javascript:;" data-action="5" class="tool-action">
                                                        <i class="icon-refresh"></i> Reload</a>
                                                </li>
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
                                                        <th>الاسم</th>
                                                        <th>عدد الركاب</th>
                                                        <th> رقم البص / اللوحه</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                         
                                                    <tbody>
                                                @foreach($companies as $company)
                                                <tr>
                                                    <td>{{$company->id}}</td>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->passengerCount}}</td>
                                                    <td>{{$company->busNumber}}</td>
                                                    <td class = "actions">
                                                        
                                                        <div class="action" >
                                                            
                                                            <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">الادوات
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu1 pull-right" style="font-family: hacen">
                                                                <form action="{{route('companies.destroy', $company->id)}}" method="POST">
                                                                    @csrf {{ method_field('DELETE') }}
                                                           
                                                                    <li>
                                                                            <a href="{{route('companies.edit', $company->id)}}"
                                                                                    class="btn btn-sm btn-block bold uppercase">
                                                                                    <i class="fa fa-edit"> تعديل </i>
                                                                                </a>
                                                                    </li>
                                                                    <li>
                                                                            <button type="submit" class="btn btn-sm btn-danger btn-block bold uppercase">
                                                                                    <i class="fa fa-trash">حذف</i>
                                                                            </button>
                                                                    </li>
                                                        </form>
                                                        </ul>
                                                    </div>
                                                 
                                            </td>
                                      </tr> 
                                                    
                                     @endforeach
                                 </tbody>
                                 {{$companies->links()}}
                                </table>
                                </div>
                                </div>
                            </div>
                        </div>
                         </div>
                    </div>
                                             
                                     
                    
               
            <!-- END DATATABLE -->

<!-- BEGIN ADD_company MODEL -->
    <div class="modal fade" id="add_user" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="height: auto!important;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> <img src=" {{asset('vendor/img/remove-icon-small.png')}} " alt="" srcset=""> </button>
                    <h4 class="modal-title">إضافة شركه جديد</h4>
                </div>
                <div class="modal-body">
                                <!-- BEGIN PAGE BASE CONTENT --> 
            <div class="row"> 
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="p-3"> 
            <div class="portlet-body form">
              <form class="form-horizontal" id="user-form-add" role="form" method="POST" action="{{route('companies.store')}}">
                @csrf
                <input type="hidden" name="select_user" value="user">
                <div class="form-body">
                    <h4 class="text-left m-3">البيانات </h4><br>
                    <div class="form-group">
                        <label class="col-md-2 control-label"> الاسم </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="ادخل الاسم   " name="name">
                          </div>  

                          <label class="col-md-1 control-label"> عدد الركاب</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="عدد الركاب" name="passengerCount">
                          </div>  
                       </div>
                       <div class="form-group">
                        <label class="col-md-2 control-label"> رقم المركبه /اللوحه </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="رقم المركبه /اللوحه" name="busNumber">
                          </div>   
                       </div>
                      </div>    
                    </form>
                 </div>
                </div> 
            </div>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn green" onclick="event.preventDefault(); document.getElementById('user-form-add').submit();">حفظ</button>
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
        $('#users-table').DataTable();
    });

</script>
@endsection
<!-- END SCRIPTS -->
