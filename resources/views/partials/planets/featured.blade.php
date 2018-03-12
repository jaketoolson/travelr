
<planet-listings
        display_per_row="4"
        display_type="grid"
        planets_endpoint="{{ route('api.planet.featured.index') }}"
>
    <template slot="section_title">
        <h2>Featured Listings</h2>
    </template>
</planet-listings>

