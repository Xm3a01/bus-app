@extends('dashboard.metronic')
@section('content')


<div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>  العميل
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
            <span class="active">  تعديل العميل  </span>
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
                          <span class="caption-subject font-dark bold uppercase"> تعديل العميل </span>
                    </div>
                 </div> 
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="POST" action="{{route('clients.update',$client->id)}}">
                @csrf
                @method('PUT')
                <div class="form-body">
                        <div class="form-group">
                                <label class="col-md-3 control-label">إسم </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="ادخل إسم التخصص " name="name" value="{{$client->name}}">
                                    </div>
                                </div>  
                            
                            <div class="form-group">
                                    <label class="col-md-3 control-label">البريد اللاكتروني</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="البريد اللاكتروني " name="email" value="{{$client->email}}">
                                        </div>
                                </div> 
                                <div class="form-group">
                                        <label class="col-md-3 control-label">التلفون</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="التلفون " name="phone"  value="{{$client->phone}}">
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">التلفون البديل</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="التلفون " name="altPhone"  value="{{$client->altPhone}}">
                                            </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">الجنس</label>
                                        <div class="col-md-6">
                                            <select name="gender" id="" class="form-control">
                                                <option value="">--الجنس--</option>
                                                <option {{$client->gender == '1' ? 'selected':''}} value="1">ذكر</option>
                                                <option {{$client->gender == '0' ? 'selected':''}} value="0">أنثى</option>
                                            </select>
                                            </div>
                                    </div>   
                                <div class="form-group">
                                        <label class="col-md-3 control-label">كلمة المرور</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" placeholder="كلمة المرور " name="password">
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