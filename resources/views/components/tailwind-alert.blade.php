


@if(Session::has("tailwind_alerts"))
<div class="fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
@foreach (session('tailwind_alerts') as $k =>$alert)
    <div class="alert-toast" id="alert_tailwind_{{$k}}">
        <input type="checkbox" class="hidden alert_tailwind_checkbox" data-alert-id="alert_tailwind_{{$k}}" id="alert_message_buttom_{{$k}}">

        <label class="close cursor-pointer flex items-start justify-between w-full p-2 {{$alert['level']}} h-24 rounded shadow-lg text-white" title="close" for="alert_message_buttom_{{$k}}">
            {{$alert['message']}}
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        </label>
    </div>
@endforeach
</div>


<script>
var elements = document.getElementsByClassName("alert_tailwind_checkbox");

var closeDiv = function(ev) {
    var divToCloseId = ev.target.dataset.alertId;

    setTimeout(function(){
        let div = document.getElementById(divToCloseId);
        div.remove();
    },1000);
};

for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('click', closeDiv, false);
}
</script>


<style scoped>
/*Toast open/load animation*/
.alert-toast {
     -webkit-animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
     animation: slide-in-right 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
   }

   /*Toast close animation*/
   .alert-toast input:checked~* {
     -webkit-animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
     animation: fade-out-right 0.7s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
   }
   @-webkit-keyframes fade-out-right {
     0% {
       -webkit-transform: translateX(0);
       transform: translateX(0);
       opacity: 1
     }

     100% {
       -webkit-transform: translateX(50px);
       transform: translateX(50px);
       opacity: 0
     }
   }

   @keyframes fade-out-right {
     0% {
       -webkit-transform: translateX(0);
       transform: translateX(0);
       opacity: 1
     }

     100% {
       -webkit-transform: translateX(50px);
       transform: translateX(50px);
       opacity: 0
     }
   }
</style>
@endif
