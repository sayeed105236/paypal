<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

  </head>
  <body>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mt-5 mb-3">Laravel Form</h3>
                    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
          </div>
                    <form>
                      @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <div><input type="text" name="name" class="form-control box-quantity"></div>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <div><input type="text" name="email" class="form-control box-quantity"></div>
                        </div>
                        <div class="mb-3">
                            <label>Amount to pay (in USD)</label>
                            <div>
                                <select name="amount" class="form-control box-quantity">
                                    <option value="5">$5</option>
                                    <option value="10">$10</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <!--<button type="submit" class="btn btn-primary btn-sm">Submit</button>-->
                            <a class="btn btn-success" href="{{route('payment')}}">Submit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script type="text/javascript">

    $(document).ready(function() {
        $(".btn-sm").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var name = $("input[name='name']").val();

            var email = $("input[name='email']").val();
            var amount = $("select[name='amount']").val();

            $.ajax({
                url: "{{ route('my.form') }}",
                type:'POST',
                data: {_token:_token, name:name, email:email, amount:amount},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>

  </body>
</html>
