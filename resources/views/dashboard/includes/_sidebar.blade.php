<div class="page-sidebar-wrapper">
<!-- BEGIN SIDEBAR -->
 <div class="page-sidebar navbar-collapse collapse">
<!-- BEGIN SIDEBAR MENU -->
<ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
<li class="nav-item start  {{Request::is('dashboard') ? 'active open' : ''}}">
<a href="{{route('dashboard')}}" class="nav-link ">
<i class="icon-home"></i>
<span class="title">الرئيسية</span>
</a>
</li>  
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle">
    <i class="icon-users"></i>
    <span class="title"> المستخدمين</span>
    <span class="arrow"></span>
</a>
<ul class="sub-menu">
  @role('super-admin')
    <li class="nav-item  {{Request::is('user*') ? 'active open' : ''}}">
       <a href="{{route('admins.index')}}" class="nav-link">
            <span class="title">المشرفون</span>
        </a>
    </li>
  @endrole
  @hasanyrole('super-admin|admin')
    <li class="nav-item ">
        <a href="{{route('officers.index')}}" class="nav-link">
            <span class="title">الموظفين</span>
        </a>
    </li>
    <li class="nav-item ">
        <a href="{{route('clients.index')}}" class="nav-link">
            <span class="title">العملاء</span>
        </a>
    </li>
 @endhasanyrole
   
</ul>
</li>  

<li class="nav-item">
<a href="{{route('companies.index')}}" class="nav-link nav-toggle">
    <i class="icon-settings"></i>
    <span class="title">شركات النقل</span>
</a>
</li> 

<li class="nav-item  ">
<a href="javascript:;" class="nav-link nav-toggle">
    <i class="icon-briefcase"></i>
    <span class="title">الرحلات</span>
    <span class="arrow"></span>
</a>
<ul class="sub-menu">
<li class="nav-item ">
    <a href="{{route('tickets.index')}}" class="nav-link ">
        <span class="title">التذاكر </span>
    </a>
</li>
<li class="nav-item ">
    <a href="{{route('orders.index')}}" class="nav-link ">
        <span class="title"> الحجوزات</span>
    </a>
 </li>
</ul>
</li>

  <li class="nav-item">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-settings"></i>
        <span class="title">الدول والمدن</span>
        <span class="arrow"></span>
    </a>
        <ul class="sub-menu">
            <li class="nav-item ">
                <a href="{{route('cities.index')}}" class="nav-link ">
                    <span class="title"> المدن </span>
                </a>
            </li>
        </ul>
    </li> 
        
            
  </ul>
 </li>
</ul>
<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>