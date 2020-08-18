@extends('dashboard.metronic')
@section('content')
@section('title', 'تعديل المدينه')
 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>    معلومات المدينة
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
            <span class="active">  معلومات المدينة</span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT --> 
    <div class="row"> 
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                        <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-social-dribbble font-green hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">  تعديل معلومات المدينة  </span>
                                </div>
                             </div> 
                    <div class="portlet-body form">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('cities.update',$city->id)}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="select_one" value="city">
                            <div class="form-body"> 
                           
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">المدينة </label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" placeholder="ادخل  اسم المدينه " name="name" value="{{$city->name}}">
                                            </div>
                                          </div>  
                                           
                                            <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">حفظ</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>



@endsection