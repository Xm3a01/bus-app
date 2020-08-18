@extends('dashboard.metronic')
@section('content')


 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>
            </h1>
        </div> 
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="index.html">الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">تعديل شركه </span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT --> 
    <div class="row"> 
<div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-green hide"></i>
                        <span class="caption-subject font-dark bold uppercase"> تعديل شركه </span>
                    </div>
                 </div>
        <div class="portlet-body form">
             <form class="form-horizontal" id="user-form" role="form" method="POST" action="{{route('companies.update' , $company->id)}}">
                @csrf
                @method('PUT')
                <input type ="hidden" name ="select_user" value ="user_edit">
                <div class="form-body">
                    <h4 class="text-right m-3">البيانات </h4><br>
                    <div class="form-group">
                        <label class="col-md-2 control-label">الإسم  </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="ادخل إسم  " name="name" value="{{$company->name}}">
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"> عدد الركاب </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="ادخل إسم  " name="passengerCount" value="{{$company->passengerCount}}">
                        </div>      
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">  رقم المركبه/اللوحه </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="رقم المركبه/اللوحه  " name="busNumber" value="{{$company->busNumber}}">
                        </div>      
                    </div>
                    
                    <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">حفظ</button>
                            <button type="button" class="btn default">إلغاء</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</div>
</div>



@endsection