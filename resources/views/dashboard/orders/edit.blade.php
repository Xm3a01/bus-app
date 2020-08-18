@extends('dashboard.metronic')
@section('content')


 <!-- BEGIN PAGE HEAD-->
 <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> تعديل طلب
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
            <span class="active"> تعديل طلب</span>
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
                        <span class="caption-subject font-dark bold uppercase"></span>
                    </div>
                 </div>
        <div class="portlet-body form">
             <form class="form-horizontal" id="user-form" role="form" method="POST" action="{{route('tickets.update' , $ticket->id)}}">
                @csrf
                @method('PUT')
                <input type ="hidden" name ="select_user" value ="user_edit">

                <div class="form-body">
                    <h4 class="text-right m-3">البيانات </h4><br>
                    <div class="form-group">
                        <label class="col-md-2 control-label"> الشركه</label>
                        <div class="col-md-4">
                            <select name="company_id" id="inputState" class="form-control">
                                <option disabled selected> الشركه </option>
                                @foreach ($companies as $company) 
                                    <option {{$ticket->company_id == $company->id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                          </div>  

                          <label class="col-md-1 control-label"> عدد ساعات الرحله</label>
                        <div class="col-md-4">
                            <select name="from"  id="inputState" class="form-control">
                                <option disabled selected>ساعات الرحله</option>
                                @foreach ($tickets as $ticket) 
                                   <option value="{{ $ticket->hourNumber }}">{{ $ticket->hourNumber}}</option>
                                @endforeach
                            </select>
                          </div>  
                    </div>
                    
                    <div class="form-group">
                        

                          <label class="col-md-2 control-label">من: </label>
                              <div class="col-md-4">
                                <select name="fromCity_id" id="inputState" class="form-control">
                                        <option disabled selected> من </option>
                                        @foreach ($cities as $city) 
                                            <option {{$ticket->from == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-1 control-label">الى: </label>
                                <div class="col-md-4">
                                <select name="toCity_id" id="inputState" class="form-control">
                                        <option disabled selected> الى </option>
                                        @foreach ($cities as $city) 
                                            <option {{$ticket->to == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                                
                                <label class="col-md-2 control-label"> عدد المقاعد المتوفره</label>
                              <div class="col-md-4">
                                    <input type="text" class="form-control" name="emptySeating" value="{{$ticket->emptySeating}}" id="" placeholder="عدد المقاعد المتوفره">
                              </div>
                                    
                              <label class="col-md-1 control-label">تاريخ الرحله</label>
                              <div class="col-md-4">
                                    <input type="date" class="form-control" name="date" id="" value="{{$ticket->date}}">
                                </div>
                        </div>

                           <div class="form-group">
                            <label class="col-md-2 control-label"> السعر</label>
                            <div class="col-md-4">
                                 <input type="text" class="form-control" name="price" id="" placeholder="السعر" value="{{$ticket->price}}">
                            </div>
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