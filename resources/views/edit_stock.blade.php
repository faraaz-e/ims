@include('header')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Edit Stock</h4>
            </div>

            @if(session('success'))
                <div class="row p-2">
                    <div class="alert alert-success w-100" role="alert">
                        {{session('success')}}
                    </div>
                </div>
            @endif

            <script>
                $("document").ready(function(){
                    setTimeout(function(){
                        $("div.alert").remove();
                    }, 3000 ); // 3 secs

                });
            </script>


            <div class="card animated animatedFadeInUp fadeInUp animation-delay shadow" style="width:100%; border-radius: 0%">

                <div class="container-fluid bg-transparent">


                    <form class="p-2" action="/update_stock/{{$stored_stock_data[0]['id']}}" method="post">

                        @csrf

                    <div class="row animated animatedFadeInUp fadeInUp animation-delay2">

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Product ID / SKU </label>
                                <input type="text" name="product_sku" value="{{ $stored_stock_data[0]['product_sku'] }}" class="form-control" id="inputDefault">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Product Name <span class="text-danger"><b>*</b></span></label>
                                <input type="text" name="product_name" maxlength="30" class="form-control" value="{{ $stored_stock_data[0]['product_name'] }}" id="inputDefault" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">Color</label>
                                <select class="form-control" id="exampleSelect1" name="product_color">
                                    <option>{{ $stored_stock_data[0]['product_color'] }}</option>
                                    <option value="-"></option>
                                    <option>Black</option>
                                    <option>Blue</option>
                                    <option>Brown</option>
                                    <option>Cream</option>
                                    <option>Golden</option>
                                    <option>Green</option>
                                    <option>Grey</option>
                                    <option>Maroon</option>
                                    <option>Orange</option>
                                    <option>Pink</option>
                                    <option>Purple</option>
                                    <option>Red</option>
                                    <option>Violet</option>
                                    <option>White</option>
                                    <option>Yellow</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea">Description</label>
                                <textarea class="form-control" name="product_desc" id="exampleTextarea" rows="3">{{ $stored_stock_data[0]['product_desc'] }}</textarea>
                            </div>

                            <small><span class="text-danger"><b>*</b></span> Mandatory Fields</small>

                        </div>

                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Quantity <span class="text-danger"><b>*</b></span></label>
                                <input type="number" name="product_qnty" class="form-control" value="{{ $stored_stock_data[0]['product_qnty'] }}" id="inputDefault" required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Cost Price (₹)</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="product_cp" class="form-control" value="{{ $stored_stock_data[0]['product_cp'] }}" step=".01" id="inputDefault">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Selling Price (₹)</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">₹</span>
                                    <input type="number" name="product_sp" class="form-control" value="{{ $stored_stock_data[0]['product_sp'] }}" step=".01" id="inputDefault">
                                </div>
                            </div>

                        </div>

                        </div> <!--END OF FIRST ROW -->

                        <div class="row justify-content-end">
                            <button class="btn btn-primary" type="submit" name="save">Update Product</button>&nbsp
{{--                            <button class="btn btn-secondary" type="reset">Reset</button>--}}
                        </div>

                    </form>


                </div> <!-- END OF CONTAINER-FLUID -->
            </div> <!-- END OF CARD -->

        </main>

    </div>

</div>

</body>

</html>
