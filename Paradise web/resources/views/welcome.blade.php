<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel='stylesheet' href='/css/app.css' type='text/css'>

    </head>
    <body>
        <div class="panel">
            <div>
                <h2>Pick Your Food!</h2>
            </div>
            
            <hr/>
            
            <div class="body">

                @if ($message = Session::get('success'))
                    <div class="message">
                        {{ $message }}
                    </div>
                    <br>
                @endif

                <form action='/order' method='post'>

                    @csrf
                    
                    <div class="input-box">
                        <div class='label'>Main Dish</div>
                        <div>
                            <select name='main_dish'>
                                @foreach($mainDishList as $key => $obj)
                                    <option value="{{$obj->id}}">{{$obj->main_dish_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class='label'>Side Dish</div>
                        <div>
                            <select name='side_dish'>
                                @foreach($sideDishList as $key => $obj)
                                    <option value="{{$obj->id}}">{{$obj->side_dish_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit">Order</button>

                </form>
            </div>
            
            <hr/>

            <div>
                <a href='/admin/orders'>Admin Login</a>
            </div>

        </div>
    </body>
</html>
