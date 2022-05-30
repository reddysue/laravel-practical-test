<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <h2>Fields On the form</h2>  
                    <div class="form-group">
                        <form method="POST" id="myform">
                            @csrf
                                @foreach($inputs as $key => $input)
                                <div class="form-group">
                                    <label for="{{$input->name}}">{{$input->label}}</label>
                                    <input type="{{$input->type}}"
                                        name="{{$input->name}}">
                                </div>
                                @endforeach
                            <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                        </form>  
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){   
                var postURL = "{{url('/send-data')}}";
    
                $('#submit').click(function(){    
                    $.ajax({  
                        url:postURL,  
                        method:"POST",  
                        data:$('#myForm').serialize(),
                        type:'json',
                        success:function(data)  
                        {
                            console.log(data)
                            if(data.error){
                                printErrorMsg(data.error);
                            }else{
                                console.log('send email')
                            }
                        }  
                    }); 
                });
            });
        </script>
    </body>
</html>
