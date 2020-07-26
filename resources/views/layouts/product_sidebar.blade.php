<div class="makp_sidebar product_sidebar">
    <div class="widget_box search_widget mb-55">
        <h4 class="mb-4 head_sidebar">SEARCH</h4>
        <form>
            <div class="form_group">
                <input type="text" class="form_control" placeholder="Enter your keyword...">
                <button class="search_btn"><i class="fal fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="widget_box search_widget mb-55">
        <h4 class="mb-5 head_sidebar">PRICE FILTER</h4>
        <div class="price-range-wrap">
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="0" data-max="999">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span>
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
            </div>
            <div class="range-slider pd-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="price-input pt-1">
                            <p>Price: <span id="minamount"> </span> - <span id="maxamount"> </span> </p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <button class="btn filter_btn">FILTER</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="widget_box search_widget mb-55">
        <h4 class="mb-3 head_sidebar">COLOR FILTER</h4>
        <div class="color_filter">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row active">
                        <div class="col-md-6 col-sm-6">
                            <p>Blue(15)</p>
                        </div>
                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                            <label for=""></label>
                        </div>
                    </div>

                </li>
                <li class="list-group-item">
                    <div class="row active">
                        <div class="col-md-6 col-sm-6">
                            <p>Red(09)</p>
                        </div>
                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                            <label for="" id="red"></label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row active">
                        <div class="col-md-6 col-sm-6">
                            <p>Green(28)</p>
                        </div>
                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                            <label for="" id="green"></label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row active">
                        <div class="col-md-6 col-sm-6">
                            <p>Orange(11)</p>
                        </div>
                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                            <label for="" id="orange"></label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row active">
                        <div class="col-md-6 col-sm-6">
                            <p>Black(05)</p>
                        </div>
                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                            <label for="" id="black"></label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <p>Purple(21)</p>
                        </div>
                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                            <label for="" id="purple"></label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="widget_box search_widget mb-55">
        <h4 class="mb-4 head_sidebar">SIZE FILTER</h4>
        <div class="size_filter mt-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label _highlight">
                            <input type="checkbox" class="form-check-input input_size" name="" id="" value="checkedValue" checked>
                            <span class="checkmark"></span>
                            X-small
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input input_size" name="" id="" value="checkedValue">
                            <span class="checkmark"></span>
                            Small
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input input_size" name="" id="" value="checkedValue">
                            <span class="checkmark"></span>
                            Medium
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input input_size" name="" id="" value="checkedValue">
                            <span class="checkmark"></span>
                            Large
                        </label>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input input_size" name="" id="" value="checkedValue">
                            <span class="checkmark"></span>
                            XXl
                        </label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="widget_box search_widget mb-55">
        <h4 class="mb-4 head_sidebar">DANH MỤC</h4>
        <div class="product_category">
            <ul class="list-group">
                @foreach($categories as $category)
                <li class="list-group-item mt-2">
                    <a href="#/">
                        <div class="row">
                            <span class="col-md-6">{{$category->name}}</span>
                            <span class="text-md-right col-md-6">{{$category->products->count()}}</span>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="widget_box search_widget mb-55">
        <h4 class="mb-4 head_sidebar">Popular Tags</h4>
        <div class="pop_tags">
            <span class="_tags mb-2 mr-2">Sweet shirt</span>
            <span class="_tags mb-2 mr-2 active">Man Accessories</span>
            <span class="_tags mb-2 mr-2">Fashion</span>
            <span class="_tags mb-2 mr-2">Polo</span>
            <span class="_tags mb-2 mr-2">T-shirt</span>
            <span class="_tags mb-2 mr-2">Jewellery</span>
        </div>
    </div>
</div>