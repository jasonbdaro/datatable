<template>
    <table v-once :id="tableId" ref="table" :class="className">
        <thead>
            <tr>
                <th v-for="(field, i) in options.columns" :key="i">{{field.name}}</th>
            </tr>
        </thead>
    </table>
</template>

<script>
import $ from 'jquery';

export default {
    props: {
        id: {
            type: String,
        },
        className: {
            type: String,
            default: 'table table-striped table-bordered',
        },
        opts: {
            type: Object,
        },
    },
    data() {
        return {
            tableId: null,
            options: {
                columns: [],
                processing: true,
                searching: true,
                searchDelay: 700,
                ordering: true,
                serverSide: true,
            },
            dataTable: null,
        };
    },
    created() {
        const that = this;

        that.tableId = that.id || 'datatable1';

        if (that.opts) {
            that.options = $.extend({}, that.options, that.opts);
        }
    },
    mounted() {
        const that = this;
        const $el = $(that.$refs.table);
        that.dataTable = $el.DataTable(that.options);
    },
}
</script>
