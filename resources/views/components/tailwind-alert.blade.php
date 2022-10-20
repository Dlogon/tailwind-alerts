<div>
    @if (Session::has(config('tailwind-alerts.session_name')))
        <div class="fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
            @foreach (session(config('tailwind-alerts.session_name')) as $k => $alert)
                <div class="alert-toast" id="alert_tailwind_{{ $k }}">
                    <input type="checkbox" class="hidden alert_tailwind_checkbox"
                        data-alert-id="alert_tailwind_{{ $k }}" id="alert_message_buttom_{{ $k }}">

                    <label
                        class="close cursor-pointer flex items-start justify-between w-full p-2 {{ $alert['level'] }} h-24 rounded shadow-lg text-white"
                        title="close" for="alert_message_buttom_{{ $k }}">
                        {{ $alert['message'] }}
                        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18"
                            height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </label>
                </div>
            @endforeach
        </div>


    @endif

    <div id="alertSingleFile" style="display: none" class="alert-toast">
        <input type="checkbox" class="hidden alert_tailwind_checkbox" data-alert-id="alert_toast" id="alert_message_buttom_check">

        <label
            class="close cursor-pointer flex items-start justify-between w-full p-2 level h-24 rounded shadow-lg text-white"
            title="close" for="alert_message_buttom_check">

            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
        </label>
    </div>
    <style>
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

    <div id="alert_container" class="fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    </div>
    <script>
        var elements = document.getElementsByClassName("alert_tailwind_checkbox");

        var closeDiv = function(ev) {
            var divToCloseId = ev.target.dataset.alertId;

            setTimeout(function() {
                let div = document.getElementById(divToCloseId);
                div.remove();
            }, 1000);
        };

        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', closeDiv, false);
        }
        var AlertToast = {
            id: "alertSingleFile",
            SUCCESS: "{{config('tailwind-alerts.default_alert_colors.SUCCESS')}}",
            ERROR: "{{config('tailwind-alerts.default_alert_colors.ERROR')}}",
            WARNING: "{{config('tailwind-alerts.default_alert_colors.WARNING')}}",
            INFO: "{{config('tailwind-alerts.default_alert_colors.INFO')}}",
            showToast: function(message, level) {

                let divId = (Math.random() + 1).toString(36).substring(7);
                let checkId = (Math.random() + 1).toString(36).substring(7);

                let div = document.getElementById(this.id).cloneNode(true);
                let alertContainer = document.getElementById("alert_container");

                div.id = divId;
                var lavel = div.querySelector("label");
                lavel.setAttribute("for", checkId);

                let check = div.querySelector("#alert_message_buttom_check");
                check.dataset.alertId = divId;
                check.setAttribute("id", checkId);
                check.addEventListener('click', closeDiv, false);

                debugger;
                lavel.className = lavel.className.replace("level", level);
                lavel.textContent = message;

                alertContainer.appendChild(div);
                div.style.display = "block";
            }
        }
    </script>

</div>
