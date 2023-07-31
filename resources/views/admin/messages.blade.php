@if (session()->has('success'))
                    <div id="success-alert" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('message'))
                    <div id="message-alert" class="alert alert-warning">
                        {{ session('message') }}
                    </div>
                @endif
                <script>
                    setTimeout(function() {
                        $('#success-alert').fadeOut('fast');
                        $('#message-alert').fadeOut('fast');
                    }, 2000);
                </script>
