<template>
    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <i class="icon-bell"></i>
            <span v-if="notifications" class="badge badge-success">{{notifications.length}}</span>
        </a> 
        <ul class="dropdown-menu">
            <li class="external">
                <h3>
                    <span class="bold">{{notifications.length}} pending</span> notifications</h3>
                <a href="#">view all</a>
            </li>
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                    <!-- @foreach (Auth::user()->unreadnotifications as $notfy)    -->
                    <li v-for="notification in notifications" :key="notification.id">
                        <a href="#">
                            <span class="time">{{dateDiff(notification.id)}}{{dateD}}</span>
                            <span class="details">
                                <span class="">
                                    <i class=""> <img src=" #" alt="AVATAR" height="30" width="30"> </i>
                                </span> {{ notification['data']['notify']}}  </span>
                        </a>
                    </li> 
                    <!-- @endforeach -->
                </ul>
            </li>
        </ul>
    </li>

</template>

<script>
    export default {
        data (){
            return {
                notifications: '',
                dateD:''
            }
        },
        mounted() {
            this.not()
        },
    computed: {
        },

        methods:{
         not() {
          axios.get('notify').then((res)=>{
              this.notifications = res.data
          }).catch((err)=>{
              console.error(err)
          })
         },
         dateDiff(val){
             let d = ''
            axios.get('date-convert?date='+val).then((res)=>{
                this.dateD =  res.data
            })
         }
        }

    }
</script>