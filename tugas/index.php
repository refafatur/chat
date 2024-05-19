<!DOCTYPE html>
<html>
<head>
    <title>Chat Application</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        
    </script>
    <script>
        function getChat() {
            // Lakukan permintaan AJAX
            $.ajax({
                url: "GetChat.php",
                type: "GET",
                error: function(jqXHR, textStatus, errorThrown) { 
                    console.log(textStatus, errorThrown); 
                },
                success: function (response) {
                    // Update konten chat
                    $(".chat-content").html(response);
                }
            });
        }

        function clearInput() {
            // Bersihkan nilai input dan textarea
            $('textarea[name="nama_chat"]').val('');
            $('textarea[name="text_chat"]').val('');
        }

        $(document).ready(function() {
            getChat();

            $("button").click(function() {
                var values = $('#chat-form').serialize();

                // post
                $.ajax({
                    url: "PostChat.php",
                    type: "post",
                    data: values,
                    success: function (response) { 
                        getChat(); 
                        clearInput(); 
                    },
                    error: function(jqXHR, textStatus, errorThrown) { 
                        console.log(textStatus, errorThrown); 
                    }
                });
            });
        });
    </script>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
body{
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to bottom right, rgba(252, 203, 144, 1), rgba(213, 126, 235, 1))
}

.mask-custom {
background: rgba(24, 24, 16, .2);
border-radius: 2em;
backdrop-filter: blur(15px);
border: 2px solid rgba(255, 255, 255, 0.05);
background-clip: padding-box;
box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
}
</style>
<body>
    <div class="row" style="margin: 20px;">
        <div class="list-unstyled text-white">
            <div class="card-body">
                <div class="chat-content"></div>
            </div>



                    <li class="mb-3">
                        <form id="chat-form">
                            <div data-mdb-input-init class="form-outline form-white">
                                <label class="form-label">Name</label>
                                <textarea class="form-control" placeholder="Type Message..." rows="2" name="nama_chat" id="name"></textarea>
                            </div>
                            <div data-mdb-input-init class="form-outline form-white">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" placeholder="Type Message..." rows="2" name="text_chat" id="chat"></textarea>
                            </div>
                        </form>
                    </li>
                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg btn-rounded float-end">Send</button>
        </div>
    </div>
</div>

</body>
</html>
