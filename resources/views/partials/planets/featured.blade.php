
<div class="section-title clearfix">
    <div class="float-xl-left float-md-left float-sm-none">
        <h2>Featured Listings</h2>
    </div>
    {{--<div class="float-xl-right float-md-right float-sm-none">--}}
        {{--<select name="categories" id="categories" class="small width-200px selectized" data-placeholder="Category" tabindex="-1" style="display: none;"><option value="" selected="selected">Category</option></select><div class="selectize-control small width-200px single"><div class="selectize-input items full has-options has-items"><div class="item" data-value="">Category</div><input type="text" autocomplete="off" tabindex="" id="categories-selectized" style="width: 4px;"></div><div class="selectize-dropdown single small width-200px" style="display: none; width: 200px; top: 42px; left: 0px;"><div class="selectize-dropdown-content"></div></div></div>--}}
        {{--<select name="sorting" id="sorting" class="small width-200px selectized" data-placeholder="Default Sorting" tabindex="-1" style="display: none;"><option value="" selected="selected">Default Sorting</option></select><div class="selectize-control small width-200px single"><div class="selectize-input items full has-options has-items"><div class="item" data-value="">Default Sorting</div><input type="text" autocomplete="off" tabindex="" id="sorting-selectized" style="width: 4px; opacity: 0; position: absolute; left: -10000px;"></div><div class="selectize-dropdown single small width-200px" style="display: none; width: 200px; top: 42px; left: 0px; visibility: visible;"><div class="selectize-dropdown-content"><div class="option selected" data-selectable="" data-value="">Default Sorting</div><div class="option" data-selectable="" data-value="1">Newest First</div><div class="option" data-selectable="" data-value="2">Oldest First</div><div class="option" data-selectable="" data-value="3">Lowest Price First</div><div class="option" data-selectable="" data-value="4">Highest Price First</div></div></div></div>--}}
    {{--</div>--}}
</div>

<planet-listings display_per_row="4" display_type="grid" planets_endpoint="{{ route('api.planet.featured.index') }}"></planet-listings>

