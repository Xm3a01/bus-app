@extends('dashboard.metronic')
@section('title', ' جدول المشرفون')
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
            <h1> جدول المظفون
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
            <span class="active">  المظفون  </span>
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
                                                <a data-toggle="modal" href="#add_user"  id="sample_editable_1_new" class="btn green"> أضف موظف جديد 
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
                                                        <th># </th>
                                                        <th>الاسم</th>
                                                        <th>البريد اللاكتروني</th>
                                                        <th> الهاتف</th>
                                                        <th>العمليات</th>
                                                    </tr>
                                                </thead>
                                         
                                                    <tbody>
                                                @foreach($officers as $index => $officer)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{$officer->name}}</td>
                                                    <td>{{$officer->email}}</td>
                                                    <td>{{$officer->phone}}</td>
                                                    <td class = "actions">
                                                        
                                                        <div class="action" >
                                                            
                                                            <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">الادوات
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu1 pull-right" style="font-family: hacen">
                                                                <form action="{{route('officers.destroy', $officer->id)}}" method="POST">
                                                                    @csrf {{ method_field('DELETE') }}
                                                           
                                                                    <li>
                                                                            <a href="{{route('officers.edit', $officer->id)}}"
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
                                 {{$officers->links()}}
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
                    <h4 class="modal-title">إضافة مشرف جديد</h4>
                </div>
                <div class="modal-body">
                                <!-- BEGIN PAGE BASE CONTENT --> 
            <div class="row"> 
                <div class="col-md-12 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="p-3"> 
            <div class="portlet-body form">
              <form class="form-horizontal" id="user-form-add" role="form" method="POST" action="{{route('officers.store')}}">
                @csrf
                <input type="hidden" name="select_user" value="user">
                <div class="form-body">
                    <h4 class="text-left m-3">البيانات </h4><br>
                    <div class="form-group">
                        <label class="col-md-2 control-label"> الاسم </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="ادخل الاسم   " name="name">
                          </div>  

                          <label class="col-md-1 control-label"> البريد اللاكتروني</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="البريد اللاكتروني" name="email">
                          </div>  
                       </div>

                       <div class="form-group">
                        <label class="col-md-2 control-label"> كلمة المرور </label>
                        <div class="col-md-4">
                            <input type="password" class="form-control" placeholder="كلمة المرور   " name="password">
                          </div>  

                          <label class="col-md-1 control-label">  الهاتف</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="الهاتف" name="phone">
                          </div>  
                       </div>
                       {{-- <div class="form-group">
                        <label class="col-md-2 control-label">الهاتف البديل </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="الهاتف البديل" name="altPhone">
                          </div>  

                          <label class="col-md-1 control-label">الجنس</label>
                        <div class="col-md-4">
                            <select name="gender" id="" class="form-control">
                                <option value="">--الجنس--</option>
                                <option value="1">ذكر</option>
                                <option value="0">أنثى</option>
                            </select>
                          </div>  
                       </div> --}}
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
