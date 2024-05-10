<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <select id="province_id" name="province_id" class="form-control" >
    </select>

    <select class="js-example-basic-single" name="state">
        <option value="AL">Alabama</option>
          ...
        <option value="WY">Wyoming</option>
      </select>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script type="text/javascript">
    // $('#province_id').select2({
    //     placeholder: 'Tỉnh thành',
    //     ajax: {
    //         url: '/search',
    //         dataType: 'json',
    //         delay: 250,
    //         height: '500px',
    //         width: '200px',
    //         dropdownCssClass: "bigdrop",
    //         processResults: function (data) {
    //             console.log(data)
    //             return {
    //                 results: $.map(data, function (item) {
    //                     return {
    //                         text: item.name,
    //                         id: item.id
    //                     }
    //                 })
    //             };
    //         },
    //         cache: true
    //     }
    // });


    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
$.fn.select2.defaults.set('amdLanguageBase', 'select2/i18n/');
</script>
</body>
</html>



