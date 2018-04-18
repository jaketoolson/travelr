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
    .multiselect {
        min-height: 55px;
    }
    .multiselect__select {
        height: 50px;
    }
    .multiselect__tags {
        min-height: 54px;
        padding-top: 16px;
        padding-bottom: 0px;
        box-shadow: inset 0 0 1rem 0 rgba(0,0,0, .1);
        border: .1rem solid rgba(0,0,0, .15);
        border-radius: .3rem;
        color: #363636;
        transition: .3s;
        -webkit-appearance: none;
        background-color: #fff;
        font-size: 1.4rem;
        outline: none !important;
        height: inherit;
    }
    .multiselect-multiple-single .multiselect__strong {
        display: none !important;
    }
    .multiselect__tags {
        border: none !important;
        box-shadow: none !important;
    }
    .multiselect__content-wrapper {
        border: none !important;
    }
</style>
