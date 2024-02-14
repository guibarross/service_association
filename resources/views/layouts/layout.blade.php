<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Service Association</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <!-- Bootstrap JS (Popper.js and Bootstrap JS) -->
</head>

<body>
    @include('layouts.header')
    
    @yield('content')
     <!-- Verifica se há uma mensagem de modal e exibe o modal correspondente -->
     @if (Session::has('modal_msg'))
     <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-sm" role="document">
             <div class="modal-content" style="background-color: #61e78e">
                 <div class="px-2 py-1">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true" class="text-success font-weight-bolder">&times;</span>
                     </button>
                 </div>
                 <div class="pb-4 text-center text-success font-weight-bolder">
                     {{ Session::get('modal_msg') }}
                 </div>
             </div>
         </div>
     </div>
     <script>
         $(document).ready(function() {
             $('#successModal').modal('show');
            
             setTimeout(function() {
                 $('#successModal').modal('hide');
             }, 3500);
         });
     </script>
 @endif
    @include('layouts.footer')


</body>

</html>
