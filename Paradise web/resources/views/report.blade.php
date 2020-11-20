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
                <h2>Dashboard</h2>
            </div>
            
            <hr/>
            
            <div class="body">

                <div class="tab-window">
                    <div class="tabs">
                        <a href="/admin/orders/">Orders</a>
                        <a href="/admin/reports/">Reports</a>
                    </div>
                    <div class="content">
                        <h2>Daily Revenue</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyRevenue as $date => $amount)
                                    <tr>
                                        <td>{{ $date }}</td>
                                        <td>{{ number_format($amount,2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="content">
                        <h2>Most Famous Main Dishes</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Dish Name</th>
                                    <th>Soldout Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topMainDishes as $key => $dish)
                                    <tr>
                                        <td>{{ $dish->main_dish_name }}</td>
                                        <td>{{ $dish->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="content">
                        <h2>Most Famous Side Dishes</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Dish Name</th>
                                    <th>Soldout Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topSideDishes as $key => $dish)
                                    <tr>
                                        <td>{{ $dish->side_dish_name }}</td>
                                        <td>{{ $dish->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
              
            </div>
            
            <hr/>

            <div>
                <form action="/logout" method="post">
                    @csrf
                    <input type="submit" style="font-weight: bold" value='logout'>
                </form>
            </div>

        </div>
    </body>
</html>