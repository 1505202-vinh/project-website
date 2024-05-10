<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('admin.layouts.js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
<script>
    $(document).ready(function(){
        $.ajax({
        url: "{{ route('abc_name') }}",
        type: 'GET',
        data : {},
        // contentType: 'application/json',
        success: function(response){
        console.log(response);
        console.log(document.div.getAttribute('item'));
        console.log($(#demo).html);
        $('#demo').html(`<h1>${response.name}</h1>`);
     }
    });
    })

</script>
</head>
<body>
    <div id='demo' item="xyz">abc</div>


</body>
</html>
