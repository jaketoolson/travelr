
<planet-listings
        display_per_row="4"
        display_type="grid"
        planets_endpoint="{{ route('api.planets.index') }}?filter[planet]=true"
>
    <template slot="section_title">
        <h2>Featured Listings</h2>
    </template>
</planet-listings>

