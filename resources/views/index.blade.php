<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">


    @livewireStyles
    <title>Post</title>
</head>
<body>

    <div class="container my-4">
        @livewire('componentes.post')
    </div>
    

    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('ijabo/ijabo.min.js') }}"></script>

    <script>
        window.addEventListener('showToastr', function(event) {
          toastr.remove();
          if(event.detail.type === 'info') {
            toastr.info(event.detail.message);
          } else if(event.detail.type === 'success') {
            toastr.success(event.detail.message);
          } else if(event.detail.type === 'error') {
            toastr.error(event.detail.message);
          } else if(event.detail.type === 'warning') {
            toastr.warning(event.detail.message);
          } else {
            return false;
          }
        });
      </script>
    
    <script>
        window.addEventListener('cerrarModal', event => {
            $('#addModal').modal('hide');
            $('#editModal').modal('hide');
        })
    </script>

</body>
</html>