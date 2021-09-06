

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap">
                        <thead>
                            <tr>
                            <th>Brand Name</th>
                            <th>Color</th>
                            <th>Condition</th>
                            <th>Storage</th>
                            <th>Quantity</th>
                            <th>payment_method</th>
                            <th >Price</th>
                            <th > Grand Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>

                                <td>{{$order->brand_name}}  {{$order->model_name}} </td>
                                <td>{{$order->color}}</td>
                                <td>{{$order->condition}}  </td>
                                <td>{{$order->storage}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->payment_method}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->grand_price}}</td>

                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
