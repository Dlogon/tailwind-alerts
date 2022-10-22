<div class="w-full">
    <div id="toast_template" style="display: none" class="alert-toast">
        <input type="checkbox" class="hidden alert_tailwind_checkbox">
        <label
            class="close cursor-pointer flex items-start justify-between w-full p-2 level h-24 rounded shadow-lg text-white"
            title="close">
            <p></p>
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                viewBox="0 0 18 18">
                <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                </path>
            </svg>
        </label>
    </div>
    <div id="line_template" style="display: none" class="alert-footer">
        <input type="checkbox" class="hidden alert_tailwind_checkbox">
        <div class="flex items-center justify-between w-full p-2 bg-blue-500 shadow text-white">
          <p></p>
          <label class="close cursor-pointer level" title="close">
            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </label>
        </div>
      </div>
    <div id="bottom_toast_container" class="fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    </div>
    <div id="top_toast_container" class="fixed top-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    </div>
    <div id="footer_container" class="w-full right-0 left-0 fixed bottom-0">
    </div>
    <div id="header_container" class="w-full right-0 left-0 fixed top-0">
    </div>

    <style>
        /*Banner open/load animation*/
        .alert-banner {
            -webkit-animation: slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: slide-in-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        /*Banner close animation*/
        .alert-banner input:checked~* {
            -webkit-animation: slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
            animation: slide-out-top 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
        }

        /*Footer open/load animation*/
        .alert-footer {
            -webkit-animation: slide-in-bottom 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: slide-in-bottom 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        /*Footer close animation*/
        .alert-footer input:checked~* {
            -webkit-animation: slide-out-bottom 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
            animation: slide-out-bottom 0.5s cubic-bezier(0.550, 0.085, 0.680, 0.530) both;
        }

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

        /* -------------------------------------------------------------
 * Animations generated using Animista * w: http://animista.net,
 * ---------------------------------------------------------- */

        @-webkit-keyframes slide-in-top {
            0% {
                -webkit-transform: translateY(-1000px);
                transform: translateY(-1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @keyframes slide-in-top {
            0% {
                -webkit-transform: translateY(-1000px);
                transform: translateY(-1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @-webkit-keyframes slide-out-top {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }

            100% {
                -webkit-transform: translateY(-1000px);
                transform: translateY(-1000px);
                opacity: 0
            }
        }

        @keyframes slide-out-top {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }

            100% {
                -webkit-transform: translateY(-1000px);
                transform: translateY(-1000px);
                opacity: 0
            }
        }

        @-webkit-keyframes slide-in-bottom {
            0% {
                -webkit-transform: translateY(1000px);
                transform: translateY(1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @keyframes slide-in-bottom {
            0% {
                -webkit-transform: translateY(1000px);
                transform: translateY(1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }
        }

        @-webkit-keyframes slide-out-bottom {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }

            100% {
                -webkit-transform: translateY(1000px);
                transform: translateY(1000px);
                opacity: 0
            }
        }

        @keyframes slide-out-bottom {
            0% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
                opacity: 1
            }

            100% {
                -webkit-transform: translateY(1000px);
                transform: translateY(1000px);
                opacity: 0
            }
        }

        @-webkit-keyframes slide-in-right {
            0% {
                -webkit-transform: translateX(1000px);
                transform: translateX(1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
                opacity: 1
            }
        }

        @keyframes slide-in-right {
            0% {
                -webkit-transform: translateX(1000px);
                transform: translateX(1000px);
                opacity: 0
            }

            100% {
                -webkit-transform: translateX(0);
                transform: translateX(0);
                opacity: 1
            }
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
    <script>
        var closeDiv = function(ev) {
            var divToCloseId = ev.target.dataset.alertId;

            setTimeout(function() {
                let div = document.getElementById(divToCloseId);
                div.remove();
            }, 1000);
        };
        var AlertToast = {
            BOTTOM_TOAST_CONTAINER: "bottom_toast_container",
            TOP_TOAST_CONTAINER: "top_toast_container",
            FOOTER_CONTAINER: "footer_container",
            HEADER_CONTAINER: "header_container",
            TOAST_TEMPLATE:"toast_template",
            LINE_TEMPLATE: "line_template",
            SUCCESS: "{{ config('tailwind-alerts.default_alert_colors.SUCCESS') }}",
            ERROR: "{{ config('tailwind-alerts.default_alert_colors.ERROR') }}",
            WARNING: "{{ config('tailwind-alerts.default_alert_colors.WARNING') }}",
            INFO: "{{ config('tailwind-alerts.default_alert_colors.INFO') }}",
            showToast: function(message, level, container = this.BOTTOM_TOAST_CONTAINER, template = this.TOAST_TEMPLATE) {

                let divId = (Math.random() + 1).toString(36).substring(7);
                let checkId = (Math.random() + 1).toString(36).substring(7);

                let div = document.getElementById(template).cloneNode(true);
                let alertContainer = document.getElementById(container);

                div.id = divId;
                let containerLabel = div.querySelector("label");
                containerLabel.setAttribute("for", checkId);

                let check = div.querySelector("input");
                check.dataset.alertId = divId;
                check.setAttribute("id", checkId);
                check.addEventListener('click', closeDiv, false);

                containerLabel.className = containerLabel.className.replace("level", level);
                div.querySelector("p").textContent = message;

                alertContainer.appendChild(div);
                div.style.display = "block";
            }
        }
    </script>
    @if (Session::has(config('tailwind-alerts.session_name')))
        @foreach (session(config('tailwind-alerts.session_name')) as $k => $alert)
            <script>
                AlertToast.showToast("{{ $alert['message'] }}", "{{ $alert['level'] }}", "{{ $alert['container'] }}", "{{ $alert['template'] }}")
            </script>
        @endforeach
    @endif

</div>
