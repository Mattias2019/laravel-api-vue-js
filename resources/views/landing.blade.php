 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PatientDrive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
   
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <style>
       
    </style>
</head>
<body>
    <div id="app">
        <app></app>
    </div>
    <script src="{{mix('js/bootstrap.js')}}"></script>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>