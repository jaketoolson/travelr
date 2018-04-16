<!--
  - Copyright (c) 2018. Jake Toolson
  -->

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        extends: Multiselect,
        name: "vue-multiselect",
        props: {
            limitText: {
                type: Function,
                default: function (count) {
                    return null;
                }
            },
        },
        computed: {
            currentOptionLabel () {
                if (this.limit === 0 && this.internalValue.length > 0) {
                    return `${this.placeholder} (${this.internalValue.length})`;
                }

                return this.multiple
                    ? this.searchable ? '' : this.placeholder
                    : this.internalValue.length
                        ? this.getOptionLabel(this.internalValue[0])
                        : this.searchable ? '' : this.placeholder
            },
        },
    };
</script>
<style>
    .multiselect-multiple-single .multiselect__strong {
        display: none !important;
    }
    .multiselect__tags {
        border: none !important;
        box-shadow: none !important;
    }
    .multiselect__content-wrapper {
        border: 1px solid transparent;
    }
</style>
